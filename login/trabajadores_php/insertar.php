<?php
include("conexion.php");
$con=conectar();

$cod_trabajador=$_POST['cod_trabajador'];
$dni=$_POST['dni'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$verificar_cedula= mysqli_query($con,"SELECT * FROM trabajadores WHERE cod_trabajador= '$cod_trabajador' ");
    
    if (mysqli_num_rows($verificar_cedula) > 0){
        echo '
            <script>
                alert("Este codigo ya esta registrado, intenta con otro diferente");
                window.location= "../a_trabajadores.php";
            </script>
';
        exit();
    }


$sql="INSERT INTO trabajadores VALUES('$cod_trabajador','$dni','$nombres','$apellidos','activo')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ../a_trabajadores.php");   
}else{
    echo '
            <script>
                alert("No se pudo hacer el registro");
                window.location= "../a_trabajadores.php";
            </script>
';
}
?>