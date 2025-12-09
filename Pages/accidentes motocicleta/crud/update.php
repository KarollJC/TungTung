<?php include("db.php"); ?>

<?php
$clave = $_GET['clave'];
$resultado = $conexion->query("SELECT * FROM alumnos WHERE clave=$clave");
$alumno = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>
</head>
<body>

<h1>Editar Alumno</h1>

<form method="POST">
    Clave: <input type="number" value="<?php echo $alumno['clave']; ?>" disabled><br><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $alumno['email']; ?>"><br><br>

    <button type="submit" name="actualizar">Actualizar</button>
</form>

<?php
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "UPDATE alumnos SET nombre='$nombre', email='$email' WHERE clave=$clave";

    if ($conexion->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

</body>
</html>
