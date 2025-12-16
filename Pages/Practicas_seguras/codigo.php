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
<body class="text-white">
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
    <br> 
    <p class="h3">Practicas seguras recomendadas</p><br>
    <ol class="letras">
        <li><p>Revisar la presión de los neumáticos</p></li>
        <li><p>Evitar dejar el motor en ralentí al estacionarse (motor encendido sin movimiento del vehículo).</p></li>
        <li><p>Apagar el motor del vehículo cuando esté parado.</p></li>
        <li><p>Para mejorar el rendimiento del auto, la velocidad recomendable es de 80 km/h. Cuando circules por zonas urbanas: 50 km/h y en zonas escolares: 30 km/h.</p></li>
        <li><p>Mantener una velocidad uniforme o estable siempre que sea posible.</p></li>
        <li><p>Conducir con suavidad y anticiparse a posibles paradas, evitando las aceleraciones repentinas y el frenado brusco (conducción con suficiente anticipación y previsión).</p></li>
        <li><p>Conducir a bajas revoluciones: en vehículos a gasolina es recomendable pasar a la marcha superior entre 2.000 y 2.500 rpm; en la 4.ª, 5.ª y 6.ª marcha el motor consume menos combustible. En vehículos diésel es recomendable pasar a la marcha superior desde 1.500 rpm.</p></li>
        <li><p>Planificar la ruta más eficiente de viaje, evitando vueltas innecesarias o rutas ineficientes.</p></li>
        <li><p>Uso correcto del aire acondicionado: ajustar la temperatura requerida, ya que a menor temperatura mayor consumo de energía y combustible.</p></li>
        <li><p>Apagar el aire acondicionado antes de apagar el vehículo.</p></li>
        <li><p>Cierre de ventanillas a velocidades de carretera o autopista para generar menor resistencia al aire.</p></li>
        <li><p>Evitar exceso de equipaje (menos carga, más eficiencia de combustible).</p></li>
        <li><p>Conocer el reglamento de tránsito.</p></li>
        <li><p>Respetar la normativa vial y actuar con responsabilidad en el tránsito.</p></li>
        <li><p>No conducir cansado ni bajo efectos de sustancias tóxicas o alcohol.</p></li>
        <li><p>No usar el teléfono celular mientras se conduce.</p></li>
        <li><p>Utilizar siempre el cinturón de seguridad del conductor y de los acompañantes.</p></li>
        <li><p>Respetar una adecuada distancia de seguridad entre los automóviles (al menos un auto de distancia).</p></li>
        <li><p>Evitar los carriles rápidos en las vías y circular en el carril de la mano derecha a la velocidad autorizada. Al circular por la derecha es importante analizar la situación del tránsito y tener en cuenta las características de la estructura del camino. Observar si está dividido en varios carriles de distintas direcciones y/o si dispone de carriles para bicicletas y peatones.</p></li>
        <li><p>Prestar atención a la señalización existente de tránsito y a los límites de velocidad.</p></li>
        <li><p>Maneja a la defensiva, dale preferencia a los usuarios vulnerables, respeta a los otros conductores y evita los conflictos.</p></li>
        <li><p>Si vas a salir de comisión y tu ruta es larga, recuerda dormir bien una noche antes, al menos ocho horas, para evitar problemas de fatiga.</p></li>
        <li><p>No conduzcas cansado, si te acompaña alguien que pueda conducir haz un relevo en la conducción, pero si conduces solo y aún te falta tramo por recorrer, busca un lugar seguro para descansar y trata de dormir 30 minutos, este descanso te permitirá conducir otras tres horas. </p></li>
    </ol>
    <br>

    <p class="h3">Panorama de la situación de tránsito</p>
    <p>Durante la conducción es de gran importancia mantener un adecuado campo visual ya que permite la observación circundante mediante:</p>
    <ol>
    <li>La mirada hacia adelante a suficiente distancia (unos 200 metros).</li>
    <li>La modificación constante del campo visual, mirando detrás del vehículo, por los espejos retrovisores interiores y exteriores.</li>
    <li>Una mirada atenta, alternativamente a mayor o menor lejanía, que permite contemplar de forma más amplia la circulación de la vía. Se debe mantener una posición adecuada, tanto de los espejos retrovisores como de los asientos del vehículo, y es recomendable no obstaculizar la visión con diversos elementos o vidrios que impidan la visual a los automóviles que circulan detrás.</li>
    </ol> 
    <br>

    <p class="h3">Punto ciego</p>
    <p>Los puntos ciegos son las áreas de visión no cubiertas por los tres espejos retrovisores: central, en el interior
       del vehículo, lateral derecho e izquierdo, y por la visión directa delantera. Esto significa que hay una zona que
       el conductor no visualiza. Se debe ajustar el espejo retrovisor interior y los espejos laterales exteriores para
       reducir los puntos ciegos, ya que son zonas que el conductor no puede observar detrás de su automóvil a través
       de los espejos retrovisores. Por ello es importante la verificación mediante el giro de la cabeza hacia la derecha
       e izquierda o bien incorporando el torso al mirar por los espejos externos, sobre todo al ingresar a la autopista
       o semiautopista. También se debe ajustar el espejo exterior de modo que se pueda ver el extremo de la manija
       de la puerta delantera en el extremo inferior derecho del espejo. Esto permitirá advertir una parte de los carriles
       de tránsito a la izquierda y detrás del automóvil.</p>
    <br>

    <p class="h3">Maniobra de giro</p>
    <p>En la circulación, cuando es necesario realizar un giro, se debe tener presente que la preferencia de paso la
       tienen los demás, ya sean los peatones que cruzan la calle o los vehículos que circulan en sentido transversal
       o los que circulan en sentido contrario por la calle en que se transita. Por ello, corresponde evitar la realización
       del giro de manera imprevista.</p>
    <p>Es necesario circular desde 30 metros antes por el costado más próximo al giro a efectuar y cerciorarse, por
       los espejos retrovisores, que los vehículos que circulan detrás han percibido y entendido la señal de giro.</p>
       <br>
    <p class="h3">Distancia de frenado</p>
    <p>El trayecto que recorre un vehículo desde el momento en que el conductor advierte un peligro hasta que el
       vehículo se detiene totalmente. Ejemplo: un automóvil que circula a 100 km/h requiere una distancia de 150 m
       para que el vehículo frene totalmente. Por eso es imprescindible conservar la distancia adecuada con el vehículo
       que nos antecede.</p>
    <p>Cuando el descenso es muy prologado, no debe utilizar todo el tiempo el freno, ya que al recalentarse pierde
       eficacia. El descenso debe hacerse con el mismo cambio de caja que necesita para subir, de manera que sea
       el motor el que regula la velocidad y no el freno.</p>
       <br>
    <p class="h3">Conducción nocturna</p>
    <ol>
      <li>Antes de iniciar un viaje revise el sistema eléctrico y que las luces frontales estén alineadas.</li>
      <li>Circule por debajo de la velocidad máxima permitida, para tener tiempo de frenar en caso que sea necesario.</li>
      <li>No mire los faros de los vehículos que circulan en sentido opuesto, sino a la derecha de la vía, guiándose
          por la línea de borde de calzada.</li>
      <li>Circule siempre con las luces bajas encendidas.</li>
      <li>Antes de entrar a un túnel encienda las luces.</li>
    </ol>
    <br>
    <p class="h3">Qué hacer en caso de siniestro</p>
    <ol>
      <li>Detenerse en un lugar seguro. Intente siempre no aumentar el riesgo ni obstaculizar el ingreso a la zona de
          personal de socorro. Señalice con balizas de modo que se advierta la presencia irregular de su vehículo.</li>
      <li>Si está involucrado en un accidente nunca se dé a la fuga, eso empeora su situación procesal y su
          responsabilidad.</li>
      <li>Llame lo antes posible a la aseguradora y al 911.</li>
      <li>Con respecto a los heridos, no los mueva si no hay riesgo inminente de incendio u otro factor que ponga en
          riesgo la vida del herido.</li>
    </ol>
    <br>
    <p class="h3">Qué revisar antes de usar el vehículo</p>
    <ol>
      <li>Revisar niveles de: combustible, aceite, líquido de frenos, anticongelante, líquido de dirección y agua para
          el limpiaparabrisas.</li>
      <li>Buen funcionamiento de los cinturones de seguridad, bolsas de aire, ajuste de asientos, sistema de frenado,
          luces, espejos y limpiaparabrisas.</li>
      <li> Llanta de refacción en buen estado y con presión de aire, cruceta, gato, herramientas y triángulos
          reflectantes en buen estado.</li>
      <li>Documentación: tarjeta de circulación, seguro, verificación, números de emergencia y en su caso, oficio de
          comisión y salida de equipo.</li>
      <li>Revise la condición del clima de las próximas horas del lugar de su destino.</li>
    </ol>
    <br>

    <p class="h5">REFERENCIAS:</p>
    <button type="button" class="btn btn-link">https://www.imt.mx/images/files/CIEG/Guia_Buenas_Practicas_Conduccion.pdf</button>

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