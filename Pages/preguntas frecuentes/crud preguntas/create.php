<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar pregunta</title>
</head>
<body>

<h1>Agregar pregunta</h1>

<form method="POST">
    pregunta: <input type="text" name="pregunta" required><br><br>
    categoria de pregunta: <input type="text" name="categoria" required><br><br>
    orden de la pregunta: <input type="text" name="orden" required><br><br>

    <button type="submit" name="subir">Subir</button>
</form>

<?php
if (isset($_POST['subir'])) {

    $pregunta = $_POST['pregunta'];
    $categoria = $_POST['categoria'];
    $orden = $_POST['orden'];

    // respuesta vacía por ahora
    $respuesta = "";

    $sql = "INSERT INTO preguntas_frecuentes (pregunta, respuesta, categoria, orden)
            VALUES ('$pregunta', '$respuesta', '$categoria', '$orden')";

    if ($conexion->query($sql)) {
        header("Location: preguntas_frec.php");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

</body>
</html>
