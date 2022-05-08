<?php

        session_start();

        include 'conexion_be.php';
        $usuario = $_POST['usuario'];
        
       // $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        
        $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$usuario' 
                        and contrasena='$contrasena'");
                        
                        if (mysqli_num_rows($validar_login) > 0){
                            //$resultado = mysqli_query($conexion,"SELECT cod_usuario FROM usuarios WHERE usuario ='$usuario' and contrasena='$contrasena'");
                            $sql= "SELECT cod_usuario FROM usuarios WHERE usuario ='$usuario' and contrasena='$contrasena'";
                            $resultado = $conexion ->query($sql);
                            $row = $resultado->fetch_assoc();
                            
                            // $row = $codigo_usuario ->fetch_assoc();
                         /*  $hola= $codigo_usuario->fetch_assoc();
                            echo $hola['cod_usuario'];
                            while ($codigo_usuario = $codigo_usuario->fetch_assoc()) {
                                echo $codigo_usuario['cod_usuario']."<br>";
                            }
                            */
                           // echo $row['cod_usuario'];
                            //$row = mysqli_fetch_array($codigo_usuario);

                            //$sql = "SELECT cod_trabajador, nombres FROM trabajadores WHERE cod_trabajador = '$iduser'";
            $_SESSION['cod_usuario'] = $row['cod_usuario'];
            // $fila[0]
            header ("location: ../a.php");
            exit();
                        }else{
                            echo'
                            <script>
                                alert("El usuario o la contraseña es incorrecta, por favor verifique los datos");
                                window.location= "../b.php";
                            </script>

                           ';
                            exit();
                        }
        


?>