<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- title -->
      <title>Muévete - Login</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body>
      <div id="mySidebar" class="sidebar">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <a href="index.php">Inicio</a>
         <a href="about.php">Nosotros</a>
         <a href="contact.php">Contacto</a>
         <?php
         if (isset($_SESSION['nomusu'])) {
            if($_SESSION['nomusu'] == "admin") {
               echo '<a href="admin/main.php">Panel admin</a>';
            }
         }
         ?>
      </div>
      <div id="main">
         <!-- header section start -->
         <div class="header_section">
            <?php include('layouts/main_header.php') ?>
         </div>
         <!-- header section end -->

        <!-- content section start -->
        <div class="login_section layout_padding">
            <div class="container">
                <h1 class="login_text"><strong>Iniciar sesión</strong></h1>
                <div class="login_main">
                    <div class="input_section">
                        <div class="login_box">
                            <div class="input_main">
                                <div class="container">
                                    <form action="servicios/login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="email-bt" placeholder="Correo" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="email-bt" placeholder="Contraseña" name="passusu" required>
                                        </div>
                                        <?php
                                            if (isset($_GET['e'])) {
                                                switch ($_GET['e']) {
                                                    case '1':
                                                        echo '<p class="error">Error de conexión</p>';
                                                    break;
                                                    case '2':
                                                        echo '<p class="error">Email inválido</p>';
                                                        break;
                                                    case '3':
                                                        echo '<p class="error">Contraseña incorrecta</p>';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            }
                                        ?>
                                        <div class="send_btn">
                                            <button type="submit" class="main_bt">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- content section end -->
         
         <!-- footer section start -->
         <div class="copyright_text">© 2022 - Made by Guillermo Amado Díaz</div>
         <h2 class="social_text">Redes Sociales</h2>
         <div class="footer_menu_social">
            <ul>
               <li><a href="under_construction.php"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                  <a href="under_construction.php"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                  <a href="under_construction.php"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                  <a href="under_construction.php"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                  <a href="under_construction.php"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
            </ul>
         </div>
         <div class="tienda">Puedes encontrar nuestra tienda en: Rda. Nelle, 30, 15005 A Coruña</div>
         <!-- footer section end -->

         <!-- Javascript files-->
         <script src="js/jquery.min.js"></script>
         <script src="js/bootstrap.bundle.min.js"></script>
         <!-- sidebar -->
         <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

         <script>
            function openNav() {
               document.getElementById("mySidebar").style.width = "175px";
               document.getElementById("main").style.marginLeft = "175px";
            }

            function closeNav() {
               document.getElementById("mySidebar").style.width = "0px";
               document.getElementById("main").style.marginLeft= "0px";
            }
         </script>
      </div>
   </body>
</html>