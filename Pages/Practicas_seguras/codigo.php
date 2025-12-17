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
    <title>Practicas Seguras</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet" href="../css/stylesNav.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class=" bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../inicio.php">
                <img src="../img/rino.png" height="50px" alt="cbtislogo">
                Seguridad Vial
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-light nav-btn mx-2 my-1"
                        href="#">
                        Prácticas seguras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="../Tipos_cascos.php">
                        Tipos de Cascos
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="../reglamento.php">
                        Reglamento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="../accidentes_motocicleta/crud_accidentesmoto/accidentes.php">
                        Accidentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="../preguntas_frec.php">
                        FAQ
                        </a>
                    </li>
                    <?php
                    if($login_required)
                    {
                        echo "
                    <li class='nav-item'>
                            <a class='btn btn-outline-light nav-btn mx-2 my-1'
                            href='../login.php'> Iniciar Sesión</a>
                    </li>";
                    }
                    else
                    {
                        echo "
                    <li class='nav-item dropdown'>
                    <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                    if($is_admin)
                    {
                        echo 
                        "<i class='fas fa-server' style='color: var(--secondary-color);'></i>";
                    }
                    else
                    {
                        echo
                        "<i class='fas fa-user' style='color: var(--secondary-color);'></i>";
                    }
                    echo "
                        $username
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' href='../logout.php'>Cerrar Sesión</a>
                        </li>
                    </ul>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container my-5">
        <h3 class="text-danger">Prácticas seguras recomendadas</h3>
        <div class="accordion mb-4" id="practicasAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPracticas">
                    <button class="accordion-button bg-danger text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePracticas">
                        Lista completa de prácticas
                    </button>
                </h2>
                <div id="collapsePracticas" class="accordion-collapse collapse show" data-bs-parent="#practicasAccordion">
                    <div class="accordion-body">
                        <ol class="list-group list-group-numbered list-group-flush">
                            <li class="list-group-item">Revisar la presión de los neumáticos</li>
                            <li class="list-group-item">Evitar dejar el motor en ralentí al estacionarse (motor encendido sin movimiento del vehículo).</li>
                            <li class="list-group-item">Apagar el motor del vehículo cuando esté parado.</li>
                            <li class="list-group-item">Para mejorar el rendimiento del auto, la velocidad recomendable es de 80 km/h. En zonas urbanas: 50 km/h y en zonas escolares: 30 km/h.</li>
                            <li class="list-group-item">Mantener una velocidad uniforme o estable siempre que sea posible.</li>
                            <li class="list-group-item">Conducir con suavidad y anticiparse a posibles paradas, evitando aceleraciones repentinas y frenado brusco.</li>
                            <li class="list-group-item">Conducir a bajas revoluciones: en vehículos a gasolina pasar a la marcha superior entre 2.000 y 2.500 rpm; en vehículos diésel desde 1.500 rpm.</li>
                            <li class="list-group-item">Planificar la ruta más eficiente de viaje, evitando vueltas innecesarias.</li>
                            <li class="list-group-item">Uso correcto del aire acondicionado: ajustar temperatura según necesidad.</li>
                            <li class="list-group-item">Apagar el aire acondicionado antes de apagar el vehículo.</li>
                            <li class="list-group-item">Cierre de ventanillas a velocidades de carretera para menor resistencia al aire.</li>
                            <li class="list-group-item">Evitar exceso de equipaje (menos carga, más eficiencia de combustible).</li>
                            <li class="list-group-item">Conocer el reglamento de tránsito.</li>
                            <li class="list-group-item">Respetar la normativa vial y actuar con responsabilidad en el tránsito.</li>
                            <li class="list-group-item">No conducir cansado ni bajo efectos de alcohol o sustancias tóxicas.</li>
                            <li class="list-group-item">No usar el teléfono celular mientras se conduce.</li>
                            <li class="list-group-item">Utilizar siempre el cinturón de seguridad del conductor y acompañantes.</li>
                            <li class="list-group-item">Respetar distancia de seguridad entre automóviles (al menos un auto de distancia).</li>
                            <li class="list-group-item">Evitar carriles rápidos en vías y circular por la derecha a velocidad autorizada.</li>
                            <li class="list-group-item">Prestar atención a la señalización de tránsito y límites de velocidad.</li>
                            <li class="list-group-item">Conducir a la defensiva, respetando a otros conductores y usuarios vulnerables.</li>
                            <li class="list-group-item">Si la ruta es larga, dormir al menos 8 horas antes de salir.</li>
                            <li class="list-group-item">Si conduces solo y te falta tramo, buscar lugar seguro para descansar 30 minutos.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-danger">Panorama de la situación de tránsito</h3>
        <div class="card mb-4">
            <div class="card-body">
                <p>Durante la conducción es importante mantener un adecuado campo visual mediante:</p>
                <ol>
                    <li>Mirada hacia adelante a suficiente distancia (unos 200 metros).</li>
                    <li>Modificación constante del campo visual usando espejos retrovisores interiores y exteriores.</li>
                    <li>Posición adecuada de asiento y espejos; evitar obstáculos visuales.</li>
                </ol>
            </div>
        </div>

        <h3 class="text-danger">Punto ciego</h3>
        <div class="card mb-4">
            <div class="card-body">
                <p>Los puntos ciegos son las áreas no cubiertas por los espejos retrovisores. Ajuste los espejos y gire la cabeza para verificar zonas no visibles, especialmente al ingresar a autopistas.</p>
                <p>Ajuste el espejo exterior de modo que se vea el extremo de la manija de la puerta delantera; esto permite ver parte de los carriles a la izquierda y detrás.</p>
            </div>
        </div>

        <h3 class="text-danger">Maniobra de giro</h3>
        <div class="card mb-4">
            <div class="card-body">
                <p>Al realizar un giro, la preferencia la tienen peatones y vehículos que circulan transversalmente. Evite giros imprevistos.</p>
                <p>Circulando desde 30 metros antes, colocarse en el lado más próximo al giro y verificar espejos que otros vehículos perciban la señal de giro.</p>
            </div>
        </div>

        <h3 class="text-danger">Distancia de frenado</h3>
        <div class="card mb-4">
            <div class="card-body">
                <p>Distancia que recorre un vehículo desde que se advierte un peligro hasta que se detiene completamente. Ejemplo: a 100 km/h se requieren 150 m.</p>
                <p>En descensos prolongados, no usar freno continuamente; usar motor para controlar velocidad.</p>
            </div>
        </div>

        <h3 class="text-danger">Conducción nocturna</h3>
        <div class="card mb-4">
            <div class="card-body">
                <ol>
                    <li>Antes de iniciar, revisar sistema eléctrico y luces.</li>
                    <li>Circular por debajo de velocidad máxima permitida.</li>
                    <li>No mirar faros de vehículos de frente, guiarse por línea de borde.</li>
                    <li>Siempre circular con luces bajas encendidas.</li>
                    <li>Encender luces antes de entrar a túnel.</li>
                </ol>
            </div>
        </div>

        <h3 class="text-danger">¿Qué hacer en caso de siniestro?</h3>
        <div class="card mb-4">
            <div class="card-body">
                <ol>
                    <li>Detenerse en un lugar seguro y señalizar con balizas.</li>
                    <li>No darse a la fuga.</li>
                    <li>Llamar a aseguradora y 911.</li>
                    <li>No mover heridos salvo riesgo inminente.</li>
                </ol>
            </div>
        </div>

        <h3 class="text-danger">¿Qué revisar antes de usar el vehículo?</h3>
        <div class="card mb-4">
            <div class="card-body">
                <ol>
                    <li>Revisar niveles de combustible, aceite, líquidos y agua de limpiaparabrisas.</li>
                    <li>Revisar funcionamiento de cinturones, bolsas de aire, frenos y luces.</li>
                    <li>Llanta de refacción, herramientas y triángulos reflectantes.</li>
                    <li>Documentación y números de emergencia.</li>
                    <li>Revisar condiciones climáticas del lugar de destino.</li>
                </ol>
            </div>
        </div>
    </div>

    <h5>Referencias:</h5>
    <a href="https://www.imt.mx/images/files/CIEG/Guia_Buenas_Practicas_Conduccion.pdf" class="btn btn-link" target="_blank">
        Guía de Buenas Prácticas de Conducción
    </a>
    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <a style="color: white;" href="../Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: var(--footer-bg);">© 2025 TungTungcitos
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>