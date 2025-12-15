<?php
session_start();
$mensaje_ok = isset($_GET['ok']);
$mensaje_error = isset($_GET['error']);
if(isset($_SESSION["logged"]))
{
    header("Location: inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <link rel="stylesheet" href="css/stylesRegistro.css">
</head>
<body class="text-black body">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
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
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
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
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="login.php">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="login p-4 w-100" id="formContainer">

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

            <form method="post" action="Insert_registro.php" class="row g-3">
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
                <p class="text-center">¿Ya tienes una cuenta?
                    <a href="login.php" style="color: var(--link-color);" class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> 
                        <u>Iniciar sesión</u>
                    </a>
                </p>
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
            <a style="color: white;" href="Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 TungTungcitos
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>