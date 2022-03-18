<?php
    include('../_conexion.php');
    $response = new stdClass();

    $response->state = true;

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];

    if ($nombre == "") {
        $response->state = false;
        $response->detail = "Falta el nombre";
    } else {
        if ($descripcion == "") {
            $response->state = false;
            $response->detail = "Falta la descripción";
        } else {
            if ($stock == "") {
                $response->state = false;
                $response->detail = "Falta el stock";
            } else {
                if (isset($_FILES['imagen'])) {
                    $t = time();
                    $nombre_imagen = date("dmYHis",$t).".png";
                    $sql = "INSERT INTO producto (nombreprod, descripcion, stock, imagen) VALUES('$nombre', '$descripcion', '$stock', '$nombre_imagen')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../../images/" . $nombre_imagen)) {
                            $response->state = true;
                        } else {
                            $response->state = false;
                            $response->detail = "Hubo un error al cargar la imagen";
                        }
                    } else {
                        $response->state = false;
                        $response->detail = "No se pudo guardar el producto";
                    }
                } else {
                    $response->state = false;
                    $response->detail = "Falta la imagen";
                }
            }
        }
    }

    echo json_encode($response);