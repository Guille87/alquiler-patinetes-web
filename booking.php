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
      <title>Muévete - Reserva</title>
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
   <form action="/muevete/servicios/realizar_reserva.php" method="post" target="_blank">
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

         <!-- booking section start -->
         <div class="booking_section layout_padding">
            <div class="container">
               <p class="price_text">PRECIOS<br><br>
                  1 HORA 8€<br>
                  1 DÍA 20€<br>
                  1 SEMANA 100€</p>
            </div>
            <div class="booking_main">
               <div class="input_section">
                  <div class="input_main">
                     <div class="container">
                        <form action="/action_page.php">
                        <?php if (isset($_SESSION['codusu'])) {
                                 echo '<input type="hidden" name="usuario" value="'.$_SESSION['codusu'].'"/>'; }
                              echo '<input type="hidden" name="producto" value="'.$_GET['p'].'"/>'; 
                           ?>
                           <div class="form-group">
                              Fecha
                              <input type="date" class="email-bt" name="fecha">
                           </div>
                           <div class="form-group">
                              Hora
                              <input type="time" class="email-bt" name="hora">
                           </div>
                           <div class="form-group">
                              <span style="float:left; font-size: large;">¿Cuánto tiempo?</span>
                              <input list="answers" name="answer" id="answerInput" class="email-bt">
                              <div id ="tiempo-list">
                              </div>
                              <input type="hidden" name="answer" id="answerInput-hidden">
                                 <!--<datalist id="tiempo">
                                     <option>1 hora</option>
                                    <option>1 día</option>
                                    <option>1 semana</option> 
                                 </datalist>-->
                           </div>
                        </form>
                     </div> 
                     <div class="send_btn">
                     <input type="submit" value="Enviar"/>
                     <!-- <a href="#"><button type="button" class="main_bt" onclick="RealizarReserva()">Enviar</button></a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- booking section end -->

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

         <script type="text/javascript">
            function openNav() {
               document.getElementById("mySidebar").style.width = "175px";
               document.getElementById("main").style.marginLeft = "175px";
            }

            function closeNav() {
               document.getElementById("mySidebar").style.width = "0";
               document.getElementById("main").style.marginLeft= "0";
            }

            document.querySelector('#answerInput').addEventListener('input', function(e) {
               var input = e.target,   
                  list = input.getAttribute('list'),
                  options = document.querySelectorAll('#' + list + ' option[value="'+input.value+'"]'),
                  hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

               if (options.length > 0) {
                  hiddenInput.value = input.value;
                  input.value = options[0].innerText;
                  }

            });

            $(document).ready(function() {
               $.ajax({
                  url: 'servicios/obtener_tiempo.php',
                  type: 'POST',
                  data: {},
                  success: function(data) {
                        console.log(data);
                        let html = '';
                        html += '<datalist id="answers">';
                        for (let i = 0; i < data.datos.length; i++) {
                           html += '<option value="'+data.datos[i].codtiempo+'">'+data.datos[i].tiempo+'</option>';
                        }
                        html += '</datalist>';
                        document.getElementById("tiempo-list").innerHTML=html;
                  },
                        error: function(err) {
                           console.error(err);
                        }
               });
            });

         </script>
      </div>
   </body>
         </form>
</html>