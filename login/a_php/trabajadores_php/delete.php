<?php

include("../../php/conexion.php");
$con=conectar();

$cod_trabajador=$_GET['id'];
/*
$sql="DELETE FROM trabajadores  WHERE cod_trabajador='$cod_trabajador'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../a_trabajadores.php");
    }
    */
    
    $sql="UPDATE trabajadores SET  Estado='inactivo' WHERE cod_trabajador='$cod_trabajador'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../../a_trabajadores.php");
    }
    
?>
