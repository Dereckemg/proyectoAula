<?php
header('Content-Type: text/html; charset=ISO-8859-1');

session_start();
include("php/conexion.php");
    $con=conectar();

    $sql="SELECT * FROM usuarios";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

if (!isset($_SESSION['cod_usuario'])){
    echo'
<script>
alert("Por favor iniciar sesion");
window.location= "/proyectoAula/index.php";
</script>
';
    //header("location: index.php");
    session_destroy();
    die();


    //trabajadores php
    
}

?>

<?php

//Buscar usuario
$iduser = $_SESSION['cod_usuario'] ;
//$_SESSION['cod_usuario']
$sql = "SELECT nombre FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado = $con ->query($sql);
$row = $resultado->fetch_assoc();

$sql2 = "SELECT apellidos FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado2 = $con ->query($sql2);
$row2 = $resultado2->fetch_assoc();

$sql3 = "SELECT cargo FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado3 = $con ->query($sql3);
$row3 = $resultado3->fetch_assoc();


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
    <title>Trabajadores</title>

    <link rel="stylesheet" href="assets/css/estilloss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
<header>
<div class="container_navbar">
        <p><br><?php echo  utf8_decode($row['nombre']); ?></p>
            <p><br>&nbsp<?php echo utf8_decode($row2['apellidos']); ?> </p>
            <p><br><b>&nbsp/<?php echo utf8_decode($row3['cargo']); ?> </p> 
        
            <div class="icon__notification">
                <i class="far fa-bell"></i>
            </div>
        </div>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

<div class="name__page">
    <i class="fa-solid fa-car-side"></i>
    <h4>AutoSoft</h4>
</div>

<div class="options__menu">	

    <a href="a.php" class="option">
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
        <div class="selected">
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
    <main>
    <div class="container mt-5 ">
                    <div class="row"> 
                        
                            <div class="col-md-3 ">
                        <div class="text-center mt-3">
                            <h1>Ingrese herramienta</h1>
                                <form action="a_php/stock_php/insertar.php" method="POST">

                                    
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">
                                    <input type="text" class="form-control mb-3" name="marca" placeholder="Marca">
                                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                </div>
                        </div>
                        
                        <div class="col-md-3 mt-3">
                            <h1>Busque herramienta</h1>
                                <form action="clientes_php/buscar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_trabajador" placeholder="Cedula">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                        <div class="col-md-8">
        <div class="mt-3">
    
                            <table class="table vw-100">
                                <thead class="table-success table-striped table-dark" >
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Marca</th>
                                        <th>Precio</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            //while($row=mysqli_fetch_array($query)){
                                                $query = "SELECT * FROM inventario_repuestos";
                                                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['descripcion']?></th>
                                                <th><?php  echo $row['marca']?></th>    
                                                <th>$<?php  echo $row['precio']?></th>        
                                                <th><a href="a_php/stock_php/actualizar.php?id=<?php echo $row['nombre'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="a_php/stock_php/delete.php?id=<?php echo $row['nombre'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>  
            </div>
    </body>
 </main>
    
    <script src="js_bienvenides.js"></script>
    <script src="generadorcodigo.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>