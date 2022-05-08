<?php 
include("conexion.php");
    $con=conectar();

$cod_cliente = $_REQUEST['cod_cliente'];
    
$registros=$con->query("SELECT * FROM clientes WHERE cod_cliente=$cod_cliente");

$sql="SELECT * FROM clientes WHERE cod_cliente = '$cod_cliente'";
$query=mysqli_query($con,$sql);

    if($query){
        while($registro=mysqli_fetch_array($registros)){
            echo $registro['cod_cliente']." ". $registro['nombres']. " ". $registro['apellidos'];
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
    <a href="http://localhost/proyectoAula/login/a_clientes.php">
            <div>
                <i class="fa fa-chevron-left w3-xxlarge" style="font-size: xxx-large; color: #FF8616;"></i>
            </div>
        </a>
    </body>
</html>