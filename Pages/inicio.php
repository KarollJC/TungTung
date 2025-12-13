<?php
session_start();
$login_required = true;
$username = "";

if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/stylesNav.css">
</head>
<body class="text-white">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
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
                        href="vista_Reglamento/reglamento.html">
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
                    <?php
                    if($login_required)
                    {
                        echo "
                    <li class='nav-item'>
                    <button class=btn btn-outline-light nav-btn mx-2 my-1>
                        <a class='nav-link' href='login.php' style='color: white;'>Iniciar Sesión</a>
                    </button>
                    </li>";
                    }
                    else
                    {
                        echo "
                    <li class='nav-item dropdown'>
                    <button class=btn btn-outline-light nav-btn mx-2 my-1>
                        <a style='color: white;' class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$username</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' href='logout.php'>Cerrar Sesión</a>
                        </li>
                        </ul>
                    </button>
                    </li>";
                    }
                    ?>
                </ul>
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

    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <a style="color: white;" href="contacto.php">Contacto</a>
        </div>

        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>