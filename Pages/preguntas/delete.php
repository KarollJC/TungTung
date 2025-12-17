<?php
$dbHost = getenv('DB_HOST') ?: 'localhost';
session_start();
include("../../Libs/tungtungcrud.php");
$id = $_GET['id'];

$db_conn = new Database($dbHost, 'tungtung', 'tungtungcitos', '1234');
$conn = $db_conn->connect_db();
$sql = new CRUD($conn, 'preguntas_frecuentes');

$query = $sql->delete('id_pregunta = ?', [$id]);

if($query)
{
    echo "<script>window.location.replace('../preguntas_frec.php');</script>";
    exit();
}
else
{
    $_SESSION["delete_err"] = "Error al eliminar la pregunta con id: " . $id;
    echo "<script>window.location.replace('../preguntas_frec.php');</script>";
}
$db_conn->close_connection();
?>