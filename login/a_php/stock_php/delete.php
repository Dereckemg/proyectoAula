<?php

include("../../php/conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM inventario_repuestos  WHERE nombre='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../../a_stock.php");
    }
    
    
?>
