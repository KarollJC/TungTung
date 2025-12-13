<?php
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
<nav class="navbar navbar-expand-lg py-3" style="background-color:#990000;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="#">
            Seguridad Vial
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav mx-auto text-center">
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/Practicas_seguras/Practicas seguras/codigo.html">Prácticas seguras</a>
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/Tipos_cascos.php">Tipos de Cascos</a>
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/vista_Reglamento/reglamento.html">Reglamento</a>
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/accidente_motocicleta/crud_accidentesmoto/accidentes.php">Accidentes</a>
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/preguntas_frecuentes/crud_preguntas/preguntas_frec.php">Preguntas Frecuentes</a>
                <a class="btn btn-outline-light mx-1 my-1" href="Pages/Contacto.php">Contacto</a>
            </div>

            <div class="d-flex align-items-center mt-3 mt-lg-0">
                <span class="text-white me-3">Bienvenido, <?php echo $usuario; ?></span>
                <a href="Pages/login.php" class="btn btn-light fw-bold text-danger">Login</a>
            </div>
        </div>
    </div>
</nav>
<style>

body{
    background: linear-gradient(135deg,#000,#3a0505);
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

</body>
</html>
