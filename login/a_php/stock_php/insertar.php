<?php
include("../../php/conexion.php");
$con=conectar();

$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$marca=$_POST['marca'];
$precio=$_POST['precio'];

// $verificar_cedula= mysqli_query($con,"SELECT * FROM trabajadores WHERE cod_trabajador= '$cod_trabajador'");
    
//     if (mysqli_num_rows($verificar_cedula) > 0){
//         echo '
//             <script>
//                 alert("Este codigo ya esta registrado, intenta con otro diferente");
//                 window.location= "../a_trabajadores.php";
//             </script>
// ';
//         exit();
//     }


$sql="INSERT INTO inventario_repuestos(nombre,descripcion,marca,precio,stock_r) VALUES('$nombre','$descripcion','$marca','$precio',3)";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ../../a_stock.php");   
}else{
    echo '
            <script>
                alert("No se pudo hacer el registro");
                window.location= "../../a_stock.php";
            </script>
';
}
?>