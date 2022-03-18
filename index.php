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
      <title>Muévete</title>
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
               echo '<a href="admin/productos.php">Panel admin</a>';
            }
         }
         ?>
      </div>
      <div id="main">
         <!-- header section start -->
         <div class="header_section">
            <?php include('layouts/main_header.php') ?>
            <div class="banner_section layout_padding">
               <div class="container">
                  <section >
                     <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                           <li data-target="#main_slider" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <div class="container">
                                 <div class="row marginii">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div>
                                          <h1 class="scooter_text"><strong><span style="color: #fff;">TU TIENDA DE</span>   PATINETES<br><span style="color: #fff;">ELÉCTRICOS</span></strong></h1>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div class="img-box">
                                          <figure><img src="images/xiaomi-essential.png" style="max-width: 100%;"/></figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <div class="container">
                                 <div class="row marginii">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div>
                                          <h1 class="scooter_text"><strong><span style="color: #fff;">TU TIENDA DE</span>   PATINETES<br><span style="color: #fff;">ELÉCTRICOS</span></strong></h1>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                       <div class="img-box">
                                          <figure><img src="images/xiaomi-1s.png" style="max-width: 100%;"/></figure>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
         <!-- header section end -->

         <!-- content section start -->
         <div class="our_section">
            <div class="container-fluid">
               <div class="title-section">Lista de patinetes</div>
                  <div class="product-grid" id="space-list">
                  </div>
            </div>
         </div>
         <!-- content section end -->
         
         <!-- footer section start -->
         <div class="copyright_text">© 2022 - Made by Guillermo Amado Díaz</div>
         <h2 class="social_text">Redes Sociales</h2>
         <div class="footer_menu_social">
            <ul>
               <li>
               <a href="under_construction.php"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
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
               document.getElementById("mySidebar").style.width = "0px";
               document.getElementById("main").style.marginLeft= "0px";
            }

            $(document).ready(function() {
               $.ajax({
                  url: 'servicios/producto/obtener_productos.php',
                  type: 'POST',
                  data: {},
                  success: function(data) {
                     console.log(data);
                     let html = '';
                     for (let i = 0; i < data.datos.length; i++) {
                        html += 
                           '<div class="item">'+
                              '<figure><img src="images/'+data.datos[i].imagen+'" style="max-width: 100%;"/>'+
                                 '<div class="patinete_nombre">'+data.datos[i].nombreprod+'</div>'+
                                 '<div class="send_btn"><a href="producto.php?p='+data.datos[i].codpro+'"><button type="button" class="rent-btn">Detalles</button></a></div>'+
                              '</figure>'+
                           '</div>';
                     }
                     document.getElementById("space-list").innerHTML=html;
                  },
                  error: function(err) {
                     console.error(err);
                  }
               });
            });
         </script>
      </div>
   </body>
</html>