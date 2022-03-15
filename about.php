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
      <title>Muévete - Nosotros</title>
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

         <!-- about section start -->
         <div class="about_section layout_padding">
            <div class="container">
               <h2 class="about_title"><strong>Nosotros</strong></h2>
               <div class="about_middle">
                  <p class="about_text" >Tenemos años de experiencia en todo a lo que se refiere patinetes eléctricos.<br>
                  La mejor calidad en marcas de patinetes.<br>
                  El mejor servicio al cliente.<br>
                  Contamos con un equipo de profesionales especialistas en el sector.</p>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.20204743365738!2d-8.408852451574116!3d43.35848226164225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e7c8f95f3b549%3A0xff9b075522260e7c!2sRda.%20Nelle%2C%2030%2C%2015005%20La%20Coru%C3%B1a!5e1!3m2!1ses!2ses!4v1647378356575!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
            </div>
         </div>
         <!-- about section end -->

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