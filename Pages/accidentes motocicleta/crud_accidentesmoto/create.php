<?php include("db.php"); ?>
<?php
session_start();
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar accidentes</title>

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
    <div class="card card-form mx-auto" style="max-width:500px;">
        <h2 class="text-center mb-3">Agregar Pregunta</h2>

        <form method="POST">
            <label>Pregunta:</label>
            <input type="text" name="pregunta" class="form-control mb-3" required>

            <label>Categoría:</label>
            <input type="text" name="categoria" class="form-control mb-3" required>

            <label>Orden:</label>
            <input type="text" name="orden" class="form-control mb-3" required>

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
