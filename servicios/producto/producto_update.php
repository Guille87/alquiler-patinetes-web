<?php
    include('../_conexion.php');
    $response = new stdClass();

    $response->state = true;

    $codpro = $_POST['codigo'];
    $nombreprod = $_POST['nombreprod'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $imagen = $_POST['rutaimagen'];

    if (isset($_FILES['imagen'])) {
        $t = time();
        $nombre_imagen = date("dmYHis",$t).".png";
        $sql = "UPDATE producto SET nombreprod = '$nombreprod', descripcion = '$descripcion', stock = '$stock', imagen = '$nombre_imagen' WHERE codpro = '$codpro'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../../images/" . $nombre_imagen)) {
                $response->state = true;
                unlink("../../images/" . $imagen);
            } else {
                $response->state = false;
                $response->detail = "Hubo un error al cargar la imagen";
            }
        } else {
            $response->state = false;
            $response->detail = "No se pudo guardar el producto";
        }
    } else {
        $sql = "UPDATE producto SET nombreprod = '$nombreprod', descripcion = '$descripcion', stock = '$stock' WHERE codpro = '$codpro'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $response->state = true;
        } else {
            $response->state = false;
            $response->detail = "Falta la imagen";
        }
    }

    echo json_encode($response);