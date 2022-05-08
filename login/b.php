<?php
   
    
    session_start();
    
    if (isset($_SESSION['usuario'])){
        header("location: a.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login y Register - Magtimus</title>
<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="assets/css/login.css">


</head>
<body>

<main>
    <div class="navbar">
        <a href="http://localhost/proyectoAula/index.php">
            <div>
                <i class="fa fa-chevron-left w3-xxlarge" style="font-size: xxx-large; color: #FF8616;"></i>
            </div>
        </a>
    
    </div>
<div class="contenedor__todo">
    
<div class="caja__trasera">
<div class="caja__trasera-login">
<h3>¿Ya tienes una cuenta?</h3>
<p>Inicia sesion para entrar en la pagina</p>
<button id="btn__iniciar-sesion">Iniciar Sesion</button>
</div>
<div class="caja__trasera-register">
<h3>¿Aun no tienes una cuenta?</h3>
<p>Registrate para que puedas iniciar sesion</p>
<button id="btn__registrarse">Registrarse</button>
</div>
</div>

<!--Formulario de Login y registro-->
<div class="contenedor__login-register">
<!--Login-->
<form action="php/login_usuario_be.php" method = "POST" class="formulario__login">
<h2>Iniciar Sesion</h2>
<input type="text" placeholder="usuario" name= "usuario">
<input type="password" placeholder="Contraseña" name= "contrasena">
<button>Entrar</button>
</form>

<!--Register-->
<form action="php/registro_usuario_be.php" method = "POST" class="formulario__register">
<h2>Registrarse</h2>
<input type="text" placeholder="Nombre completo" name="nombre_completo">
<input type="text" placeholder="Correo Electronico" name="correo">
<input type="text" placeholder="Usuario" name="usuario">
<input type="password" placeholder="Contraseña" name="contrasena">
<button>Registrarse</button>
</form>
</div>
</div>

</main>

<script src="assets/js/script.js"></script>
</body>
</html>