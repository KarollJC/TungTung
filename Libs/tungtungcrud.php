<?php
/**
 * @author @Equipo tung-tung
 * @version 1.0
**/
class Database
{
    private $db_host = 'localhost';
    private $db_name = 'tungtung';
    private $db_user = 'root';
    private $db_pass = '';
    private $connection;
    
    public function __construct($host, $db, $user, $pass)
    {
        $this->db_host = $host;
        $this->db_name = $db;
        $this->db_user = $user;
        $this->db_pass = $pass;
    }

    public function connect_db()
    {
        $this->connection = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_pass,
            $this->db_name
        );

        if($this->connection->connect_error)
        {
            die('Database Connection Error: ' . $this->connection->connect_error);
        }

        return $this->connection;
    }

    public function get_connection()
    {
        return $this->connection;
    }

    public function close_connection()
    {
        if($this->connection)
        {
            $this->connection->close();
        }
    }
};

class CRUD
{
    private $crud_connection;
    private $tabla;

    public function __construct($connection, $tabla)
    {
        $this->crud_connection = $connection;
        $this->tabla = $tabla;
    }

    /**
     * CREATE - Inserta una fila
     * 
     * @param array $data valores en la columna => valor
     * @return int|false Id de la linea insertada o false si falló
     * @example of $data: 
     * * $time = [ 'minutes' => 25, 'seconds' => 40 ];
    **/
    public function create($data)
    {
        if(empty($data) || !is_array($data))
        {
            return false;
        }

        $columns = array_keys($data);
        $values = array_values($data);
        
        $column_str = implode(',', $columns);
        $placeholders = implode(',', array_fill(0, count($values), '?'));

        $query = "INSERT INTO {$this->tabla} ({$column_str}) VALUES ({$placeholders})";
        $stmt = $this->crud_connection->prepare($query);

        if(!$stmt)
        {
            error_log("Error al preparar la consulta: " . $this->crud_connection->error);
            return false;
        }

        $types = $this->buildTypeString($values);

        $bind_params = array_merge([$types], $values);

        if(!call_user_func_array([$stmt, 'bind_param'], $this->makeValuesReferenced($bind_params)))
        {
            error_log("Bind error: " . $stmt->error);
            return false;
        }

        // Obtener el ID
        if($stmt->execute())
        {
            $insert_id = $this->crud_connection->insert_id;
            $stmt->close();
            return $insert_id;
        }

        error_log("Execute error: " . $stmt->error);
        $stmt->close();
        return false;
    }

    /**
     * READ
     * 
     * @param string|null $where consulta opcional WHERE (sin incluir 'WHERE' explisitamente) (opcional)
     * @param array $where_values Los valores a tomar del WHERE (opcional)
     * @param string $order Opcional consulta ORDER BY
     * @param string $limit Opcional consulta LIMIT
     * @return array|false arreglo de la consulta obtenida o falso si falla
    **/
    public function read($where = null, $where_values = [], $order = null, $limit = null)
    {
        $query = "SELECT * FROM {$this->tabla}";

        if($where)
        {
            $query .= " WHERE {$where}";
        }

        if($order)
        {
            $query .= " ORDER BY {$order}";
        }

        if($limit)
        {
            $query .= " LIMIT {$limit}";
        }

        $stmt = $this->crud_connection->prepare($query);

        if(!$stmt)
        {
            error_log("Error al preparar la consulta: " . $this->crud_connection->error);
            return false;
        }

        if(!empty($where_values))
        {
            $types = $this->buildTypeString($where_values);
            $bind_params = array_merge([$types], $where_values);
            if(!call_user_func_array([$stmt, 'bind_param'], $this->makeValuesReferenced($bind_params)))
            {
                error_log("Bind error: " . $stmt->error);
                return false;
            }
        }

        if(!$stmt->execute())
        {
            error_log("Execute error: " . $stmt->error);
            return false;
        }

        $result = $stmt->get_result();
        $records = [];

        while($row = $result->fetch_assoc())
        {
            $records[] = $row;
        }

        $stmt->close();
        return $records;
    }

    /**
     * READ ONE - Obtiene una sola consulta
     * 
     * @param string $where WHERE clause (without WHERE keyword)
     * @param array $where_values Array of values for WHERE clause
     * @return array|false Single record or false on failure
     */
    public function readOne($where, $where_values = [])
    {
        $results = $this->read($where, $where_values, null, '1');
        return !empty($results) ? $results[0] : false;
    }

    /**
     * UPDATE - Actauliza datos existentes
     * 
     * @param array $data Arreglo con los datos, en forma clave => valor
     * @param string $where consulta 'WHERE' (opcional)
     * @param array $where_values Arreglo de los valores en la consulta WHERE (opcional)
     * @return int|false Numero de filas afectadas o false si falla
    **/
    public function update($data, $where, $where_values = [])
    {
        if(empty($data) || !is_array($data))
        {
            return false;
        }

        $set_parts = [];
        $values = [];

        foreach($data as $column => $value)
        {
            $set_parts[] = "{$column} = ?";
            $values[] = $value;
        }

        $set_str = implode(', ', $set_parts);
        $all_values = array_merge($values, $where_values);

        $query = "UPDATE {$this->tabla} SET {$set_str}";

        if($where)
        {
            $query .= " WHERE {$where}";
        }

        $stmt = $this->crud_connection->prepare($query);

        if(!$stmt)
        {
            error_log("Error al preparar la consulta: " . $this->crud_connection->error);
            return false;
        }

        $types = $this->buildTypeString($all_values);

        $bind_params = array_merge([$types], $all_values);
        if(!call_user_func_array([$stmt, 'bind_param'], $this->makeValuesReferenced($bind_params)))
        {
            error_log("Bind error: " . $stmt->error);
            return false;
        }

        if($stmt->execute())
        {
            $affected = $stmt->affected_rows;
            $stmt->close();
            return $affected;
        }

        error_log("Execute error: " . $stmt->error);
        $stmt->close();
        return false;
    }

