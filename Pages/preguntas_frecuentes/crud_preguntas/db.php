<?php
$conexion = new mysqli("localhost", "tungtungcitos", "1234", "tungtung", 3306);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>