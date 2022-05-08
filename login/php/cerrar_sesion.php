<?php
session_start();
session_destroy();
header("location: /proyectoAula/index.php");

?>