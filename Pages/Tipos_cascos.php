<?php
include('../Libs/tungtungcrud.php');
$dbHost = getenv('DB_HOST') ?: 'localhost';
session_start();
const MAX_CASCOS = 7;

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

$message = "";
$message_cascos = "";
$cascos_banner = [];
$cascos_inf = false;
$cascos_banner_empty = true;
$cascos_empty = true;

$db_conn = new Database($dbHost, "tungtung", "tungtungcitos", "1234");
$conexion = $db_conn->connect_db();

$sql = new CRUD($conexion, 'tipos_cascos');
$query_banner = $sql->read();

if($query_banner && is_array($query_banner) && count($query_banner) > 0)
{
    foreach ($query_banner as $row)
    {
        $row_clean = [];
        foreach ($row as $key => $value)
        {
            $row_clean[$key] = htmlspecialchars($value);
        }
        $cascos_banner[] = $row_clean;
    }
    $cascos_banner_empty = false;
}
else
{
    $message = "No se encontraron cascos para el banner";
}


$sql = new CRUD($conexion, 'cascos');
$query_cascos = $sql->read();

if ($query_cascos && is_array($query_cascos) && count($query_cascos) > 0)
{
    foreach ($query_cascos as $row)
    {
        $row_clean = [];
        foreach ($row as $key => $value)
        {
            $row_clean[$key] = htmlspecialchars($value);
        }
        $cascos[] = $row_clean;
    }
    $cascos_empty = false;
}
else
{
    $message_cascos = "No se encontraron productos de cascos";
}
$db_conn->close_connection();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/generalStyle.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link rel="stylesheet" href="css/stylesCascos.css">
</head>
<body class="text-white">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
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
                        href="#">
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
        
    <h1 class="text-center mb-4 fw-bold">Tipos de Cascos en Motocicletas</h1>
    <h6 class="text-center mb-4 fw-bold" style="color: #ff0000;"><?= $message ?></h6>

    <?php if ($cascos_banner_empty): ?>
    <div id="carouselCascos" class="carousel slide mb-4 carousel-fade">
        <div class="carousel-inner rounded shadow-lg overflow-hidden">
            <div class="carousel-item active">
                <img src="img/placeholder.jpg" class="d-block w-100" alt="Sin datos">
                <div class="carousel-caption">
                    <h5>No hay cascos a mostrar</h5>
                    <p>Información no disponible</p>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>

    <div id="carouselCascos" class="carousel slide mb-4 carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($cascos_banner as $i => $c): ?>
                <button type="button"
                    data-bs-target="#carouselCascos"
                    data-bs-slide-to="<?= $i ?>"
                    class="<?= $i === 0 ? 'active' : '' ?>">
                </button>
            <?php endforeach; ?>
            </div>

            <div class="carousel-inner rounded shadow-lg overflow-hidden">
                <?php foreach ($cascos_banner as $i => $c): ?>
                    <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                        <img src="<?= $c['imagen'] ?>" class="d-block w-100" alt="<?= $c['tipo'] ?>">
                        <div class="carousel-caption">
                            <h5><?= $c['tipo'] ?></h5>
                            <p><?= $c['descripcion_corta'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-10 mx-auto px-3"">
                <h4 class="text-center mb-4 mt-5 fw-bold">Existen varios tipos de cascos de motocicletas, cada uno diseñado para diferentes estilos de conducción y niveles de protección. Los principales tipos son:</h4>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-start">
                    
                </div>

                <div class="accord accordion" id="accordionExample">
            <?php foreach ($cascos_banner as $i => $tipo): ?>
                <?php
                    $collapseId = "collapse" . $i;
                    $headingId = "heading" . $i;
                ?>
                <div class="accord accordion-item">
                    <h2 class="accord accordion-header" id="<?= $headingId ?>">
                        <button class="accord accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#<?= $collapseId ?>">
                            <?= $tipo['tipo'] ?>
                        </button>
                    </h2>

                    <div id="<?= $collapseId ?>"
                        class="accord accordion-collapse collapse"
                        data-bs-parent="#accordionExample"
                        data-img="<?= $tipo['imagen'] ?>">

                        <div class="accord accordion-body text-white">
                            <p><?= $tipo['descripcion'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

    <section class="container my-5">
        <h3 class="text-center fw-bold mb-4">
            Modelos de Cascos Disponibles
        </h3>

        <div class="row g-4">
            <div class="row g-4">
                <?php if (!$cascos_empty): ?>
                    <?php foreach ($cascos as $casco): ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm bg-dark text-white">

                                <img src="<?= $casco['imagen']; ?>"
                                    class="card-img-top"
                                    style="height: 220px; object-fit: cover;"
                                    alt="Casco">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">
                                        <?= $casco['marca']; ?> <?= $casco['modelo']; ?>
                                    </h5>

                                    <span class="badge bg-secondary mb-2">
                                        <?= $casco['tipo_casco']; ?>
                                    </span>

                                    <p class="card-text small flex-grow-1">
                                        <?= $casco['descripcion']; ?>
                                    </p>

                                    <ul class="list-unstyled small mb-3">
                                        <li><strong>Certificación:</strong> <?= $casco['certificacion']; ?></li>
                                    </ul>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold fs-5 text-success">
                                            $<?= number_format($casco['precio'], 2); ?>
                                        </span>
                                        <button class="btn btn-outline-light btn-sm">
                                            Ver más
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm placeholder-glow bg-dark">
                            <div class="placeholder w-100" style="height: 220px;"></div>
                            <div class="card-body">
                                <h5 class="card-title placeholder col-8"></h5>
                                <p class="card-text placeholder col-10"></p>
                                <p class="card-text placeholder col-6"></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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

        <div class="text-center p-2" style="background-color: var(--footer-bg);">© 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>