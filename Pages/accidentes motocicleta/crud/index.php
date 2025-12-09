<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Alumnos</title>
</head>
<body>

<h1>Lista de Alumnos</h1>

<a href="create.php">Agregar Alumno</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>

    <?php
    $resultado = $conexion->query("SELECT * FROM alumnos");

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['clave']}</td>";
        echo "<td>{$fila['nombre']}</td>";
        echo "<td>{$fila['email']}</td>";
        echo "<td>
                <a href='update.php?clave={$fila['clave']}'>Editar</a> | 
                <a href='delete.php?clave={$fila['clave']}'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
