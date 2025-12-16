<?php
include('../../../Libs/tungtungcrud.php');
$dbHost = getenv('DB_HOST') ?: 'localhost';

$db_conn = new Database($dbHost, "tungtung", "tungtungcitos", "1234");
$conexion = $db_conn->connect_db();

if ($conexion->connect_error)
{
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
