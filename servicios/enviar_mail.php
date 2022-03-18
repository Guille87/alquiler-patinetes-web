<?php
include('_conexion.php');

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];

$comment = $_POST['mensaje'];

@mail("osirispro.cs@gmail.com", $asunto, $comment);

$sql = "INSERT INTO contacto (nombre, email, asunto, mensaje) VALUES('$nombre', '$email', '$asunto', '$comment')";
if (mysqli_query($con, $sql)) {
    $message = "Email enviado. Gracias " .$nombre . ", te contactaremos pronto.";
} else {
    $message = "Hubo un error al enviar la información.";
}

echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>";
echo "window.location.assign('../contact.php')";
echo "</script>";

?>