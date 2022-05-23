<?php
header('Content-Type: text/html; charset=ISO-8859-1');

session_start();
include("trabajadores_php/conexion.php");
    $con=conectar();

    $sql="SELECT * FROM trabajadores";
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
$sql = "SELECT nombres FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado = $con ->query($sql);
$row = $resultado->fetch_assoc();

$sql2 = "SELECT apellidos FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado2 = $con ->query($sql2);
$row2 = $resultado2->fetch_assoc();

$sql3 = "SELECT rol FROM codigos WHERE cod = '$iduser'";
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

    <link rel="stylesheet" href="assets/css/estiloss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
      
        <div class="container_navbar">
        
            <p><br><?php echo  utf8_decode($row['nombres']); ?></p>
            <p><br>&nbsp<?php echo utf8_decode($row2['apellidos']); ?> </p>
            <p><br><b>&nbsp/<?php echo utf8_decode($row3['rol']); ?> </p> 
        
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

            <a href="a.php" class="option">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="a_citas.php">
                <div class="option">
                    <i class="fas fa-user-circle" title="Portafolio"></i>
                    <h4>Citas</h4>
                </div>
            </a>
            <?php
            if ($row3['rol']=="Admin"){
                echo'
                <a href="a_trabajadores.php">
                <div class="option">
                    <i class="fas fa-users" title="Cursos"></i>
                    <h4>Trabajadores</h4>
                </div>
            </a>
           ';
            }
            ?>
           
            <a href="a_stock.php">
                <div class="Selected">
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
    <div class="container mt-5 ">
                    <div class="row"> 
                        
                            <div class="col-md-3 ">
                        <div class="text-center mt-3">
                            <h1>Ingrese Repuesto</h1>
                                <form action="trabajadores_php/insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_trabajador" placeholder="Codigo" id="texto">
                                   <script>
                                       const generatePassword = (base, length) => {
    let password = "";
    for (let x = 0; x < length; x++) {
        let random = Math.floor(Math.random() * base.length);
        password += base.charAt(random);
    }
    return password;
};


    const length = 10;

    var base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const symbols = ".?,;-_¡!¿*%&$/()[]{}|@><";

    base += numbers;

    base += symbols;
                                       var asd
                                        asd = generatePassword(base, length);
                                        var Myelement = document.getElementById("texto");
                                        Myelement.value = asd;
                                       </script>
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="Cedula">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                </div>
                        </div>
                        
                        <div class="col-md-3 mt-3">
                            <h1>Busque Repuesto</h1>
                                <form action="trabajadores_php/buscar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_trabajador" placeholder="Cedula">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                        <div class="col-md-8">
                            <!-- 
                            /*
$connection_obj = mysqli_connect("{MYSQL_HOSTNAME}", "{MYSQL_USERNAME}", "{MYSQL_PASSWORD}", "{MYSQL_DATABASE}");
 
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
*/
 
// prepare the select query
/*
$query = "SELECT * FROM trabajadores";
// execute the select query
/*
while($row=mysqli_fetch_array($query)){
    */
$result = mysqli_query($con, $query) or die(mysqli_error($con));
 
// run the select query

echo "<table class='table' >
                                    <tr>
                                        <th>Cedula</th>
                                        <th>Telefono</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                ";

while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    echo "Codigo:" . $row['cod_trabajador'] . "<br/>";
    echo "Cedula:" . $row['dni'] . "<br/>";
    echo "Nombres:" . $row['nombres'] . "<br/>";
    echo "Apellidos:" . $row['apellidos'] . "<br/>";
    echo "<br/>";
}
 /*
// close the db connection
mysqli_close($con);
*/
?>
Aquí puedes escribir tu comentario -->
<div class="mt-3">
                            <table class="table vw-100">
                                <thead class="table-success table-striped table-dark" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cedula</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Estado</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            //while($row=mysqli_fetch_array($query)){
                                                $query = "SELECT * FROM trabajadores";
                                                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_trabajador']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                <th><?php  echo $row['Estado']?></th>    
                                                <th><a href="trabajadores_php/actualizar.php?id=<?php echo $row['cod_trabajador'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="trabajadores_php/delete.php?id=<?php echo $row['cod_trabajador'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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

</body>
</html>