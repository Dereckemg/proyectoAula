<?php
include("../../php/conexion.php");
$con=conectar();

$cedula=$_POST['cedula'];
$nombre=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$fecha = getdate();
$actual = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];


$verificar_cedula= mysqli_query($con,"SELECT * FROM clientes WHERE cedula= '$cedula' ");
    
    if (mysqli_num_rows($verificar_cedula) > 0){
        echo '
            <script>
                alert("Este cedula ya esta registrada, intenta con otro diferente");
                window.location= "../../a_clientes.php";
            </script>
';
        exit();
    }


$sql="INSERT INTO clientes VALUES('$cedula','$nombre','$apellidos','$direccion','$telefono','$actual')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ../../a_clientes.php");   
}else{
    echo '
            <script>
                alert("No se pudo hacer el registro");
                window.location= "../../a_clientes.php";
            </script>
';
}
?>