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
    <title>Vista Normativa y Reglamento Vial</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link rel="stylesheet" href="vista_Reglamento/css/estilo.css">
</head>
<body class="bg-dark text-white">
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
                        <a class="btn btn-light nav-btn mx-2 my-1"
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
                        <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$username</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
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
      <br>

      <p class="h3 fw-bold">Normas y Reglamento Vial</p>
      <p>El Decreto Número 201, expedido por la Quincuagésima Novena
         Legislatura Constitucional del Estado, publicado en el Periódico Oficial del
         Gobierno del Estado, de fecha 27 veintisiete de octubre de 2005 dos mil cinco,
         mediante el cual se reforman, adicionan y derogan diversas disposiciones de la
         Ley de Tránsito y Transporte del Estado de Guanajuato, establece en su Artículo
         Tercero Transitorio la necesidad de adecuar los reglamentos respectivos, los
         cuales deberán constituirse como el instrumento legal idóneo que permitirá la
         exacta observancia de la citada Ley. </p>


    <div class="container py-5">
    
    <div class="text-center mb-4">
        <h1 class="fw-bold">Reglas de Tránsito</h1>
        <p class="text-muted">Principales normas del Reglamento de Tránsito del Estado de Guanajuato</p>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <p class="h5 card-title text-danger">1. Licencia y documentación</p>
                    <ul class="card-text">
                        <li>Conducir solo con licencia vigente y tarjeta de circulación.</li>
                        <li>Está prohibido manejar sin licencia o con una que no corresponda al tipo de vehículo.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <p class=" h5 card-title text-danger">2. Señalamientos y semáforos</p>
                    <ul class="card-text">
                        <li>Se deben obedecer todos los señalamientos, ya sean verticales, horizontales o semáforos.</li>
                        <li>La luz roja obliga a detenerse; en verde se puede avanzar con precaución.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">3. Límites de velocidad</h5>
                    <ul class="card-text">
                        <li>Máximo general en zonas urbanas: 50 km/h.</li>
                        <li>Zonas escolares, hospitales o con mucha afluencia: 10 km/h.</li>
                        <li>Donde no hay señalización: Carretera libre: 95 km/h y Autopista estatal: 100 km/h</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">4. Uso del carril</h5>
                    <ul>
                        <li>Circular siempre por el carril derecho; el izquierdo solo para rebasar.</li>
                        <li>Prohibido circular sobre el acotamiento.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">5. Reglas para rebasar</h5>
                     <ul>
                        <li>Rebasar solo por la izquierda y únicamente donde esté permitido por las líneas y visibilidad.</li>
                     </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">6. Seguridad del vehículo</h5>
                     <ul>
                        <li>Uso obligatorio de cinturón de seguridad.</li>
                        <li>Vehículo debe contar con luces, espejos, frenos, llanta de refacción y extintor.</li>
                        <li>Prohibido manejar en estado de ebriedad o bajo sustancias que alteren reflejos.</li>
                     </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">7. Motociclistas y ciclistas</h5>
                    <ul>
                        <li>Deben usar casco.</li>
                        <li>No pueden circular sobre banquetas.</li>
                        <li>Máximo dos motos por carril.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">8. Peatones</h5>
                    <ul>
                        <li>Tienen preferencia de paso en cruces y zonas señalizadas.</li>
                        <li>Conductores deben ceder paso y no rebasar a otro vehículo detenido por peatones.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">9. Estacionamiento</h5>
                    <ul>
                        <p class="text-black">Prohibido estacionarse en:</p>
                            <li>Entradas y salidas de vehículos.</li>
                            <li>Esquinas</li>
                            <li>Lugares marcados con guarnición amarilla.</li>
                            <li>Espacios para personas con discapacidad, salvo permiso autorizado.</li>
                        </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">10. Prohibiciones generales</h5>
                    <ul>
                        <li>No usar celular mientras se conduce.</li>
                        <li>No hacer arrancones, acrobacias o maniobras peligrosas.</li>
                        <li>No transportar personas colgadas de la carrocería.</li>
                        <li>No tirar basura desde el vehículo.</li>
                    </ul>
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
            <a style="color: white;" href="Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 TungTungcitos
        </div>
    </footer>
</body>
</html>