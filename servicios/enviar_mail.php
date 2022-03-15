<?php

$Asunto = $_POST['Nombre'].' - '.$_POST["Email"].' - '.$_POST["Telefono"];
$Mensaje = $_POST["Mensaje"];

//Mail('guillermo_amado@hotmail.es', 'asdasdasd', 'asda');
echo 'window.open(\'mailto:guillermo_amado@hotmail.es?subject='.$Asunto.'&body='.$Mensaje.'\');';

