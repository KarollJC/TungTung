<?php
require_once '../Libs/tungtungcrud.php';

$mensaje = "";
$informacion_cascos = [];

$db = new Database('localhostlocalhost', 'tungtung', 'root', '');
$conexion = $db->connect_db();

$crud = new CRUD($conexion, 'cascos');
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
        echo "<h5>" . $casco['tipo_casco'] . "</h5>";
        echo "<p>" . $casco['descripcion'] . "</p>";
    }
}

function get_tipo_casco($index)
{
    global $informacion_cascos;
    return isset($informacion_cascos[$index]) ? $informacion_cascos[$index]['tipo_casco'] : '';
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
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoIntegral">
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
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoModular">
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
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoJet">
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
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoClasico">
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
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoOffRoad">
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
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoDual">
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
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoTrail">
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

    <div>
        <section>
            <!-- -->
        </section>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>