<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
        .faq-card{
            background-color:#330000;
            color:white;
            border:none;
        }
        .accordion-button{
            background-color:#330000;
            color:white;
        }
        .accordion-button:not(.collapsed){
            background-color:#4d0000;
            color:white;
        }
        .btn-editar{
            background-color:#555;
            color:white;
        }
        .btn-editar:hover{
            background-color:#777;
            color:white;
        }
        .btn-eliminar{
            background-color:#990000;
            color:white;
        }
        .btn-eliminar:hover{
            background-color:#cc0000;
            color:white;
        }
        .btn-add{
            background-color:#990000;
            color:white;
        }
        .btn-add:hover{
            background-color:#cc0000;
            color:white;
        }
        a{
            text-decoration:none;
        }
    </style>
</head>

<body class="p-4">

<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-white">Preguntas Frecuentes</h1>
        <a href="create.php" class="btn btn-add">Agregar pregunta</a>
    </div>

    <div class="accordion" id="faqLista">

        <?php
        $sql = "SELECT * FROM preguntas_frecuentes ORDER BY orden ASC";
        $resultado = $conexion->query($sql);

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

                        <div class="mt-3 d-flex gap-2">
                            <a href="update.php?id='.$id.'" class="btn btn-editar btn-sm">Editar / Responder</a>
                            <a href="delete.php?id='.$id.'" class="btn btn-eliminar btn-sm">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        ?>

    </div>
    <!--este apartado se esperara cuando se tenga la parte de la pagina principal para conectarla-->
    <a href="../index.php" class="d-block mt-4 text-white">Regresar</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
