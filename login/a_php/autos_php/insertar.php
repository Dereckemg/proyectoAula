<?php
include("../../php/conexion.php");
$con=conectar();

$placa=$_POST['placa'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$color=$_POST['color'];
$cedula_cliente=$_POST['cedula_cliente'];

$verificar_cedula= mysqli_query($con,"SELECT * FROM clientes WHERE cedula= '$cedula_cliente'");
    
    if (mysqli_num_rows($verificar_cedula) <= 0){
        echo '
            <script>
                alert("Este cliente no existe");
                window.location= "../../a_autos.php";
            </script>
';
        exit();
    }


$sql="INSERT INTO autos VALUES('$placa','$marca','$modelo','$color','$cedula_cliente')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ../../a_autos.php");   
}else{
    echo '
            <script>
                alert("No se pudo hacer el registro");
                window.location= "../../a_autos.php";
            </script>
';
}
?>