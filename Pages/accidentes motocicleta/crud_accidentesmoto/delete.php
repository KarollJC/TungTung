<?php
include("db.php");

$id = $_GET['id'];

$sql = "DELETE FROM preguntas_frecuentes WHERE id_pregunta = $id";

if ($conexion->query($sql)) {
    header("Location: preguntas_frec.php");
    exit();
} else {
    echo "Error: " . $conexion->error;
}
?>
