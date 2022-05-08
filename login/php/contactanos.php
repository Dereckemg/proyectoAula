<?php

include 'conexion_be.php';

$nombre = $_POST['introduce_nombre'];
$apellido = $_POST['introduce_apellido'];
$telefono = $_POST['introduce_telefono'];
$email = $_POST['introduce_email'];
$mensaje = $_POST['area-de-texto'];

$query = "INSERT INTO contactanos(nombre,apellido,telefono,email,mensaje)
    VALUES('$nombre','$apellido','$telefono','$email','$mensaje')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo'
            <script>
                alert("Mensaje enviado exitosamente");
                window.location = "/proyectoAula/index.php";
            </script>
       ';
}else{
    echo'
            <script>
                alert("intentelo de nuevo mensaje no enviado");
                window.location = "/proyectoAula/index.php";
            </script>
       ';
}

mysqli_close($conexion);

?>