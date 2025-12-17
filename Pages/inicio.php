<?php
session_start();
$login_required = true;
$is_admin = false;
$username = "";
if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
    if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"])
    {
        $is_admin = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/generalStyle.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="text-white">
    <div id="principal">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/rino.png" height="50px" alt="cbtislogo">
                    Seguridad Vial
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="btn btn-outline-light nav-btn mx-2 my-1"
                            href="Practicas_seguras/codigo.php">
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
                            href="accidentes_motocicleta/crud_accidentesmoto/accidentes.php">
                            Accidentes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light nav-btn mx-2 my-1"
                            href="preguntas_frec.php">
                            FAQ
                            </a>
                        </li>
                        <?php if($login_required): ?>
                        <li class='nav-item'>
                            <a class='btn btn-outline-light nav-btn mx-2 my-1'
                            href='login.php'> Iniciar Sesión</a>
                        </li>
                        <?php else: ?>
                        <li class='nav-item dropdown'>
                            <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            <?php if($is_admin): ?>
                            <i class='fas fa-server' style='color: var(--secondary-color);'></i>
                            <?php else: ?>
                            <i class='fas fa-user' style='color: var(--secondary-color);'></i>
                        <?php endif; ?>
                            <?= $username ?>
                        </a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <li>
                                <a class='dropdown-item' style="color: var(--light-dark);" href='logout.php'>Cerrar Sesión</a>
                            </li>
                        </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header id="header">
            <div id="bannerCont">
                <h1 class="card-title text-danger">Seguridad Vial para Motociclistas</h1><br>
                <p class="textBanner">Identifica cuales son las practicas correctas para una <br> conducción segura a la hora de manejar motocicleta.</p><br>
                <div class="d-flex align-items-center gap-3 mt-3">
                    <p class="fecha mb-0">Publicación 17 Dic 2025</p>
                    <div class="dropdown dropup">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Autores
                        </button>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item" href="#">Barrientos Vital Ángel David</a></li>
                            <li><a class="dropdown-item" href="#">Ferreyra Guzmán Ámerica Janeth</a></li>
                            <li><a class="dropdown-item" href="#">Gordillo Aguilar Leonardo</a></li>
                            <li><a class="dropdown-item" href="#">Juárez Cuevas Karol</a></li>
                            <li><a class="dropdown-item" href="#">Moreno Domínguez Víctor Hugo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div id="cont1" class="container-fluid pt-5 pb-4">
            <h2>¿Por qué es importante la seguridad vial?</h2><br>
            <p>La seguridad vial para motociclistas es fundamental debido a su alta exposición en la vía pública. <br>
            La falta de protección adecuada, el incumplimiento de las normas y la conducción imprudente <br>
            incrementan el riesgo de accidentes graves. <br><br>
            Informarse, respetar el reglamento vial y adoptar prácticas seguras puede marcar <br> la diferencia entre un viaje seguro y un accidente.</p>
        </div>


        <div class="container-fluid content-section">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                    <div class="row g-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-custom h-100 p-4">
                                <h3 class="text-danger mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-motorcycle fs-4 text-light"></i>
                                    Presentación
                                </h3>
                                <p class="text-light mb-0">
                                    Sitio web informativo enfocado en concientizar a los 
                                    motociclistas sobre la importancia de la seguridad 
                                    vial y la prevención de accidentes.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-custom h-100 p-4">
                                <h3 class="text-danger mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-bullseye fs-4 text-white"></i>
                                    Objetivo
                                </h3>
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
                                <h3 class="text-danger mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-message fs-4 text-white"></i>
                                    Mensaje Principal
                                </h3>
                                <div class="alert alert-danger border-0 m-0">
                                    <strong>Tu seguridad es lo más importante.</strong> Usa siempre casco certificado y respeta las normas de tránsito.
                                </div>
                            </div>
                        </div>

                    <section id="cont2" class="container my-5 card card-custom p-4">
                        <h2 class="text-center mb-4">
                            ¿Qué encontrarás en este sitio?
                        </h2>
                        <div class="row text-light">
                            <div class="col-12 col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Prácticas seguras de conducción
                                    </li>
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Tipos de cascos y su importancia
                                    </li>
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Normativa y reglamento vial
                                    </li>
                                </ul>
                            </div>

                            <div class="col-12 col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Información sobre accidentes en motocicleta
                                    </li>
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Preguntas frecuentes (FAQ)
                                    </li>
                                    <li class="mb-3 d-flex align-items-start gap-2">
                                        <i class="fa-solid fa-check text-danger mt-1"></i>
                                        Registro y compromiso de conducción segura
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <div class="row">
                        <div class="col-10 mx-auto px-3"">
                            <h4 class="text-center mb-2 mt-3 fw-bold" style="color: var(--red-bright)">Nuestro objetivo con esta página es:</h4>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-4 g-4 text-center align-items-stretch">
                        <div class="col">
                            <div class="card card-custom h-100 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/Escudo_ico.png" width="50" alt="Accidentes">
                                    <div>
                                        <p class="mb-0 py-1 text-light">Reducir el riesgo de accidentes un:</p>
                                        <h4 class="text-danger fw-bold mb-1">90%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-custom h-100 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/Educacion.png" width="65" alt="Educación vial">
                                    <div>
                                        <p class="mb-0 py-1 text-light">Reforzar la educación vial</p>
                                        <h4 class="text-danger fw-bold mb-1">Clave</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-custom h-100 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/Casco_ico.png" width="60" alt="Casco">
                                    <div>
                                        <p class="mb-0 py-1 text-light">Fomentar usar el casco en todas las:</p>
                                        <h4 class="text-danger fw-bold mb-1">Personas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card card-custom h-100 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/Personas_ico.png" width="50" alt="Conciencia vial">
                                    <div>
                                        <p class="mb-0 py-1 text-light">Aumentar la conciencia vial en nuestro</p>
                                        <h4 class="text-danger fw-bold mb-1">Estado</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button">
                <i class="fab fa-github"></i>
            </a>
            </section>
            <a style="color: white;" href="Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: var(--footer-bg);">
            © 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>