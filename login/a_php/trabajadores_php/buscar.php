<?php 
include("../../php/conexion.php");
$con=conectar();

$cedula = $_POST["cedula"];
    
$registros=$con->query("SELECT * FROM clientes WHERE cedula=$cedula");

$sql="SELECT * FROM trabajadores WHERE cedula = '$cedula'";
$query=mysqli_query($con,$sql);

    // if($query){
    //     while($registro=mysqli_fetch_array($registros)){
    //         echo $registro['cedula']." ". $registro['nombre']. " ". $registro['apellidos']." ". $registro['direccion']." ". $registro['telefono'];
    //     }
    // }


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
        <table class="table vw-100">
                                <thead class="table-success table-striped table-dark" >
                                    <tr>
                                        <th>Cedula</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Rol</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            //while($row=mysqli_fetch_array($query)){
                                                $query ="SELECT * FROM trabajadores WHERE cedula = '$cedula'";
                                                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cedula']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                <th><?php  echo $row['telefono']?></th>      
                                                <th><?php  echo $row['cargo']?></th>        
                                                <th><a href="actualizar.php?id=<?php echo $row['cedula'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cedula'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
    </body>
</html>