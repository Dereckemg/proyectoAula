<?php
include("conexion.php");
$con=conectar();

$cod_cliente=$_POST['cod_cliente'];
$dni=$_POST['dni'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$verificar_cedula= mysqli_query($con,"SELECT * FROM clientes WHERE cod_cliente= '$cod_cliente' ");
    
    if (mysqli_num_rows($verificar_cedula) > 0){
        echo '
            <script>
                alert("Este cedula ya esta registrada, intenta con otro diferente");
                window.location= "../a_clientes.php";
            </script>
';
        exit();
    }


$sql="INSERT INTO clientes VALUES('$cod_cliente','$dni','$nombres','$apellidos')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ../a_clientes.php");   
}else{
    echo '
            <script>
                alert("No se pudo hacer el registro");
                window.location= "../a_clientes.php";
            </script>
';
}
?>