<?php 
include("db.php");
$id = $_GET['id'];
$q = $conexion->query("SELECT * FROM preguntas_frecuentes WHERE id_pregunta=$id");
$preg = $q->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Pregunta</title>

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

<body class="p-4">

<div class="container mt-4" style="max-width:650px;">
    <div class="card card-form mx-auto">
        <h2 class="text-center mb-3">Editar / Responder Pregunta</h2>

        <form method="POST">
            <label>Pregunta:</label>
            <input type="text" name="pregunta" class="form-control mb-3" value="<?php echo $preg['pregunta']; ?>" required>

            <label>Respuesta:</label>
            <textarea name="respuesta" class="form-control mb-3" rows="4" required><?php echo $preg['respuesta']; ?></textarea>

            <label>Categoría:</label>
            <input type="text" name="categoria" class="form-control mb-3" value="<?php echo $preg['categoria']; ?>" required>

            <label>Orden:</label>
            <input type="number" name="orden" class="form-control mb-3" value="<?php echo $preg['orden']; ?>" required>

            <button type="submit" name="actualizar" class="btn btn-guardar w-100">Guardar Cambios</button>
            <a href="preguntas_frec.php" class="btn btn-volver w-100 mt-2">Volver</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['actualizar'])) {

    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];
    $categoria = $_POST['categoria'];
    $orden = $_POST['orden'];

    $sql = "UPDATE preguntas_frecuentes 
            SET pregunta='$pregunta', respuesta='$respuesta', categoria='$categoria', orden='$orden'
            WHERE id_pregunta=$id";

    if ($conexion->query($sql)) {
        header("Location: preguntas_frec.php");
    } else {
        echo $conexion->error;
    }
}
?>
</body>
</html>
