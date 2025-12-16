<?php
require_once '../Libs/tungtungcrud.php';
$dbHost = getenv('DB_HOST') ?: 'localhost';
session_start();

$db_conn = new Database($dbHost, 'tungtung', 'tungtungcitos', '1234');
$conexion = $db_conn->connect_db();

$register_data = [
    'email' => isset($_POST['email']) ? $_POST['email'] : '',
    'usuario' => isset($_POST['user']) ? $_POST['user'] : '',
    'apellidos' => isset($_POST['apellidos']) ? $_POST['apellidos'] : '',
    'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : '',
    'f_nacimiento' => isset($_POST['fecha']) ? $_POST['fecha'] : '',
    'contra' => isset($_POST['contra']) ? $_POST['contra'] : '',
    'num_telefono' => isset($_POST['telefono']) ? $_POST['telefono'] : ''
];

$sql = new CRUD($conexion, 'usuarios');
$query = $sql->create($register_data);
$ok = 2;

if($query != false)
{
    $ok = 1;
}

$db_conn->close_connection();
header("Location: Registro.php?ok=".$ok);
?>