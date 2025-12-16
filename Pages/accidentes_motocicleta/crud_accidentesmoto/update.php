<?php 
include("db.php");

$id = $_GET['id'];
$q = $conexion->query("SELECT * FROM accidentes WHERE id_accidentes=$id");
$accidente = $q->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Accidente</title>

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
        }
        .btn-volver{
            background-color:#555;
            color:white;
        }
        .btn-volver:hover{
            background-color:#777;
        }
        label{
            font-weight:bold;
        }
    </style>
</head>

<body class="p-4">

<div class="container mt-4">
    <div class="card card-form mx-auto" style="max-width:700px;">
        <h2 class="text-center mb-3">Editar Información del Accidente</h2>

        <form method="POST">

            <label>Fecha:</label>
            <input type="date" name="fecha" class="form-control mb-3"
                   value="<?php echo $accidente['fecha']; ?>" required>

            <label>Lugar:</label>
            <input type="text" name="lugar" class="form-control mb-3"
                   value="<?php echo $accidente['lugar']; ?>" required>

            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control mb-3" rows="4" required><?php echo $accidente['descripcion']; ?></textarea>

            <label>Causa:</label>
            <input type="text" name="causa" class="form-control mb-3"
                   value="<?php echo $accidente['causa']; ?>" required>

            <label>Lesionados:</label>
            <input type="text" name="lesionados" class="form-control mb-3"
                   value="<?php echo $accidente['lesionados']; ?>" required>

            <label>Uso de casco:</label>
            <select name="uso_casco" class="form-control mb-3" required>
                <option value="<?php echo $accidente['uso_casco']; ?>">
                    <?php echo $accidente['uso_casco']; ?>
                </option>
                <option value="si">Sí</option>
                <option value="no">No</option>
                <option value="no se menciona">No se menciona</option>
                <option value="no reportado">No reportado</option>
            </select>

            <label>Nivel de gravedad:</label>
            <select name="nivel_gravedad" class="form-control mb-3" required>
                <option value="<?php echo $accidente['nivel_gravedad']; ?>">
                    <?php echo $accidente['nivel_gravedad']; ?>
                </option>
                <option value="leve">Leve</option>
                <option value="moderado">Moderado</option>
                <option value="moderado-grave">Moderado-Grave</option>
                <option value="grave">Grave</option>
                <option value="muy grave">Muy grave</option>
            </select>

            <button type="submit" name="actualizar" class="btn btn-guardar w-100">
                Guardar Cambios
            </button>

            <a href="accidentes.php" class="btn btn-volver w-100 mt-2">
                Volver
            </a>

        </form>
    </div>
</div>

<?php
if (isset($_POST['actualizar'])) {

    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $causa = $_POST['causa'];
    $lesionados = $_POST['lesionados'];
    $uso_casco = $_POST['uso_casco'];
    $nivel_gravedad = $_POST['nivel_gravedad'];

    $sql = "UPDATE accidentes SET
            fecha='$fecha',
            lugar='$lugar',
            descripcion='$descripcion',
            causa='$causa',
            lesionados='$lesionados',
            uso_casco='$uso_casco',
            nivel_gravedad='$nivel_gravedad'
            WHERE id_accidentes=$id";

    if ($conexion->query($sql)) {
        header("Location: accidentes.php");
    } else {
        echo $conexion->error;
    }
}
?>

</body>
</html>
