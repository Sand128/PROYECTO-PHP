<?php
#$total=$_REQUEST['total']
echo "hola";
$total = $_POST['axel']+$_POST['jacob']+$_POST['sandra']+$_POST['pamela']+$_POST['aixa'];

if ( $total >= 90000){
    $descuento= $total-(90000*.20);
    echo "Felicidades el total del costo de los celulares es $total y aplicaste 20% de descuento y el total a pagar es $descuento";
}elseif ($total >= 80000){
    $descuento= $total-(80000*.15);
    echo "Felicidades el total del costo de los celulares es ",$total," y aplicaste 15% de descuento y el total a pagar es",$descuento;
}elseif($total >= 70000){
    $descuento= $total-(70000*.10);
    echo "Felicidades el total del costo de los celulares es ",$total," y aplicaste 10% de descuento y el total a pagar es",$descuento;
}
?>