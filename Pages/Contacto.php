<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesContacto.css">
    <style>
        
    </style>
</head>
<body class="d-flex flex-column">

    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold d-none d-md-block" href="inicio.php">
                Seguridad Vial
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav mx-auto justify-content-center flex-wrap">
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="Practicas_seguras/Practicas seguras/codigo.html">Prácticas seguras</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="Tipos_cascos.php">Tipos de Cascos</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="vista_Reglamento/reglamento.html">Reglamento</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="accidentes motocicleta/crud_accidentesmoto/accidentes.php">Accidentes</a>
                    </button>
                    <button class="btn btn-outline-light nav-btn mx-2 my-1">
                        <a href="preguntas_frecuentes/crud_preguntas/preguntas_frec.php">Preguntas Frecuentes</a>
                    </button>
                    <button class="btn btn-light nav-btn mx-2 my-1">
                        <a href="Contacto.php">Contacto</a>
                    </button>
                </div>
                <div class="d-flex justify-content-end ms-lg-3 mt-3 mt-lg-0">
                    
                        <button class="btn btn-light btn-login fw-bold">
                            <a href="login.php" class="text-danger">Login</a>
                        </button>
                
                </div>

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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
