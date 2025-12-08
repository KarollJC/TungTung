<?php
    $mensaje_ok = isset($_GET['ok']);
    $mensaje_error = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
    </style>
</head>
<body class="text-white">

    <section class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="w-25 w-md-50">

            <h2 class="text-center mb-4">Crea tu cuenta</h2>

            <?php if($mensaje_ok): ?>
                <div class="alert alert-success text-center">
                    Cuenta creada correctamente
                </div>
            <?php endif; ?>

            <?php if($mensaje_error): ?>
                <div class="alert alert-danger text-center">
                    Error al crear la cuenta
                </div>
            <?php endif; ?>

            <form method="post" action="Insert.php">

                <label class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="ejemplo@correo.com">

                <label class="form-label mt-2">Usuario</label>
                <input type="text" name="user" id="user" class="form-control" required placeholder="Usuario">

                <label class="form-label mt-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre">

                <label class="form-label mt-2">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos">

                <label class="form-label mt-2">Fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>

                <label class="form-label mt-2">Contraseña</label>
                <input type="password" name="contra" id="contra" class="form-control" required placeholder="Contraseña"><br>

                <label>Teléfono</label>
                <div class="input-group">
                    <div class="input-group-text">+52</div>
                    <input type="text" name="telefono" class="form-control" id="telefono" required placeholder="(123) 456-7890">
                </div>

                <div class="mb-3 form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Aceptar términos y condiciones</label>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100">Continuar</button>

                <br><br>
                <p class="text-center">¿Ya tienes una cuenta?</p>
                <p class="text-center">
                    <a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                        Iniciar sesión
                    </a>
                </p>

            </form>

        </div>

    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
