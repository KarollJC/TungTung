<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <style>
        body {
            background: linear-gradient(135deg, #000000, #3a0505);
            min-height: 100vh;
        }
        
        .navbar-custom {
            background-color: rgba(220, 53, 69, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .nav-btn {
            transition: all 0.3s ease;
            border-width: 2px;
            font-weight: 500;
        }
        
        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .content-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .main-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .btn-login {
            min-width: 100px;
        }
        
        @media (max-width: 768px) {
            .main-title {
                font-size: 2rem;
            }
            
            .content-section {
                padding: 1rem;
            }
            
            .navbar-collapse {
                padding: 1rem 0;
            }
            
            .nav-btn {
                width: 100%;
                margin-bottom: 0.5rem;
                text-align: left;
            }
        }
        
        @media (max-width: 576px) {
            .main-title {
                font-size: 1.8rem;
            }
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        a:hover {
            color: inherit;
        }
        
        .card-custom {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_base = 'tungtung';
$db_port = '3306';

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_base, $db_port);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $usuario = $conexion->real_escape_string($usuario);
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;
    }
}


?>

<body class="text-white">
<nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold d-none d-md-block" href="inicio.php">
                Seguridad Vial
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav mx-auto justify-content-center flex-wrap">
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="Practicas_seguras/Practicas seguras/codigo.html">Prácticas seguras</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="Tipos_cascos.php">Tipos de Cascos</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="reglamento.html">Reglamento</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="accidentes motocicleta/crud_accidentesmoto/accidentes.php">Accidentes</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="preguntas_frecuentes/crud_preguntas/preguntas_frec.php">Preguntas Frecuentes</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="Contacto.php">Contacto</a>
                    </button>
                </div>
                <div class="d-flex justify-content-end ms-lg-3 mt-3 mt-lg-0">
                    
                    <p class="user-name me-3">Bienvenido, <?php echo isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "Usuario"?> </p>
                    
                        <button class="btn btn-light btn-login fw-bold">
                            <a href="login.php" class="text-danger">Login</a>
                        </button>
                
                </div>

            </div>
        </div>
    </nav>
<div class="container-fluid content-section">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <h1 class="main-title text-danger text-center mb-5">
                    Seguridad Vial para Motociclistas
                </h1>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-custom h-100 p-4">
                            <h3 class="text-danger mb-3">Presentación</h3>
                            <p class="text-light mb-0">
                                Sitio web informativo sobre seguridad vial para motociclistas.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-custom h-100 p-4">
                            <h3 class="text-danger mb-3">Objetivo</h3>
                            <p class="text-light mb-0">
                                El alumno programará módulos web informativos y
administrativos que promuevan prácticas seguras de
conducción, integrando frontend y backend mediante
tecnologías HTML, CSS, Bootstrap, JavaScript y PHP.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card card-custom h-100 p-4">
                            <h3 class="text-danger mb-3">Mensaje Principal</h3>
                            <div class="alert alert-danger border-0 m-0">
                                <strong>Tu seguridad es lo más importante.</strong> Usa siempre casco certificado.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card card-custom p-4">
                            <h4 class="text-danger mb-3">Más información</h4>
                            <p class="text-light lead">
                                Este sitio busca reducir accidentes mediante la educación y concientización 
                                sobre las mejores prácticas de seguridad para motociclistas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <footer class="bg-dark text-center text-white">
            <div class="container p-2 pb-0">
                <section class="mb-2">
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                    ><i class="fab fa-github"></i
                ></a>
                </section>
            </div>

            <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2025 ・ TungTungcitos ・ CBTis217
            </div>
        </footer>
    </div>

</body>
</html>