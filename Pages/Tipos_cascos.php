<?php
const DB_HOST="localhost";
const DB_USER="root";
const DB_PASS='';
const DB_DATABASE="tungtung";
const DB_PORT=3306;
$mensaje = "";

$informacion_cascos = array();

enum Nombres: int {
    case Integral = 0;
    case Modular = 1;
    case Jet = 2;
    case Calimero = 3;
    case OffRoad = 4;
    case Dual = 5;
    case Trail = 6;
};
enum Cascos: int {
    case id = 0;
    case Marca = 1;
    case Modelo = 2;
    case Tipo_de_casco = 3;
    case Certificacion= 4;
    case Descripcion = 5;
    case Descripcion_detallada = 6;
    case Precio = 7;
    case Fecha_registro = 8;
};

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

if(!$conexion)
{
    $mensaje = "Error: No se pudo conectar a la base de datos." . mysqli_connect_error();
    exit();
}

$consulta = "SELECT * FROM cascos";
$resultado = mysqli_query($conexion, $consulta);

if($resultado != null && mysqli_num_rows($resultado) > 0)
{
    $index = 0;
    $fields = ['id_cascos', 'marca', 'modelo', 'tipo_casco', 'certificacion', 'descripcion', 'descripcion_detallada', 'precio', 'fecha_registro'];

    while($datos_casco = mysqli_fetch_assoc($resultado))
    {
        $informacion_cascos[$index] = array();

        for($i=0; $i<count($fields); $i++)
        {
            $informacion_cascos[$index][$i] = htmlspecialchars($datos_casco[$fields[$i]]);
        }
        $index++;
    }
}
else
{
    $mensaje = "Error interno.";
}
mysqli_close($conexion);

function display_carrousel_info($tipo_casco)
{
    global $informacion_cascos;
    $casco = $informacion_cascos[$tipo_casco][Cascos::Tipo_de_casco->value];
    $descripcion_corta = $informacion_cascos[$tipo_casco][Cascos::Descripcion->value];

    echo "<h5>" . $casco . "</h5>";
    echo "<p>"  . $descripcion_corta . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Cascos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
    <h4 class="text-center mb-4 fw-bold"><?= $mensaje ?></h4>

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
        <div class="carousel-inner rounded shadow-lg overflow-hidden">+
            <div class="carousel-item active">
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoIntegral">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Integral->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Integral->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoModular">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Modular->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Modular->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoJet">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Jet->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Jet->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoClasico">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Calimero->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Calimero->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoOffRoad">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::OffRoad->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::OffRoad->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.gif" class="d-block w-100" alt="CascoDual">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Dual->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Dual->value); ?>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/imgtest.png" class="d-block w-100" alt="CascoTrail">
                <div class="carousel-caption">
                    <div class="d-block d-md-none">
                        <h5>
                            <?php echo $informacion_cascos[Nombres::Trail->value][Cascos::Tipo_de_casco->value]; ?>
                        </h5>
                    </div>
                    <div class="d-none d-md-block">
                        <?php display_carrousel_info(Nombres::Trail->value); ?>
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

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>