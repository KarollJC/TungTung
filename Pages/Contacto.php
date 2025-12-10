<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesContacto.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center">


    <div class="card" style="width: 60rem;">
    <img src="img/Compromiso.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h4 class="card-title">Compromiso de Conducción Segura</h4><br>
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

    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="w-50 w-md-50 login">

            <h2 class="text-danger mb-4">Contacto</h2><br>

            <?php if (isset($estado) && $estado == "ok"): ?>
                <div class="alert alert-success">Mensaje enviado correctamente</div>
            <?php endif; ?>

            <?php if (isset($estado) && $estado == "error"): ?>
                <div class="alert alert-danger">Error al enviar el mensaje</div>
            <?php endif; ?>


            <form method="post" action="Insert_contacto.php" class="row g-3">
                
                <div class="col-md-12">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Nombre">
                </div>
                <div class="col-md-12">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="usuario@usuario.com" required>
                </div><br><br><br><br>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Escribe tu mensaje aquí" id="mensaje" name="mensaje" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Mensaje</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="casillaCompromiso" name="compromiso" required>
                    <label class="form-check-label" for="casillaCompromiso">
                        Acepto el Compromiso de Conducción Segura
                    </label>
                </div>


                <button type="submit" class="btn btn-danger">Continuar</button>
            </form>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>