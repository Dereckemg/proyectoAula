<?php

include("../../php/conexion.php");
$con=conectar();

$cod_trabajador=$_POST['cod_trabajador'];
$dni=$_POST['dni'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$estado=$_POST['Estado'];

$sql="UPDATE trabajadores SET  estado= '$estado',dni='$dni',nombres='$nombres',apellidos='$apellidos' WHERE cod_trabajador='$cod_trabajador'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../../a_trabajadores.php");
    }
?>