<?php
include("db.php");
session_start();
$login_required = true;
$username = "";

if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Preguntas Frecuentes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/stylesNav.css">
    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }

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
                        href="vista_Reglamento/reglamento.html">
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
                        href="preguntas_frecuentes/crud_preguntas/preguntas_frec.php">
                        FAQ
                        </a>
                    </li>
                    <?php
                    if($login_required)
                    {
                        echo "
                    <li class='nav-item'>
                    <button class=btn btn-outline-light nav-btn mx-2 my-1>
                        <a class='nav-link' href='login.php' style='color: white;'>Iniciar Sesión</a>
                    </button>
                    </li>";
                    }
                    else
                    {
                        echo "
                    <li class='nav-item dropdown'>
                    <button class=btn btn-outline-light nav-btn mx-2 my-1>
                        <a style='color: white;' class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$username</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' href='logout.php'>Cerrar Sesión</a>
                        </li>
                        </ul>
                    </button>
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

            <a href="create.php" class="btn btn-add mt-2 mt-md-0">Agregar pregunta</a>
        </div>
        <div class="accordion" id="faqLista">
            <br>
            <?php
            $sql = "SELECT * FROM preguntas_frecuentes ORDER BY orden ASC";
            $resultado = $conexion->query($sql);

            if($resultado->num_rows > 0)
            {
                while ($fila = $resultado->fetch_assoc()) {
                    $id = $fila['id_pregunta'];
                    $pregunta = $fila['pregunta'];
                    $respuesta = $fila['respuesta'];

                    echo '
                    <div class="accordion-item faq-card mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item'.$id.'">
                                '.$pregunta.'
                            </button>
                        </h2>

                        <div id="item'.$id.'" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                '.$respuesta.'

                                <div class="mt-3 d-flex flex-wrap gap-2 faq-actions">
                                    <a href="update.php?id='.$id.'" class="btn btn-editar btn-sm">Editar / Responder</a>
                                    <a href="delete.php?id='.$id.'" class="btn btn-eliminar btn-sm">Eliminar</a>
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
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>