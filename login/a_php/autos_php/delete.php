<?php

include("../../php/conexion.php");
$con=conectar();

$placa=$_GET['id'];

$sql="DELETE FROM autos  WHERE placa='$placa'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../../a_autos.php");
    }
    
?>
