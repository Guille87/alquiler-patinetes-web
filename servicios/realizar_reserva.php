<?php
include('_conexion.php');

$con2 = mysqli_connect('localhost', 'root', '', 'muevete');
$con3 = mysqli_connect('localhost', 'root', '', 'muevete');

$response = new stdClass();

$usu = $_POST['usuario'];
$prod = $_POST["producto"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$tiempo = $_POST["answer"];

$sql = "INSERT INTO reserva(codpro, codusu, fecha, hora, tiempo) VALUES('$prod','$usu','$fecha','$hora','$tiempo')";
if (mysqli_query($con, $sql)) {
    $sql2 = "SELECT * FROM producto WHERE codpro = '$prod'";
    $result = mysqli_query($con2, $sql2);
    if ($result) {
        $sql3 = "UPDATE producto SET stock = stock - 1 WHERE codpro = '$prod'";
        $result2 = mysqli_query($con3, $sql3);
        if ($result2) {
            $message = "Reserva realizada";
        }
    }
} else {
    $message = "Ha fallado la reserva";
}

echo "<script type='text/javascript'>alert('$message');</script>";
mysqli_close($con);
echo "<script type='text/javascript'>";
echo "window.location.assign('../index.php')";
echo "</script>";
