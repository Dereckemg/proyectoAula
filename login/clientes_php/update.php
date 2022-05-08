<?php

include("conexion.php");
$con=conectar();

$cod_cliente=$_POST['cod_cliente'];
$dni=$_POST['dni'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$sql="UPDATE clientes SET  dni='$dni',nombres='$nombres',apellidos='$apellidos' WHERE cod_cliente='$cod_cliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../a_clientes.php");
    }
?>