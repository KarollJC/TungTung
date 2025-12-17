<?php
include("../../Libs/tungtungcrud.php");
$dbHost = getenv('DB_HOST') ?: 'localhost';
session_start();

$login_required = true;
$is_admin = false;
$username = "";
$message = "";
$message_type = "";
$can_edit = false;
$id = $_GET['id'];

if(isset($_SESSION['message']))
{
    $message_type = $_SESSION['message']['type'];
    $message = $_SESSION['message']['content'];
    unset($_SESSION['message']);
}

if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? " ";
    if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"])
    {
        $is_admin = true;
    }
}

$db_conn = new Database($dbHost, 'tungtung', 'tungtungcitos', '1234');
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
        if(trim($_POST['respuesta']) != ($respuesta ?? '')
        || trim($_POST['pregunta']) != ($pregunta ?? '')
        || trim($_POST['categoria']) != ($categoria ?? '')
        || trim($_POST['orden']) != ($orden ?? '')
        )
        {
            $update_data = [
                'pregunta' => isset($_POST['pregunta']) ? trim($_POST['pregunta']) : ($pregunta ?? ''),
                'respuesta' => isset($_POST['respuesta']) ? trim($_POST['respuesta']) : ($respuesta ?? ''),
                'categoria' => isset($_POST['categoria']) ? trim($_POST['categoria']) : ($categoria ?? ''),
                'orden' => isset($_POST['orden']) ? intval($_POST['orden']) : ($orden ?? 0)
            ];
        }
    }
    else
    {
        if(trim($_POST['respuesta']) != ($respuesta ?? ''))
        {
            $update_data = [
                'respuesta' => isset($_POST['respuesta']) ? trim($_POST['respuesta']) : ($respuesta ?? '')
            ];
        }
    }

    if(!empty($update_data))
    {
        $query2 = $sql->update($update_data, 'id_pregunta = ?', [$id]);

        if($query2 !== false && $query2 > 0)
        {
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['content'] = "Pregunta actualizada exitosamente.";
        }
        else
        {
            $_SESSION['message']['type'] = 'error';
            $_SESSION['message']['content'] = "Error al actualizar la pregunta: " . $sql->getLastError();
        }
    }
    else
    {
        $_SESSION['message']['type'] = 'error';
        $_SESSION['message']['content'] = "Error al actualizar la pregunta: Los datos no cambiaron.";
    }
    $db_conn->close_connection();
    header("Refresh:0");
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
    <link rel="stylesheet" href="../css/generalStyle.css">
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

        .btn-guardar {
            background-color: #990000;
            color:white;
            font-size: clamp(14px, 3vw, 18px);
        }
        .btn-guardar:hover {
            background-color: #cc0000;
        }

        .btn-volver {
            background-color:#555;
            color:white;
            font-size: clamp(14px, 3vw, 18px);
        }

        .btn-volver:hover {
            background-color: #777;
        }
        
        .modal-confirmation .modal-header {
            background-color: #2b220f;
            color: #ffb703;
        }

        .modal-confirmation .modal-content {
            background-color: #1e1e1e;
            color: #d0d0d0;
            border: none;
            box-shadow: none;
            border-radius: 12px;
        }

        .modal-confirmation .modal-header,
        .modal-confirmation .modal-footer {
            border: none;
        }

        .modal-confirmation .modal-content {
            border: none;
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
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="../Practicas_seguras/codigo.php">
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
                    <?php if($login_required): ?>
                    <li class='nav-item'>
                        <a class='btn btn-outline-light nav-btn mx-2 my-1'
                        href='../login.php'> Iniciar Sesión</a>
                    </li>
                    <?php else: ?>
                    <li class='nav-item dropdown'>
                        <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        <?php if($is_admin): ?>
                        <i class='fas fa-server' style='color: var(--secondary-color);'></i>
                        <?php else: ?>
                        <i class='fas fa-user' style='color: var(--secondary-color);'></i>
                    <?php endif; ?>
                        <?= $username ?>
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' style="color: var(--light-dark);" href='../logout.php'>Cerrar Sesión</a>
                        </li>
                    </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4" style="max-width:650px;">
        <div class="card card-form mx-auto">
            <h2 class="text-center mb-3">
                <?php if($can_edit) echo "Editar / "; ?>Responder Pregunta
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

                <button type="button" name="modal" class="btn btn-guardar w-100" data-bs-toggle="modal" data-bs-target="#editConfirmation">Guardar Cambios</button>
                <a href="../preguntas_frec.php" class="btn btn-volver w-100 mt-2">Volver</a>

                <div class="modal fade modal-confirmation" id="editConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Notificación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5><i class="fas fa-exclamation-triangle"></i> 
                                ¿En verdad quiere editar la pregunta?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="actualizar" class="btn btn-danger">Si</button>
                            </div>
                        </div>
                    </div>
                </div>
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

        <div class="text-center p-2" style="background-color: var(--footer-bg);">© 2025 TungTungcitos
        </div>
    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>