<?php
require_once __DIR__ . '/../Libs/tungtungcrud.php';
$dbHost = getenv('DB_HOST') ?: 'localhost';

$db = new Database($dbHost, 'tungtung', 'tungtungcitos', '1234');
$conexion = $db->connect_db();

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
$compromiso = isset($_POST['compromiso']) ? 1 : 0;

$mensajes = new CRUD($conexion, 'mensaje');

$data = [
    'usuario' => $usuario,
    'email' => $email,
    'mensaje' => $mensaje,
    'compromiso' => (int) $compromiso
];

$insert_id = $mensajes->create($data);

if ($insert_id !== false){
    $estado = "ok";
} else {
    $estado = "error";
}

$db->close_connection();

include("contacto.php");
?>
