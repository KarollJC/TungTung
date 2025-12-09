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
    <title>Editar Pregunta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #000000, #3a0505);
        }
        .card-form{
            background-color:#330000;
            color:white;
            border:none;
            padding:25px;
            border-radius:10px;
        }
        .btn-guardar{
            background-color:#990000;
            color:white;
        }
        .btn-guardar:hover{
            background-color:#cc0000;
            color:white;
        }
        .btn-volver{
            background-color:#555;
            color:white;
        }
        .btn-volver:hover{
            background-color:#777;
            color:white;
        }
    </style>
</head>

<body class="p-4">

<div class="container mt-4">
    <div class="card card-form mx-auto" style="max-width:600px;">
        <h2 class="text-center mb-3">Editar / Responder Pregunta</h2>

        <form method="POST">
            <label>Pregunta:</label>
            <input type="text" name="pregunta" class="form-control mb-3" value="<?php echo $preg['pregunta']; ?>" required>

            <label>Respuesta:</label>
            <textarea name="respuesta" class="form-control mb-3" rows="4" required><?php echo $preg['respuesta']; ?></textarea>

            <label>Categoría:</label>
            <input type="text" name="categoria" class="form-control mb-3" value="<?php echo $preg['categoria']; ?>" required>

            <label>Orden:</label>
            <input type="text" name="orden" class="form-control mb-3" value="<?php echo $preg['orden']; ?>" required>

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
