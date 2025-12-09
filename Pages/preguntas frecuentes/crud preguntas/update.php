<?php include("db.php"); ?>

<?php
$id = $_GET['id'];

$resultado = $conexion->query("SELECT * FROM preguntas_frecuentes WHERE id_pregunta = $id");
$pregunta = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar pregunta</title>
</head>
<body>

<h1>Editar / Responder Pregunta</h1>

<form method="POST">

    Pregunta: <br>
    <input type="text" name="pregunta" value="<?php echo $pregunta['pregunta']; ?>" required><br><br>

    Respuesta: <br>
    <textarea name="respuesta" rows="4" cols="40"><?php echo $pregunta['respuesta']; ?></textarea><br><br>

    Categoría: <br>
    <input type="text" name="categoria" value="<?php echo $pregunta['categoria']; ?>" required><br><br>

    Orden: <br>
    <input type="text" name="orden" value="<?php echo $pregunta['orden']; ?>" required><br><br>

    <button type="submit" name="actualizar">Guardar Cambios</button>
</form>

<?php
if (isset($_POST['actualizar'])) {

    $preg = $_POST['pregunta'];
    $resp = $_POST['respuesta'];
    $cat = $_POST['categoria'];
    $ord = $_POST['orden'];

    $sql = "UPDATE preguntas_frecuentes 
            SET pregunta='$preg', respuesta='$resp', categoria='$cat', orden='$ord'
            WHERE id_pregunta=$id";

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
