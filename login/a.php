<?php
header('Content-Type: text/html; charset=ISO-8859-1');

session_start();

include("php/conexion_be.php");

if (!isset($_SESSION['cod_usuario'])){
    echo'
<script>
alert("Por favor iniciar secion");
window.location= "/proyectoAula/index.php";
</script>
';
    //header("location: index.php");
    session_destroy();
    die();
}


?>


<?php

//Buscar usuario
$iduser = $_SESSION['cod_usuario'];

$sql = "SELECT nombres FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado = $conexion ->query($sql);
$row = $resultado->fetch_assoc();
/*
$sql="SELECT * FROM usuarios";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>

    <link rel="stylesheet" href="assets/css/estiloss.css">


    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <div class="container_navbar">
        <h1 style= top:20px;>hola&nbsp</h1> <h1><?php echo utf8_decode($row['nombres']); ?></h1>
            <div class="icon__notification">
                <i class="far fa-bell"></i>
            </div>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="	fas fa-car"></i>
            <h4>AutoSoft</h4>
        </div>

        <div class="options__menu">	

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-user-circle" title="Portafolio"></i>
                    <h4>Mi cuenta</h4>
                </div>
            </a>
            
            <a href="a_trabajadores.php">
                <div class="option">
                    <i class="fas fa-users" title="Cursos"></i>
                    <h4>Trabajadores</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="	fas fa-clipboard" title="Blog"></i>
                    <h4>Inventario</h4>
                </div>
            </a>

            <a href="a_clientes.php">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>clientes</h4>
                </div>
            </a>

            <a href="php/cerrar_sesion.php">
                <div class="option">
                    <i class="fas fa-power-off" title="Nosotros"></i>
                    <h4>cerrar sesion</h4>
                </div>
            </a>

        </div>

    </div>

    <main>
  
        <h1>Bienvenido <span></span></h1><br>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam sapiente cumque dicta animi explicabo sequi. Ex amet et, dolor eligendi commodi consectetur quo voluptatibus, cum nemo porro veniam at blanditiis?</p> <br>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. vident adipisci beatae impedit quia, deleniti quasi sequi iusto exercitationem nihil nulla, laboriosam dolore corrupti fuga officiis? Odit a mollitia id magnam amet delectus quia blanditiis reprehenderit explicabo eveniet! Rem voluptatum explicabo ipsum quae, dolorum, laudantium doloribus a, illum saepe sapiente accusantium dicta reiciendis? Amet iure porro voluptatum error fugit odit voluptas?</p>
    </main>
    
    <script src="js_bienvenides.js"></script>
</body>
</html>