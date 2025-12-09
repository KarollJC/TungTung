<?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_base = 'tungtung';
$db_port = '3306';

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_base, $db_port);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];

    $usuario = $conexion->real_escape_string($usuario);
    $contra = $conexion->real_escape_string($contra);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$contra'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos";
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
    </style>
</head>
<body class="text-white">
<section class="d-flex justify-content-center align-items-center min-vh-100">
<div class="w-25 w-md-50">
    <h2 class="text-center mb-4">Iniciar sesión</h2>

    <form method="POST" action="" class="formulario">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" required class="form-control">

        <label class="form-label mt-2">Contraseña</label>
        <input type="password" name="password" placeholder="Contraseña" required class="form-control">

        <button class="btn btn-danger w-100 mt-3" type="submit" >Ingresar</button>
    </form>

    <?php if ($mensaje != ""): ?>
        <p id="mensaje-error"><?= $mensaje ?></p>
    <?php endif; ?>
    <div>
    <form action="", method = "post">
        <input class = "btn btn-link d-flex justify-content-center align-items-center" type="submit" value = "¿No tienes una cuenta?">
    </form>
    <?php
        if ( $_SERVER["REQUEST_METHOD"] == "POST")
        {
            header("Location: Registro.php");
            exit();
        }    
    ?>
</div>
</div>
</section>
</body>
</html>