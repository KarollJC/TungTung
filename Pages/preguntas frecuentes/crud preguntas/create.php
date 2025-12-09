<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar pregunta</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #000000, #3a0505);
        }
    </style>
</head>

<body class="text-light">

<div class="container mt-5">

    <h1 class="text-center mb-4 text-danger">Agregar Pregunta</h1>

    <div class="card bg-danger text-white p-4 shadow-lg">

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Pregunta:</label>
                <input type="text" class="form-control" name="pregunta" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría:</label>
                <input type="text" class="form-control" name="categoria" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Orden:</label>
                <input type="text" class="form-control" name="orden" required>
            </div>

            <button type="submit" name="subir" class="btn btn-danger w-100 mt-3">
                Guardar
            </button>
        </form>

    </div>

</div>

<?php
if (isset($_POST['subir'])) {
    $pregunta = $_POST['pregunta'];
    $categoria = $_POST['categoria'];
    $orden = $_POST['orden'];

    $sql = "INSERT INTO preguntas_frecuentes (pregunta, respuesta, categoria, orden)
            VALUES ('$pregunta', '', '$categoria', '$orden')";

    if ($conexion->query($sql)) {
        header("Location: preguntas_frec.php");
        exit;
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

</body>
</html>
