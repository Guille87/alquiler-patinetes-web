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
        <div class="modal" id="modal-producto-edit" style="display: none;">
            <div class="body-modal">
                <button class="btn-close" onclick="hide_modal('modal-producto-edit')"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h3>Editar producto</h3>
                <div class="div-flex">
                    <label>Código</label>
                    <input type="text" id="codigo-e" disabled>
                </div>
                <div class="div-flex">
                    <label>Nombre</label>
                    <input type="text" id="nombre-e">
                </div>
                <div class="div-flex">
                    <label>Descripción</label>
                    <input type="text" id="descripcion-e">
                </div>
                <input type="text" id="rutaimagen-aux" style="display: none;">
                <img id="rutaimagen" src="" style="width: 200px;margin: 5px 0;">
                <div class="div-flex">
                    <input type="file" id="imagen-e">
                </div>
                <button onclick="update_producto()">Actualizar</button>
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
                                            <button onclick="edit_producto('.$row['codpro'].')"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                            <a href="javascript:confirmDelete(\''.$url.'\')"><button><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
                            location.reload();
                        } else {
                            alert(response.detail);
                        }
                    }
                }
                request.send(fd);
            }
            function edit_producto(codpro) {
                let fd = new FormData();
                fd.append('codpro', codpro);
                let request = new XMLHttpRequest();
                request.open('POST', '../servicios/producto/get_product.php', true);
                request.onload = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        let response = JSON.parse(request.responseText);
                        console.log(response);
                        document.getElementById("codigo-e").value=codpro;
                        document.getElementById("nombre-e").value=response.product.nombreprod;
                        document.getElementById("descripcion-e").value=response.product.descripcion;
                        document.getElementById("rutaimagen").src="../images/"+response.product.imagen;
                        document.getElementById("rutaimagen-aux").value=response.product.imagen
                        show_modal('modal-producto-edit');
                    }
                }
                request.send(fd);
            }
            function update_producto() {
                let fd = new FormData();
                fd.append('codigo', document.getElementById('codigo-e').value);
                fd.append('nombreprod', document.getElementById('nombre-e').value);
                fd.append('descripcion', document.getElementById('descripcion-e').value);
                fd.append('imagen', document.getElementById('imagen-e').files[0]);
                fd.append('rutaimagen', document.getElementById('rutaimagen-aux').value);
                let request = new XMLHttpRequest();
                request.open('POST', '../servicios/producto/producto_update.php', true);
                request.onload = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        let response = JSON.parse(request.responseText);
                        console.log(response);
                        if (response.state) {
                            alert("Producto actualizado");
                            location.reload();
                        } else {
                            alert(response.detail);
                        }
                    }
                }
                request.send(fd);
            }
        </script>
   </body>
</html>