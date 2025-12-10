<?php
require_once '../Libs/tungtungcrud.php';

const MAX_CASCOS = 7;
$mensaje = "";
$informacion_cascos = [];

//$db = new Database('localhost', 'tungtung', 'root', '');
$db = new Database('db', 'tungtung', 'angel', '1234');
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
    <title>Tipos de Cascos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #000000, #3a0505);
            min-height: 100vh;
            color: white;
        }
        .carousel-item img {
            height: 380px;
        }
    </style>
</head>
<body>
<div class="container py-5">
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

    <!---->
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <?= get_tipo_casco(0); ?>
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>
                    <?=
                        isset($informacion_cascos[0]) ? $informacion_cascos[0]['descripcion'] : '';
                    ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?= get_tipo_casco(1); ?>
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>
                    <?=
                        isset($informacion_cascos[1]) ? $informacion_cascos[1]['descripcion'] : '';
                    ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <?= get_tipo_casco(2); ?>
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>
                    <?=
                        isset($informacion_cascos[2]) ? $informacion_cascos[2]['descripcion'] : '';
                    ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>