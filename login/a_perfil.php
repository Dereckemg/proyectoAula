<?php
session_start();

$iduser = $_SESSION['cod_usuario'];

include("php/conexion.php");
$con=conectar();

if (!isset($_SESSION['cod_usuario'])){
    echo'
<script>
alert("Por favor iniciar secion");
window.location= "/proyectoAula/index.php";
</script>
';
    //header("location: index.php");
    session_destroy();
    die();
}

$sql="SELECT * FROM usuarios WHERE cod_usuario='$iduser'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);




$sql5 = "SELECT Foto FROM usuarios WHERE cod_usuario = '$iduser'";
$resultado5 = $con ->query($sql5);
$row5 = $resultado5->fetch_assoc();

$sql6 = "SELECT Foto FROM trabajadores WHERE cod_trabajador = '$iduser'";
$resultado6 = $con ->query($sql6);
$row6 = $resultado5->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <LINK href="assets/css/estilo_perfil.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body>

    <main>
        <div class="container-main">
        <!-- <a href="http://localhost/proyectoAula/login/a_trabajadores.php">
                <i class="fa fa-chevron-left w3-xxlarge" style="font-size: xxx-large; color: black;"></i>
        </a> -->
            <div class="container-header">
                <div class="container-foto-perfil">
                    <div class="content-perfil">
                    <?php
        if ($row5['Foto']==NULL){?>
        <img  style="border-radius:50%;" width="40px" height="40px" src="../imagenes/user_default.png">
    <?php
        }else{?>
        <img  style="border-radius:50%;" width="40px" height="40px" src="data: image/jpg;base64,<?php  echo base64_encode($row5['Foto'])?>"/> <?php }?>
                    </div>
                    <form action="a_php/perfil_php/insertar_foto.php" method="POST" id="hola" enctype="multipart/form-data">
                    <input type="file" name="imagen"> 
                    <input class="boton-foto" type="submit" value="Guardar Foto" form="hola">  
                    </form>                   
                </div>
            </div>
            <div class="container-formulario">
                <div class="container-content-form">
                    <h2>Formulario de perfil</h2>
                    <form class="form-perfil" action="a_php/perfil_php/insertar_cambios.php" method="">
                        <div class="container-content-inputs-forms">

                        <div class="containers-inputs-form">
                            <label class="labels" for="Nombre">Nombre:</label>
                            <input class="inputs" type="text" name="Nombre"  value=""><br><br>
                            <label class="labels" for="apellidos">Apellidos:</label>
                            <input class="inputs" type="text" name="apellidos" value="" ><br><br>
                            <label class="labels" for="Usuario">Usuario:</label>
                            <input class="inputs" type="text" name="Usuario" value="" ><br><br>
                        </div>

                        <div class="containers-inputs-form">

                            <label class="labels" for="Cedula">Cedula:</label>
                            <input class="inputs" type="number" name="Cedula" value="" ><br><br>
                            <label class="labels" for="Telefono">Telefono:</label>
                            <input class="inputs" type="number" name="Telefono" value="" ><br><br><br>
                            <select name="" id="">
                            <optgroup label="Cargos">
                            <option value="tecnico">Tecnico</option>
                            <option value="Admin">Administrador</option>
                            <option value="cliente">Cliente</option>
                            </optgroup>
                            </select><br><br>
                            <input class="boton-guardado" type="submit" value="Guardar Cambios" form="">  

                        </div>
                        </div>
                        

                    </form>

                </div>

            </div>

        </div>
    </main>
    
</body>
</html>