<?php
include("../../Libs/tungtungcrud.php");
session_start();
$login_required = true;
$is_admin = false;
$username = "";
$message = "";
$message_type = "";
$can_edit = false;
$id = $_GET['id'];

if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
    if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"])
    {
        $is_admin = true;
    }
}

$db_conn = new Database("localhost","tungtung","tuntungcitos","1234"); //<-Los demas
//$db_conn = new Database("db","tungtung","tungtungcitos","1234"); //<- David
$conn = $db_conn->connect_db();
$sql = new CRUD($conn, 'preguntas_frecuentes');
$query = $sql->read('id_pregunta = ?', [$id], null, '1');

$pregunta="";
$usuario="";
$respuesta="";
$categoria="";
$orden="";

foreach($query as $question)
{
    $pregunta = htmlspecialchars($question['pregunta']);
    $usuario = htmlspecialchars($question['usuario']);
    $respuesta = htmlspecialchars($question['respuesta']);
    $categoria = htmlspecialchars($question['categoria']);
    $orden = htmlspecialchars($question['orden']);
}

if($usuario == $username || $is_admin) $can_edit = true;

if (isset($_POST['actualizar'])) {
    $update_data = [];
    if($can_edit)
    {
        $update_data = [
            'pregunta' => isset($_POST['pregunta']) ? trim($_POST['pregunta']) : ($pregunta ?? ''),
            'respuesta' => isset($_POST['respuesta']) ? trim($_POST['respuesta']) : ($respuesta ?? ''),
            'categoria' => isset($_POST['categoria']) ? trim($_POST['categoria']) : ($categoria ?? ''),
            'orden' => isset($_POST['orden']) ? intval($_POST['orden']) : ($orden ?? 0)
        ];
    }
    else
    {
        $update_data = [
            'respuesta' => isset($_POST['respuesta']) ? trim($_POST['respuesta']) : ($respuesta ?? '')
        ];
    }

    $query2 = $sql->update($update_data, 'id_pregunta = ?', [$id]);

    if($query2 !== false && $query2 > 0)
    {
        $message = "Pregunta actualizada exitosamente.";
        $message_type = 'success';
    }
    else
    {
        $message = "Error al actualizar la pregunta: " . $sql->getLastError();
        $message_type = 'error';
    }

    $db_conn->close_connection();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Pregunta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general_style.css">
    <link rel="stylesheet" href="../css/stylesNav.css">
    <style>
        h2{
            font-size: clamp(22px, 4vw, 32px);
        }

        .card-form{
            background-color:#330000;
            color:white;
            border:none;
            padding:25px;
            border-radius:10px;
        }

        label{
            font-size: clamp(14px, 2.5vw, 18px);
        }

        .form-control{
            font-size: clamp(14px, 2.5vw, 18px);
        }

        textarea{
            resize:none;
        }

        .btn-guardar{
            background-color:#990000;
            color:white;
            font-size: clamp(14px, 3vw, 18px);
        }
        .btn-guardar:hover{
            background-color:#cc0000;
        }

        .btn-volver{
            background-color:#555;
            color:white;
            font-size: clamp(14px, 3vw, 18px);
        }
        .btn-volver:hover{
            background-color:#777;
        }

        @media (max-width: 768px){
            .card-form{
                padding:18px;
            }
        }

    </style>
</head>

<body class="text-white">
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
                        href="codigo.php">
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
                        href="accidentes.php">
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

<div class="container mt-4" style="max-width:650px;">
    <div class="card card-form mx-auto">
        <h2 class="text-center mb-3">
            <?php if($can_edit) echo "Editar /"; ?> Responder Pregunta
        </h2>

        <form method="POST">
            <label>Pregunta:</label>
            <input type="text" name="pregunta" class="form-control mb-3" value="<?php echo $pregunta ?>" <?php if(!$can_edit) echo " id='disabledInput' disabled"; ?>
            required>

            <label>Respuesta:</label>
            <textarea name="respuesta" class="form-control mb-3" rows="4"
            <?php if(!$can_edit) echo "required"; ?> ><?php echo $respuesta ?></textarea>

            <label>Categoría:</label>
            <input type="text" name="categoria" class="form-control mb-3" value="<?php echo $categoria ?>" <?php if(!$can_edit) echo " id='disabledInput' disabled"; ?> required>

            <label>Orden:</label>
            <input type="number" name="orden" class="form-control mb-3" value="<?php echo $orden ?>" <?php if(!$can_edit) echo " id='disabledInput' disabled"; ?> required>

            <button type="submit" name="actualizar" class="btn btn-guardar w-100">Guardar Cambios</button>
            <a href="../preguntas_frec.php" class="btn btn-volver w-100 mt-2">Volver</a>
        </form>
        <?php 
            echo "<p class='";
            if($message_type=="success")
                { echo "text-success "; }
            else if($message_type=="error")
                { echo "text-danger "; }
            echo "text-center'>$message</p>";
        ?>
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
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>