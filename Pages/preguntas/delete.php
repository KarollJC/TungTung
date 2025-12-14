<?php
session_start();
include("../../Libs/tungtungcrud.php");
$id = $_GET['id'];

$db_conn = new Database("localhost","tungtung","tuntungcitos","1234"); //<-Los demas
//$db_conn = new Database("db","tungtung","tungtungcitos","1234"); //<- David
$conn = $db_conn->connect_db();
$sql = new CRUD($conn, 'preguntas_frecuentes');

$query = $sql->delete('id_pregunta = ?', [$id]);

if($query)
{
    header("Location: preguntas_frec.php");
    exit();
}
else
{
    $_SESSION["delete_err"] = "Error al eliminar la pregunta con id: " . $id;
    header("Location: ../preguntas_frec.php");
}
$db_conn->close_connection();
?>