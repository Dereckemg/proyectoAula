<?php
$iduser = $_SESSION['cod_usuario'];

$sql = "SELECT nombre FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado = $con ->query($sql);
$row = $resultado->fetch_assoc();

$sql3 = "SELECT cargo FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado3 = $con ->query($sql3);
$row3 = $resultado3->fetch_assoc();
 function elegir_menu($titulo) {
     if ($titulo==1){}}

$sql4 = "SELECT * FROM usuarios WHERE cod_usuario = '$iduser'";
$query = mysqli_query($con,$sql);
$row4 = mysqli_fetch_array($query);

$sql5 = "SELECT Foto FROM usuarios WHERE cod_usuario = '$iduser'";
$resultado5 = $con ->query($sql5);
$row5 = $resultado5->fetch_assoc();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/estiloss.css">
<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

</head>
<body id="body">
<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <div class="container_navbar">
        <h1 style= top:20px;>Hola&nbsp</h1> <h1><?php $value = utf8_decode($row['nombre']); echo strtok($value, " ");  ?> &nbsp</h1>
        <div>
            <?php
        if ($row5['Foto']==NULL){?>
        <a href="a_perfil.php" alt="Mi perfil" title="Mi perfil"><img  style="border-radius:50%;" width="40px" height="40px" src="../imagenes/user_default.png"></a>
    <?php
        }else{?>
        <a href="a_perfil.php" alt="Mi Perfil" title="Mi perfil"><img  style="border-radius:50%;" width="40px" height="40px" src="data: image/jpg;base64,<?php  echo base64_encode($row5['Foto'])?>"/></a> <?php }?>
    </div>
        <div class="icon__notification">
                <i class="far fa-bell"></i>
            </div>
        </div>
    </header>
<div class="menu__side" id="menu_side">

<div class="name__page">
    <i class="fa-solid fa-car-side"></i>
    <h4>AutoSoft</h4>
</div>

<div class="options__menu">	

    <a href="a.php" class="selected">
        <div class="option">
            <i class="fas fa-home" title="Inicio"></i>
            <h4>Inicio</h4>
        </div>
    </a>

    <a href="a_citas.php">
        <div class="option">
            <i class="fas fa-calendar" title="Citas"></i>
        </div>
    </a>
    
    <?php
    if ($row3['cargo']=="Admin"){
        echo'
        <a href="a_trabajadores.php">
        <div class="option">
            <i class="fas fa-users" title="Trabajadores"></i>
        </div>
    </a>
   ';
    }
    ?>

    <a href="a_stock.php">
        <div class="option">
            <i class="	fas fa-box-open" title="Inventario"></i>
        </div>
    </a>

    <a href="a_clientes.php">
        <div class="option">
            <i class="far fa-id-badge" title="Clientes"></i>
        </div>
    </a>

    <a href="a_autos.php">
        <div class="option">
            <i class="fas fa-car" title="Automoviles"></i>
        </div>
    </a>
     <a href="a_facturas.php">
        <div class="option">
            <i class="fa-solid fa-money-bill-1-wave" title="Salir"></i>
            <h4>Cerrar sesion</h4>
        </div>
    </a>

    <a href="php/cerrar_sesion.php">
        <div class="option">
            <i class="fas fa-power-off" title="Salir"></i>
            <h4>Cerrar sesion</h4>
        </div>
    </a>

</div>

</div>

<script src="js_bienvenidess.js"></script>

</body>
</html>
