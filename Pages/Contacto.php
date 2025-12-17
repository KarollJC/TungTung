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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/generalStyle.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link rel="stylesheet" href="css/stylesContacto.css">
</head>
<body class="d-flex flex-column">
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
                        href="#">
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

    <div class="card card-desktop w-100 w-md-75 mt-3 mx-auto">
        <img src="img/Compromiso.jpg" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title text-center">Compromiso de Conducción Segura</h4><br>
            <p class="card-text">
                El usuario se compromete a conducir motocicletas de forma segura y responsable dentro de las actividades del proyecto, <br>
                considerando en todo momento lo siguiente: <br>
                <ul>
                    <li>Respetar todas las normas y reglamentos de tránsito, tanto internos de la organización como los legales aplicables a la zona donde circule.</li>
                    <li>Usar siempre el equipo de protección personal obligatorio, incluyendo casco certificado, guantes y, cuando aplique, chaleco reflector.</li>
                    <li>Mantener la motocicleta en óptimas condiciones mecánicas, verificando frenos, luces, llantas, espejos y nivel de combustible antes de cada uso.</li>
                    <li>Asegurar que la documentación de la motocicleta esté vigente y dentro del vehículo (tarjeta de circulación, seguro, licencia).</li>
                    <li>Conducir en buen estado físico y mental, evitando manejar si estoy cansado o me siento indispuesto.</li>
                    <li>No conducir bajo los efectos del alcohol o drogas.</li>
                    <li>No utilizar el teléfono celular mientras conduzco, a menos que sea mediante sistema manos libres.</li>
                    <li>Evitar distracciones como audífonos o dispositivos que impidan escuchar el entorno.</li>
                    <li>Respetar a peatones y otros conductores, manteniendo una distancia segura y evitando maniobras peligrosas.</li>
                    <li>Reportar cualquier incidente, falla mecánica o situación de riesgo que se presente durante el uso de la motocicleta.</li>
                    <li>Conducir con precaución, adaptando la velocidad a las condiciones del camino y del clima.</li>
                    <li>Llevar únicamente a los pasajeros autorizados, siempre que la motocicleta lo permita.</li>
                </ul>
                Declaro haber leído y entendido cada una de las cláusulas, y me comprometo a cumplirlas, aceptando cualquier medida o sanción derivada del incumplimiento.
            </p>
        </div>
    </div>

    <section class="w-100 d-flex justify-content-center mt-4 mb-5">
        <div class="login p-4 form-desktop">

            <h2 class="text-danger mb-4">Contacto</h2>

            <?php if (isset($estado) && $estado == "ok"): ?>
                <div class="alert alert-success">Mensaje enviado correctamente</div>
            <?php endif; ?>
            <?php if (isset($estado) && $estado == "error"): ?>
                <div class="alert alert-danger">Error al enviar el mensaje</div>
            <?php endif; ?>

            <form method="post" action="Insert_contacto.php">

                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="usuario@usuario.com" required>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Escribe tu mensaje aquí" id="mensaje" name="mensaje" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Mensaje</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="casillaCompromiso" name="compromiso" required>
                    <label class="form-check-label" for="casillaCompromiso">
                        Acepto el Compromiso de Conducción Segura
                    </label>
                </div>

                <button type="submit" class="btn btn-danger w-100">Enviar</button>

            </form>
        </div>
    </section>

    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <a style="color: white;" href="#"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: var(--footer-bg);">© 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>