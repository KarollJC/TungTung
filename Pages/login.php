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
        header("Location: inicio.php");
        exit();
    } 
    else {
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
    <title>Login - Seguridad Vial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
    </style>
</head>
<body class="text-white">
<section class="d-flex justify-content-center align-items-center min-vh-100 p-3">
    <div class="login-container">
        <h2 class="text-center mb-4 text-danger fw-bold">Iniciar Sesión</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" required class="form-control">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contra" placeholder="Ingresa tu contraseña" required class="form-control">
            </div>

            <button class="btn btn-danger w-100 mt-3 fw-bold" type="submit">Ingresar</button>
        </form>

        <?php if ($mensaje != ""): ?>
            <div id="mensaje-error" class="mt-3">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>
        
        <div class="text-center mt-4">
            <form action="Registro.php" method="GET">
                <button type="submit" class="btn btn-link btn-register-link">
                    ¿No tienes una cuenta? Regístrate aquí
                </button>
            </form>
        </div>
    </div>
</section>
</body>
</html>