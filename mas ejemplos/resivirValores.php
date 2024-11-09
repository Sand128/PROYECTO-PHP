<?php
//resivir datos del formulario Variables.php
$nombre=$_POST['nombre'];//$nombre nombre de la variable declarada
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$carrera=$_POST['carrera'];
$semestre=$_POST['semestre'];
$grupo=$_POST['grupo'];
//imprime los valores
echo $nombre;
echo $paterno;

?>