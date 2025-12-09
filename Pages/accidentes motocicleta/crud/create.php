<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Alumno</title>
</head>
<body>

<h1>Agregar Alumno</h1>

<form method="POST">
    Clave: <input type="number" name="clave" required><br><br>
    Nombre: <input type="text" name="nombre" required><br><br>
    Email: <input type="email" name="email" required><br><br>

    <button type="submit" name="guardar">Guardar</button>
</form>

<?php
if (isset($_POST['guardar'])) {
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "INSERT INTO alumnos VALUES ('$clave', '$nombre', '$email')";
    
    if ($conexion->query($sql)) {
        echo "Alumno agregado.";
        header("Location: index.php");
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

</body>
</html>