    /**
     * DELETE - Borrar filas
     * 
     * @param string $where consulta WHERE (requeriada)
     * @param array $where_values valores de las columnas de consulta WHERE (requerida)
     * @return int|false Numero de columnas afectadas o false si falla
    **/
    public function delete($where, $where_values = [])
    {
        if(empty($where))
        {
            error_log("Delete requires WHERE clause for safety");
            return false;
        }

        $query = "DELETE FROM {$this->tabla} WHERE {$where}";

        $stmt = $this->crud_connection->prepare($query);

        if(!$stmt)
        {
            error_log("Error al preparar la consulta: " . $this->crud_connection->error);
            return false;
        }

        if(!empty($where_values))
        {
            $types = $this->buildTypeString($where_values);
            $bind_params = array_merge([$types], $where_values);

            if(!call_user_func_array([$stmt, 'bind_param'], $this->makeValuesReferenced($bind_params)))
            {
                error_log("Bind error: " . $stmt->error);
                return false;
            }
        }

        if($stmt->execute())
        {
            $affected = $stmt->affected_rows;
            $stmt->close();
            return $affected;
        }

        error_log("Execute error: " . $stmt->error);
        $stmt->close();
        return false;
    }

    /**
     * COUNT - Cuenta las filas que coincidan con lo requerido
     * 
     * @param string|null $where consulta 'WHERE' (opcional)
     * @param array $where_values Arreglo de valores de la consulta 'WHERE' (opcional)
     * @return int|false Cuenta la cantidad de consultas que coinciden o false si falla
    **/
    public function count($where = null, $where_values = [])
    {
        $query = "SELECT COUNT(*) as count FROM {$this->tabla}";

        if($where)
        {
            $query .= " WHERE {$where}";
        }

        $stmt = $this->crud_connection->prepare($query);

        if(!$stmt)
        {
            error_log("Error al preparar la consulta: " . $this->crud_connection->error);
            return false;
        }

        if(!empty($where_values))
        {
            $types = $this->buildTypeString($where_values);
            $bind_params = array_merge([$types], $where_values);
            if(!call_user_func_array([$stmt, 'bind_param'], $this->makeValuesReferenced($bind_params)))
            {
                error_log("Bind error: " . $stmt->error);
                return false;
            }
        }

        if($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row['count'];
        }

        error_log("Execute error: " . $stmt->error);
        $stmt->close();
        return false;
    }

    /**
     * Metodo para hacer un string bind
     * 
     * @param array $values Arreglo de valores
     * @return string Un string tipo (i = integer, d = double, s = string, b = blob)
     */
    private function buildTypeString($values)
    {
        $types = '';
        foreach($values as $value)
        {
            if(is_int($value))
            {
                $types .= 'i';
            }
            elseif(is_float($value))
            {
                $types .= 'd';
            }
            elseif(is_string($value))
            {
                $types .= 's';
            }
            else
            {
                $types .= 'b';
            }
        }
        return $types;
    }

    /**
     * Metodo para hacer referencia por bind_param
     * 
     * @param array $array Arreglo a referenciar
     * @return array Arreglo referenciado
    **/
    private function makeValuesReferenced($array)
    {
        $refs = [];
        foreach($array as $key => $value)
        {
            $refs[$key] = &$array[$key];
        }
        return $refs;
    }

    /**
     * Obtiene el ultimo error de la conneccion
     * 
     * @return string El ultimo mensaje de error
     */
    public function getLastError()
    {
        return $this->crud_connection->error;
    }
}

/**
 * Ejemplos:
 * 
 * // Inicair base de datos
 * $db = new Database();
 * $crud_connection = $db->connect();
 * 
 * // Interfaz CRUD para la tabla usuarios
 * $usuarios = new CRUD($crud_connection, 'usuarios');
 * 
 * // CREATE - Inserta un nuevo user
 * $user_data = [
 *     'email' => 'user@example.com',
 *     'usuario' => 'username',
 *     'nombre' => 'John',
 *     'apellidos' => 'Doe',
 *     'f_nacimiento' => '1990-01-01',
 *     'contra' => 'password123',
 *     'num_telefono' => '1234567890'
 * ];
 * $id = $usuarios->create($user_data);
 * 
 * // READ - Lista todos los usuarios
 * $all_users = $usuarios->read();
 * 
 * // READ - Lista a un usuario por email
 * $user = $usuarios->readOne('email = ?', ['user@example.com']);
 * 
 * // READ - Lista por filtros y los ordena
 * $filtered = $usuarios->read('nombre = ?', ['John'], 'apellidos ASC', '10');
 * 
 * // UPDATE - Actualiza un user
 * $updated = $usuarios->update(
 *     ['nombre' => 'Jane'],
 *     'id_usuario = ?',
 *     [$id]
 * );
 * 
 * // DELETE - Borra un usuario
 * $deleted = $usuarios->delete('id_usuario = ?', [$id]);
 * 
 * // COUNT - Cuenta apariciones
 * $count = $usuarios->count('nombre = ?', ['John']);
 * 
 * // Cerrar la connection
 * $db->closeConnection();
 */
?>