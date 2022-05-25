<?php 
    include("../php/conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM trabajadores WHERE cod_trabajador='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="cod_trabajador" value="<?php echo $row['cod_trabajador']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="dni" placeholder="Dni" value="<?php echo $row['cedula']  ?>">
                                <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>">
                                <input type="text" class="form-control mb-3" name="Estado" placeholder="Estado" value="<?php echo $row['estado']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
                <a href="http://localhost/proyectoAula/login/a_trabajadores.php">
            <div>
                <i class="fa-solid fa-car" style="font-size: xxx-large; color: #FF8616;"></i>
            </div>
        </a>
    </body>
</html>