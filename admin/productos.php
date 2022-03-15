<?php
    include('../servicios/_conexion.php');
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
      <title>Muévete | Administración - Principal</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body>
        <div class="modal" id="modal-producto" style="display: none;">
            <div class="body-modal">
                <button class="btn-close" onclick="hide_modal('modal-producto')"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h3>Añadir producto</h3>
                <input type="text" id="codigo" style="display: none;">
                <div class="div-flex">
                    <label>Nombre</label>
                    <input type="text" id="nombre">
                </div>
                <div class="div-flex">
                    <label>Descripción</label>
                    <input type="text" id="descripcion">
                </div>
                <div class="div-flex">
                    <input type="file" id="imagen">
                </div>
                <button onclick="save_producto()">Guardar</button>
            </div>
        </div>
        <div class="main-container">
            <?php include('../layouts/directorios.php'); ?>
            <div class="body-page">
                <h2>Mis productos</h2>
                <table class="mt10">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="td-option">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM producto";
                            $resultado = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($resultado)) {
                                $url = '../servicios/producto/producto_delete.php?codpro='.$row['codpro'];
                                echo
                        '<tr>
                            <td>'.$row['codpro'].'</td>
                            <td>'.$row['nombreprod'].'</td>
                            <td>'.$row['descripcion'].'</td>
                            <td class="td-option">
                                <div class="flex div-td-button">
                                    <button><i class="fa fa-pencil" aria-hidden="true" href="../servicios/producto/producto_edit.php?codpro='.$row['codpro'].'"></i></button>
                                    <button><a href="javascript:confirmDelete(\''.$url.'\')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                </div>
                            </td>
                        </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <button class="mt10" onclick="show_modal('modal-producto')">Agregar nuevo</button>
            </div>
        </div>
        <script type="text/javascript">
            function confirmDelete(delUrl) {
                if (confirm("¿Seguro que quieres eliminar el producto?")) {
                document.location = delUrl;
                }
            }
            function show_modal(id) {
                document.getElementById(id).style.display="block";
            }
            function hide_modal(id) {
                document.getElementById(id).style.display="none";
            }
            function save_producto() {
                let fd = new FormData();
                fd.append('codigo', document.getElementById('codigo').value);
                fd.append('nombre', document.getElementById('nombre').value);
                fd.append('descripcion', document.getElementById('descripcion').value);
                fd.append('imagen', document.getElementById('imagen').files[0]);
                let request = new XMLHttpRequest();
                request.open('POST', '../servicios/producto/producto_save.php', true);
                request.onload = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        let response = JSON.parse(request.responseText);
                        console.log(response);
                        if (response.state) {
                            alert("Producto insertado");
                        } else {
                            alert(response.detail);
                        }
                    }
                }
                request.send(fd);
                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        location.reload();
                    }
                };
            }
        </script>
   </body>
</html>