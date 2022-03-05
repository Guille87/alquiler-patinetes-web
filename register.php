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
      <title>Muévete - Registro</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
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
         <a href="booking.php">Reserva</a>
         <a href="about.php">Nosotros</a>
         <a href="contact.php">Contacto</a>
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
                <h1 class="register_text"><strong>Registro</strong></h1>
                <div class="login_main">
                    <div class="input_section">
                        <div class="register_box">
                            <div class="input_main">
                                <div class="container">
                                    <form action="servicios/register.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="email-bt" placeholder="Nombre" name="nomusu" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="email-bt" placeholder="Contraseña" name="passusur" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="email-bt" placeholder="Confirmar contraseña" name="passusu2r" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="email-bt" placeholder="DNI" name="dni" required minlength="9" maxlength="9" pattern="((\d{8})([-]?)([A-Z]{1}))" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="email-bt" placeholder="Correo" name="emailr" required>
                                        </div>
                                        <?php
                                            if (isset($_GET['er'])) {
                                                switch ($_GET['er']) {
                                                    case '1':
                                                        echo '<p class="error">Error de conexión</p>';
                                                        break;
                                                    case '2':
                                                        echo '<p class="error">Este correo ya está registrado</p>';
                                                        break;
                                                    case '3':
                                                        echo '<p class="error">Las contraseñas no coinciden</p>';
                                                        break;
                                                    case '4':
                                                        echo '<p class="error">El DNI no es válido</p>';
                                                        break;
                                                    case '5':
                                                        echo '<p class="error">La dirección no es correcta</p>';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            }
                                        ?>
                                        <div class="send_btn">
                                            <button type="submit" class="main_bt">Crear cuenta</button>
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
         <div class="footer_section layout_padding">
            <div class="container">
               <div class="row">
                  <div class="col-sm-8">
                     <h2 class="important_text">Enlaces importantes</h2>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="about.php">Nosotros</a></li>
                           <li><a href="contact.php">Contacto</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <h2 class="social_text">Redes Sociales</h2>
                     <div class="footer_menu_social">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                               <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                               <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                               <a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                               <a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright_text">© 2022 - Made by Guillermo Amado Díaz</div>
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