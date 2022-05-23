<?php

    include 'conexion_be.php';

    $nombre_completo= $_POST['nombre_completo'];
    $correo =$_POST['correo'];
    $usuario =$_POST['usuario'];
    $contrasena =$_POST['contrasena'];
    $codigo =$_POST['cod_usuario'];
    $imagen_perfil = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

    $query = "INSERT INTO usuarios
    VALUES('$codigo','$nombre_completo','$correo','$usuario','$contrasena','$imagen_perfil')";
    
    //verificar que el correo no se repita en la base de datos
    
    $verificar_correo= mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo= '$correo' ");
    
    if (mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location= "/proyectoAula/index.php";
            </script>
';
        exit();
    }
    
    $verificar_usuario= mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario= '$usuario' ");
    
    if (mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location= "/proyectoAula/index.php";
            </script>
';
        exit();
    }

    $verificar_codigo= mysqli_query($conexion,"SELECT * FROM trabajadores WHERE cod_trabajador= '$codigo' ");
    
    if (mysqli_num_rows($verificar_codigo) <= 0){
        echo '
        <script>
            alert("No existe un trabajador con ese codigo");
            window.location= "/proyectoAula/index.php";
        </script>';
    }
    
   $ejecutar = mysqli_query($conexion, $query); 
   
   if($ejecutar){
       echo'
            <script>
                alert("usuario almancenado exitosamente");
                window.location = "/proyectoAula/index.php";
            </script>
       ';
   }else{
       echo'
            <script>
                alert("intentelo de nuevo usuario no almancenado");
                window.location = "/proyectoAula/index.php";
            </script>
       ';
   }
   
   mysqli_close($conexion);
?>