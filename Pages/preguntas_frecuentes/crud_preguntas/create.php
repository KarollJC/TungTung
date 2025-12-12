<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Agregar Pregunta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }

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

        .form-control{
            font-size: clamp(14px, 2.5vw, 18px);
        }

        label{
            font-size: clamp(14px, 2.5vw, 18px);
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
                padding:20px;
            }
        }
    </style>
</head>

<body class="p-4">

<div class="container mt-4" style="max-width:600px;">
    <div class="card card-form mx-auto">
        <h2 class="text-center mb-3">Agregar Pregunta</h2>

        <form method="POST">
            <label>Pregunta:</label>
            <input type="text" name="pregunta" class="form-control mb-3" required>

            <label>Categoría:</label>
            <input type="text" name="categoria" class="form-control mb-3" required>

            <label>Orden:</label>
            <input type="number" name="orden" class="form-control mb-3" required>

            <button type="submit" name="subir" class="btn btn-guardar w-100">Guardar</button>
            <a href="preguntas_frec.php" class="btn btn-volver w-100 mt-2">Volver</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['subir'])) {
    $pregunta = $_POST['pregunta'];
    $categoria = $_POST['categoria'];
    $orden = $_POST['orden'];

    $sql = "INSERT INTO preguntas_frecuentes (pregunta, categoria, orden, respuesta)
            VALUES ('$pregunta', '$categoria', '$orden', '')";

    if ($conexion->query($sql)) {
        header("Location: preguntas_frec.php");
    } else {
        echo $conexion->error;
    }
}
?>

</body>
</html>
