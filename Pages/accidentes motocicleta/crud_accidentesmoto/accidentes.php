<?php
session_start();
$login_required = true;
$is_admin = false;
$username = "";
if(isset($_SESSION["logged"]))
{
    $login_required = false;
    $username = $_SESSION["username"] ?? "Usuario";
    if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"])
    {
        $is_admin = true;
    }
}

include("db.php");
$accidentes = $conexion->query("SELECT * FROM accidentes ORDER BY fecha DESC");
$data = [];
while($row = $accidentes->fetch_assoc()){
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Accidentes en Motocicleta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TungTung/Pages/css/stylesNav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

    body{
        background: rgb(33, 33, 33);
        color:white;
    }
    .titulo{
        text-align:center;
        margin:30px 0;
    }
    .carousel-item{
        text-align: center;
    }

    .carousel img{
        width: 70%;           
        max-height: 320px;    
        object-fit: contain; 
        border-radius: 12px;
        background-color:#000;
    }

    .info-accidente{
        background:#330000;
        padding:25px;
        border-radius:12px;
        margin-top:20px;
    }
    .btn-editar{
        background:#990000;
        color:white;
    }
    .btn-editar:hover{
        background:#cc0000;
    }
</style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/TungTung/Pages/inicio.php">
                <img src="/TungTung/Pages/img/rino.png" height="50px" alt="">
                Seguridad Vial
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="/TungTung/Pages/Practicas_seguras/Practicas seguras/codigo.php">
                        Prácticas seguras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="/TungTung/Pages/Tipos_cascos.php">
                        Tipos de Cascos
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="/TungTung/Pages/reglamento.php">
                        Reglamento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light nav-btn mx-2 my-1"
                        href="#">
                        Accidentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light nav-btn mx-2 my-1"
                        href="/TungTung/Pages/preguntas_frec.php">
                        FAQ
                        </a>
                    </li>
                    <?php
                    if($login_required)
                    {
                        echo "
                    <li class='nav-item'>
                            <a class='btn btn-outline-light nav-btn mx-2 my-1'
                            href='/TungTung/Pages/login.php'> Iniciar Sesión</a>
                    </li>";
                    }
                    else
                    {
                        echo "
                    <li class='nav-item dropdown'>
                    <a class='dropdown-toggle btn btn-outline-light nav-btn mx-2 my-1' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                    if($is_admin)
                    {
                        echo 
                        "<i class='fas fa-server' style='color: var(--secondary-color);'></i>";
                    }
                    else
                    {
                        echo
                        "<i class='fas fa-user' style='color: var(--secondary-color);'></i>";
                    }
                    echo "
                        $username
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' href='logout.php'>Cerrar Sesión</a>
                        </li>
                    </ul>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h1 class="titulo">Accidentes en Motocicleta</h1>

        <!-- CARRUSEL -->
        <div id="carouselAccidentes" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

            <?php for($i=0; $i<count($data); $i++): ?>
                <div class="carousel-item <?php echo ($i==0)?'active':''; ?>">
                    <img src="img_accidentes/accidente<?php echo $i+1; ?>.png" class="d-block w-100">
                </div>
            <?php endfor; ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAccidentes" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAccidentes" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="info-accidente text-center" id="infoAccidente"></div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const accidentes = <?php echo json_encode($data); ?>;
    const info = document.getElementById("infoAccidente");

    function mostrarInfo(i){
        const a = accidentes[i];
        info.innerHTML = `
            <h4>${a.lugar}</h4>
            <p><strong>Fecha:</strong> ${a.fecha}</p>
            <p><strong>Descripción:</strong> ${a.descripcion}</p>
            <p><strong>Causa:</strong> ${a.causa}</p>
            <p><strong>Uso de casco:</strong> ${a.uso_casco}</p>
            <p><strong>Nivel de gravedad:</strong> ${a.nivel_gravedad}</p>

            <a href="update.php?id=${a.id_accidentes}" class="btn btn-editar mt-3">
                Editar Accidente
            </a>
        `;
    }

    mostrarInfo(0);

    document.getElementById('carouselAccidentes')
    .addEventListener('slid.bs.carousel', e => {
        mostrarInfo(e.to);
    });
    </script>

    <footer class="bg-dark text-center text-white">
        <div class="container p-2 pb-0">
            <section class="mb-2">
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/KarollJC/TungTung" role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <a style="color: white;" href="/TungTung/Pages/Contacto.php"><u>Contacto</u></a>
        </div>

        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 TungTungcitos
        </div>
    </footer>

</body>
</html>
