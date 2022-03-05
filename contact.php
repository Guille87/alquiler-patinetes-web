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

         <!-- contact section start -->
         <div class="contact_section layout_padding">
            <div class="container">
               <h1 class="contact_text"><strong>Contacto</strong></h1>
               <div class="contact_main">
                  <div class="input_section">
                     <div class="email_box">
                        <div class="input_main">
                           <div class="container">
                              <form action="/action_page.php" method="POST">
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Nombre" name="Nombre">
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Email" name="Email">
                                 </div>
                                 <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Teléfono" name="Teléfono">
                                 </div>
                                 <div class="form-group">
                                    <textarea class="message-bt" placeholder="Mensaje" rows="5" id="comment" name="Mensaje"></textarea>
                                 </div>
                              </form>
                           </div> 
                           <div class="send_btn">
                              <button type="submit" class="main_bt">Enviar</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- contact section end -->
         
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
                     <h2 class="important_text">Redes Sociales</h2>
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
               document.getElementById("mySidebar").style.width = "0";
               document.getElementById("main").style.marginLeft= "0";
            }
         </script>
      </div>
   </body>
</html>