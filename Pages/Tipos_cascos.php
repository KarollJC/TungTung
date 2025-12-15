<?php
require_once '../Libs/tungtungcrud.php';
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

const MAX_CASCOS = 7;
$mensaje = "";
$informacion_cascos = [];

$db = new Database('localhost', 'tungtung', 'root', '');
//$db = new Database('db', 'tungtung', 'tungtungcitos', '1234');
$conexion = $db->connect_db();

$crud = new CRUD($conexion, 'tipos_cascos');
$resultado = $crud->read();

if($resultado && is_array($resultado) && count($resultado) > 0)
{
    foreach($resultado as $datos_casco)
    {
        $casco_procesado = [];
        foreach($datos_casco as $key => $value)
        {
            $casco_procesado[$key] = htmlspecialchars($value);
        }
        $informacion_cascos[] = $casco_procesado;
    }
}
else
{
    $mensaje = "Error interno: No se encontraron cascos en la base de datos.";
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
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <style>
        .carousel-item img {
            height: 380px;
        }
    </style>
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
                        href="codigo.php">
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
                        href="accidentes.php">
                        Accidentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="preguntas_frec.php">
                        FAQ
                        </a>
                    </li>
                    <?php
                    if($login_required)
                    {
                        echo "
                    <li class='nav-item'>
                        <a class='btn btn-outline-light nav-btn mx-2 my-1'
                        href='login.php'> Iniciar Sesión</a>
                    </li>";
                    }
                    else
                    {
                        echo "
                    <li class='nav-item dropdown'>
                    <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    <i class='fas fa-user' style='color: var(--secondary-color);'></i>
                        $username
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    ";
                    if($is_admin)
                    {
                        echo
                        "<li><a class='dropdown-item' href='admin.php'>Admin</a></li>
                        </li>";
                    }
                    echo "
                        <li>
                            <a class='dropdown-item' href='logout.php'>Cerrar Sesión</a>
                        </li>
                    </ul>
                    </li>";
                    }
                    ?>
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

    <h4 class="text-center mb-4 fw-bold">Existen varios tipos de cascos de motocicletas, cada uno diseñado para diferentes estilos de conducción y niveles de protección. Los principales tipos son:</h4>

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
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>