<?php
include("../Libs/tungtungcrud.php");
session_start();
$login_required = true;
$is_admin = false;
$username = "";

$message = "";
if(isset($_SESSION["delete_err"]))
{
    $message = $_SESSION["delete_err"];
    unset($_SESSION["delete_err"]);
}

if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
    if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"])
    {
        $is_admin = true;
    }
}
$db_conn = new Database("localhost","tungtung","tungtungcitos","1234"); //<-Los demas
//$db_conn = new Database("db","tungtung","tungtungcitos","1234"); //<- David
$conn = $db_conn->connect_db();
$sql = new CRUD($conn, 'preguntas_frecuentes');
$query = $sql->read(null, [], 'orden ASC');

$db_conn->close_connection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/stylesNav.css">
    <style>
        h1{
            font-size: clamp(24px, 4vw, 36px);
        }

        .faq-card{
            background-color:#330000;
            color:white;
            border:none;
        }
        .accordion-button{
            background-color:#330000;
            color:white;
            font-size: clamp(14px, 2.5vw, 18px);
        }
        .accordion-button:not(.collapsed){
            background-color:#4d0000;
            color:white;
        }

        .btn-editar, .btn-eliminar, .btn-add{
            font-size: clamp(12px, 2.5vw, 16px);
        }

        .btn-editar{
            background-color:#555;
            color:white;
        }
        .btn-editar:hover{
            background-color:#777;
        }

        .btn-eliminar{
            background-color:#990000;
            color:white;
        }
        .btn-eliminar:hover{
            background-color:#cc0000;
        }

        .btn-add{
            background-color:#990000;
            color:white;
        }
        .btn-add:hover{
            background-color:#cc0000;
        }

        a{
            text-decoration:none;
        }

        /* Espaciado y adaptabilidad extra para móviles */
        @media (max-width: 768px){
            .container{
                padding-left: 10px;
                padding-right: 10px;
            }
            .btn-add{
                width: 100%;
            }
            .faq-actions a{
                width: 100%;
            }
            .accordion-body{
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
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

    <div class="container mt-3 py-3" style="max-width:900px;">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h1 class="text-white">Preguntas Frecuentes</h1>

            <?= "<p class='text-danger text-center'>$message</p>"; ?>

            <a href="preguntas/create.php" class="btn btn-add mt-2 mt-md-0">Agregar pregunta</a>
        </div>
        <div class="accordion" id="faqLista">
            <br>
            <?php
            if (is_array($query) && count($query) > 0)
            {
                foreach($query as $question)
                {
                    $id = htmlspecialchars($question['id_pregunta']);
                    $pregunta = htmlspecialchars($question['pregunta']);
                    $usuario = htmlspecialchars($question['usuario']);
                    $respuesta = htmlspecialchars($question['respuesta']);
                    echo '
                    <div class="accordion-item faq-card mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item'.$id.'">'
                            ."$usuario - $pregunta".'
                            </button>
                        </h2>

                        <div id="item'.$id.'" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                '.$respuesta.'

                                <div class="mt-3 d-flex flex-wrap gap-2 faq-actions">
                                    <a href="preguntas/update.php?id='.$id.'" class="btn btn-editar btn-sm">Editar / Responder</a>
                                    <a href="preguntas/delete.php?id='.$id.'" class="btn btn-eliminar btn-sm">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
            else
            {
                echo "<h4 style='color: white;'>No hay preguntas todavía</h4>";
            }
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