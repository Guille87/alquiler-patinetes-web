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
      <!-- site metas -->
      <title>Muévete - Contacto</title>
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
         if ($_SESSION['nomusu'] == "admin") {
               echo '<a href="admin/main.php">Panel admin</a>';
         }
         ?>
      </div>

      <div id="main">
         <!-- header section start -->
         <div class="header_section">
            <?php include('layouts/main_header.php') ?>
         </div>
         <!-- header section end -->

         <!-- contact section start -->
         <div class="contact_section layout_padding">
            <div class="container">
               <h1 class="contact_text"><strong>Contacto</strong></h1>
               <div class="contact_main">
                  <div class="input_section">
                     <div class="email_box">
                        <div class="input_main">
                           <div class="container">
                              <form action="MAILTO:guillermo_amado@hotmail.es" method="post" enctype="text/plain">
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Nombre" name="Nombre">
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Email" name="Email">
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Teléfono" name="Telefono">
                                 </div>
                                 <div class="form-group">
                                    <textarea class="message-bt" placeholder="Mensaje" rows="5" id="comment" name="Mensaje"></textarea>
                                 </div>
                                 <div class="send_btn">
                                    <button type="submit" class="main_bt">Enviar</button>
                                 </div>
                              </form>
                           </div> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- contact section end -->
         
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
               document.getElementById("mySidebar").style.width = "0";
               document.getElementById("main").style.marginLeft= "0";
            }
         </script>
      </div>
   </body>
</html>