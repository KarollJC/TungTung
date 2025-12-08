<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_database = 'tungtung';
    $db_port = '3306';

    $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_database, $db_port);

    $email = $_POST['email'];
    $user = $_POST['user'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha = $_POST['fecha'];
    $contra = $_POST['contra'];
    $telefono = $_POST['telefono'];
    
    $consulta = "INSERT INTO usuarios (email, usuario, nombre, apellidos, f_nacimiento, contra, telefono)
    VALUES ('$email', '$user', '$nombre', '$apellidos', '$fecha', '$contra', '$telefono')";


    $resultado = mysqli_query($conexion, $consulta);

    if($resultado) {
        header("Location: Registro.php?ok=1");
        exit;
    } else {
        header("Location: Registro.php?error=1");
        exit;
    }


    mysqli_close($conexion);
?>