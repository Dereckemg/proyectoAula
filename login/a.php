<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
header('Content-Type: text/html; charset=ISO-8859-1');

session_start();

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


?>


<?php
//fecha
$fecha = getdate();
$actual = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
$ayer = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"]-1;
//Buscar usuario
$iduser = $_SESSION['cod_usuario'];
//cuenta clientes
$sql = "SELECT count(*) as Clientes FROM clientes";
$resultado = $con ->query($sql);
$row2 = $resultado->fetch_assoc();
//data de ayer y hoy
$sql2 = "SELECT count(*) as Hoy FROM clientes WHERE Fecha_registro='$actual'";
$sql3 = "SELECT count(*) as Ayer FROM clientes WHERE Fecha_registro='$ayer'";
$resultado2 = $con ->query($sql2); $resultado3 = $con ->query($sql3);
$row6 = $resultado2->fetch_assoc(); $row7 = $resultado3->fetch_assoc();
if ($row7['Ayer']!='0'){
$porcentaje = $row6['Hoy'] / $row7['Ayer'] * 100; 
} else {
    $porcentaje = $row6['Hoy'] * 100; 
}
//


/*
$sql="SELECT * FROM usuarios";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>

    <link rel="stylesheet" href="assets/css/estilloss.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    <?php
        include("menu_sides.php");
        elegir_menu(1);
?>
    

    <main>
    <div class="container-main">
           <div class="container-informations">
               <div class="target-information">
                    <div class="section-contents">
                       <h4 class="span-title">Titulo Prueba</h4>
                       <span class="span-prices">$12,430</span>
                       <span class="span-percentage">31.5% <i class="fa-solid fa-arrow-up" ></i></span>

                    </div>
                    <div class="section-icon-home">
                    <i class="fa-solid fa-3x fa-location-crosshairs"style="color:#0364AB;"></i>
                    </div>
                </div>
               <div class="target-information">

               <div class="section-contents">
                       <h4 class="span-title">Titulo Prueba</h4>
                       <span class="span-prices">$15,960</span>
                       <span class="span-percentage2">10.5% <i class="fa-solid fa-arrow-up" ></i></span>

                    </div>
                    <div class="section-icon-home">
                    <i class="fa-solid fa-money-check-dollar fa-3x" style="color:#3B9B00;"></i>
                    </div>

               </div>
               <div class="target-information">

               <div class="section-contents">
                       <h4 class="span-title">Clientes</h4>
                       <span class="span-prices"><?php echo $row2['Clientes'] ?></span>
                       <span class="span-percentage"><?php echo $porcentaje ?>% <i class="fa-solid fa-arrow-up" ></i></span>

                    </div>
                    <div class="section-icon-home">
                    <i class="fa-solid fa-user fa-3x" style="color:#474747;"></i>
                    </div>

               </div>
               
           </div>
           <div class="container-section-2">
               <section class="section-estadisticas">
                   <div class="container-grafica-estadistica">
                        <canvas id="myChart" width="400" height="400"></canvas>
                   </div>
               </section>
               <section class="section-estadisticas-mapa">
                   <div class="container-title">
                       <h3>Conoce Tu Cede</h3>
                   </div>
                   <div class="container-section-mapa">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15697.80359908169!2d-75.46942804999999!3d10.38571675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1653144828329!5m2!1ses!2sco" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   </div>
               </section>

               </div>

           
       </div>
    </main>
    <script>
        var ctx=document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx,{
            type:"pie",
            data:{
                labels:[
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                    ],
                datasets:[{
                    label:'Estadisticas Clientes / Mes',
                    data:[0, 10, 5, 2, 15, 3],
                    backgroundColor:[
                        'rgb(66,134,244,0.5)',
                        'rgb(255, 103, 103,0.5)',
                        'rgb(255, 162, 75 ,0.5)'
                    ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                        ticks:{
                            beinAtZero:true
                        }
                    }]
                }
            }

        });

    </script>
    
    <script src="js_bienvenidess.js"></script>

</body>
</html>