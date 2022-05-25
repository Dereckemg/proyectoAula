<?php
include("conexion.php");
$con=conectar();

$cod_trabajador=$_POST['cod_trabajador'];
$cedula=$_POST['cedula'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$telefono=$_POST['telefono'];
$rol= $_POST['rol'];

$verificar_cedula= mysqli_query($con,"SELECT * FROM trabajadores WHERE cod_trabajador= '$cod_trabajador'");
    
    if (mysqli_num_rows($verificar_cedula) > 0){
        echo '
            <script>
                alert("Este codigo ya esta registrado, intenta con otro diferente");
                window.location= "../a_trabajadores.php";
            </script>
';
        exit();
    }


$sql="INSERT INTO trabajadores VALUES('$cod_trabajador','$cedula','$nombres','$apellidos','$telefono','$rol','activo')";
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