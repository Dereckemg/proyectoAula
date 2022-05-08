<?php 
include("conexion.php");
    $con=conectar();

$cod_trabajador = $_REQUEST['cod_trabajador'];
    
$registros=$con->query("SELECT * FROM trabajadores WHERE cod_trabajador=$cod_trabajador");

$sql="SELECT * FROM trabajadores WHERE cod_trabajador = '$cod_trabajador'";
$query=mysqli_query($con,$sql);

    if($query){
        while($registro=mysqli_fetch_array($registros)){
            echo $registro['cod_trabajador']." ". $registro['nombres']. " ". $registro['apellidos'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
    <a href="http://localhost/proyectoAula/login/a_trabajadores.php">
            <div>
                <i class="fa fa-chevron-left w3-xxlarge" style="font-size: xxx-large; color: #FF8616;"></i>
            </div>
        </a>
    </body>
</html>