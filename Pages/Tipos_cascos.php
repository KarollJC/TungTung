<?php
require_once '../Libs/tungtungcrud.php';
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

$mensaje = "";
$short_cascos = false;
$hay_cascos = false;
$cascos = [];

$db = new Database($dbHost, 'tungtung', 'tungtungcitos', '1234');
$conexion = $db->connect_db();
$sql = new CRUD($conexion, 'tipos_cascos');
$query = $sql->read();

if($query && is_array($query) && count($query) > 0)
{
    $short_cascos = false;
}
else
{
    $mensaje = "Error interno: No se encontraron cascos en la base de datos.";
}

$crud_cascos = new CRUD($conexion, 'cascos');
$resultado_cascos = $crud_cascos->read();
if ($resultado_cascos && is_array($resultado_cascos) && count($resultado_cascos) > 0)
{
    foreach ($resultado_cascos as $casco)
    {
        $casco_procesado = [];
        foreach ($casco as $key => $value)
        {
            $casco_procesado[$key] = htmlspecialchars($value);
        }
        $cascos[] = $casco_procesado;
    }
    $hay_cascos = true;
}

$db->close_connection();

function display_carrousel_info($index)
{
    global $informacion_cascos;
    if(isset($informacion_cascos[$index]))
    {
        $casco = $informacion_cascos[$index];
        echo "<h5>" . $casco['tipo'] . "</h5>";
        echo "<p>" . $casco['descripcion_corta'] . "</p>";
    }
}

function get_tipo_casco($index)
{
    global $informacion_cascos;
    return isset($informacion_cascos[$index]) ? $informacion_cascos[$index]['tipo'] : '';
}
function get_image_path($index)
{
    global $informacion_cascos;
    return isset($informacion_cascos[$index]) ? $informacion_cascos[$index]['imagen'] : '';
}
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
        
    <h1 class="text-center mb-4 fw-bold">Tipos de Cascos en Motocicletas</h1>
    <h6 class="text-center mb-4 fw-bold" style="color: #ff0000;"><?= $mensaje ?></h6>

    <div id="carouselCascos" class="carousel slide mb-4 carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="5"></button>
            <button type="button" data-bs-target="#carouselCascos" data-bs-slide-to="6"></button>
        </div>
        <div class="carousel-inner rounded shadow-lg overflow-hidden">
            <div class="carousel-item active">
                <img src="<?= get_image_path(0); ?>" class="d-block w-100" alt="CascoIntegral">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(0); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(0); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(1); ?>" class="d-block w-100" alt="CascoModular">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(1); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(1); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(2); ?>" class="d-block w-100" alt="CascoJet">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(2); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(2); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(3); ?>" class="d-block w-100" alt="CascoClasico">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(3); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(3); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(4); ?>" class="d-block w-100" alt="CascoOffRoad">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(4); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(4); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(5); ?>" class="d-block w-100" alt="CascoDual">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(5); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(5); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= get_image_path(6); ?>" class="d-block w-100" alt="CascoTrail">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo get_tipo_casco(6); ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(6); ?>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCascos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCascos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-6 col-lg-4 centered">
        <h4 class="text-center mb-4 mt-5 fw-bold">Existen varios tipos de cascos de motocicletas, cada uno diseñado para diferentes estilos de conducción y niveles de protección. Los principales tipos son:</h4>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-start">
                <img id="previewImg" src="../img/imgtest.gif" class="img-fluid rounded" alt="Imagen casco">
            </div>

            <div class="col-12 col-md-8">
                <div class="accordion" id="accordionExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            <?= get_tipo_casco(0); ?>
                        </button>
                        </h2>

                        <div id="collapseOne"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample"
                            data-img="<?= get_image_path(0); ?>">

                            <div class="accordion-body">
                                <p><?= isset($informacion_cascos[0]) ? $informacion_cascos[0]['descripcion'] : ''; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            <?= get_tipo_casco(1); ?>
                        </button>
                        </h2>

                        <div id="collapseTwo"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample"
                            data-img="<?= get_image_path(1); ?>">

                            <div class="accordion-body">
                                <p><?= isset($informacion_cascos[1]) ? $informacion_cascos[1]['descripcion'] : ''; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            <?= get_tipo_casco(2); ?>
                        </button>
                        </h2>

                        <div id="collapseThree"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample"
                            data-img="<?= get_image_path(2); ?>">

                            <div class="accordion-body">
                                <p><?= isset($informacion_cascos[2]) ? $informacion_cascos[2]['descripcion'] : ''; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="container my-5">
        <h3 class="text-center fw-bold mb-4">
            Modelos de Cascos Disponibles
        </h3>

        <div class="row g-4">
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

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm placeholder-glow bg-dark">
                    <div class="placeholder w-100"
                        style="height: 220px;"></div>

                    <div class="card-body">
                        <h5 class="card-title placeholder col-8"></h5>
                        <p class="card-text placeholder col-10"></p>
                        <p class="card-text placeholder col-6"></p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="placeholder col-4"></span>
                            <span class="btn btn-outline-secondary disabled placeholder col-4"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const preview = document.getElementById('previewImg');
        const collapses = document.querySelectorAll('.accordion-collapse');

        collapses.forEach(collapse => {
            collapse.addEventListener('show.bs.collapse', () => {
                const nuevaImagen = collapse.getAttribute('data-img');
                preview.src = nuevaImagen;
            });
        });
    });
    </script>

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