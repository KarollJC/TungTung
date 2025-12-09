<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD preguntas_frec</title>
</head>
<body>

<h1>preguntas frecuentes</h1>

<a href="create.php">Agregar pregunta</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>id</th>
        <th>pregunta</th>
        <th>respuesta</th>
        <th>categoria</th>
        <th>orden</th>
        <th>acciones</th>
    </tr>

    <?php
    $resultado = $conexion->query("SELECT * FROM preguntas_frecuentes");

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['id_pregunta']}</td>";
        echo "<td>{$fila['pregunta']}</td>";
        echo "<td>{$fila['respuesta']}</td>";
        echo "<td>{$fila['categoria']}</td>";
        echo "<td>{$fila['orden']}</td>";

        echo "<td>
                <a href='update.php?id={$fila['id_pregunta']}'>contestar o editar</a>
                <a href='delete.php?id={$fila['id_pregunta']}'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
