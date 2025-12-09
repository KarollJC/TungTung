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
<<<<<<< HEAD:Registro/Registro.php
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesRegistro.css">
=======
    <link rel="stylesheet" href="../css/bootstrap.min.css">
>>>>>>> 2d550785468839cd98a201412d88705e50d3dcba:Pages/Registro.php
    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
    </style>
</head>
<body class="text-black">
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="w-50 w-md-50 login">

            <h2 class="text-danger mb-4">Crea tu cuenta</h2><br>

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

            <form method="post" action="Insert.php" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="usuario@usuario.com" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contra" name="contra" required placeholder="Password">
                </div><br><br><br><br>

                <div class="col-md-5">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" name="user" required placeholder="Username">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Teléfono</label>
                    <div class="input-group">
                    <div class="input-group-text">+52</div>
                    <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="(123) 456-7890">
                    </div>
                </div><br><br><br><br>
                
                <div class="col-md-5">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Name">
                </div>
                <div class="col-md-7">
                    <label class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Last names">
                </div><br><br><br><br>


                <button type="submit" class="btn btn-danger">Continuar</button>

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
