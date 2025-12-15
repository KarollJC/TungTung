<?php
include('../Libs/tungtungcrud.php');
session_start();
if(isset($_SESSION["logged"]))
{
    header("Location: inicio.php");
    exit();
}

$logged = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $admin = false;
    $username = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : '';
    $password = isset($_POST["contra"]) ? $_POST["contra"] : '';

    $db_conn = new Database("localhost","tungtung","tungtungcitos","1234"); //<-Los demas
    //$db_conn = new Database("db","tungtung","tungtungcitos","1234"); //<- David
    $conn = $db_conn->connect_db();
    $sql = new CRUD($conn, 'usuarios');
    $query = $sql->read('usuario = ?', [$username], null, 1);

    $stored = null;
    $id = null;
    $password_ok = false;
    $admin = null;

    if(!empty($query))
    {
        $stored = $query[0]['contra'];
        $id = $query[0]['id_usuario'];

        if($password === $stored)
        {
            $password_ok = true;
            $logged = true;
        }

        if($logged)
        {
            $sql = new CRUD($conn, 'admins');
            $query2 = $sql->read('user_id = ?', [$id], null, 1);

            if(!empty($query2))
            {
                $admin = true;
            }
        }
    }

    $db_conn->close_connection();

    if($logged)
    {
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $username;
        if($admin) $_SESSION['is_admin'] = true;

        header("Location: inicio.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Seguridad Vial</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/stylesNav.css">
</head>
<body class="text-white body">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="img/rino.png" height="50px" alt="">
                Seguridad Vial
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="Practicas_seguras/Practicas seguras/codigo.html">
                        Prácticas seguras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="Tipos_cascos.php">
                        Tipos de Cascos
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="reglamento.php">
                        Reglamento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="accidentes motocicleta/crud_accidentesmoto/accidentes.php">
                        Accidentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="preguntas_frecuentes/crud_preguntas/preguntas_frec.php">
                        FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="Registro.php">
                        Registrarse
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<section class="d-flex justify-content-center align-items-center min-vh-100 p-3">
    <div class="login-container">
        <h2 class="text-center mb-4 text-danger fw-bold">Iniciar Sesión</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" required class="form-control">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contra" id="contra" placeholder="Ingresa tu contraseña" required class="form-control">
            </div>

            <button class="btn btn-danger w-100 mt-3 fw-bold" type="submit">Ingresar</button>
        </form>

        <div class="text-center mt-4">
            <?php if(!$logged) "Credenciales incorrectas" ?>
            <p type="submit">¿No tienes una cuenta?
                <a style="color: var(--link-color);" href="Registro.php"><u> Regístrate aquí</u></a></p>
        </div>
    </div>
</section>

    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <a style="color: white;" href="Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>