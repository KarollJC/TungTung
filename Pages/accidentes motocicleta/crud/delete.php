<?php
include("db.php");

$clave = $_GET['clave'];

$sql = "DELETE FROM alumnos WHERE clave=$clave";

if ($conexion->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
