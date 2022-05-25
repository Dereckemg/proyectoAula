<?php

include("../../php/conexion.php");
$con=conectar();

$cod_cliente=$_GET['id'];

$sql="DELETE FROM clientes  WHERE cedula='$cod_cliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../../a_clientes.php");
    }
?>
