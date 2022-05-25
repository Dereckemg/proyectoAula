<?php
include("../../php/conexion.php");
$con=conectar();

$portada = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO usuarios (Foto)
    VALUES('$portada')";

$ejecutar = mysqli_query($con, $query);

if($query){
    echo'<script>
    alert("Foto actualizada exitosamente");
    window.location = "../../a_perfil.php";
</script>
'; 
}else{
    echo'<script>
    alert("intentelo de nuevo foto no insertada");
    window.location = "../../a_perfil.php";
</script>
';
          
}

mysqli_close($con);


?>