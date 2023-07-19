<?php

require_once '../bbdd/bd.php';

$descProduct = trim($_POST['descProduct']);
$cantProduct = trim($_POST['cantProduct']);
$precProduct = trim($_POST['precProduct']);
$precioVenta = trim($_POST['precioVenta']);
$fechaCompra = trim($_POST['fechaCompra']);

$agregarProduct = "INSERT INTO `inventario`(`descripcion`, `precio`, `precioVenta`, `fechaCompra`, `stock`) 
                    VALUES ('$descProduct', '$precProduct', '$precioVenta','$fechaCompra', '$cantProduct')";

$insertar = mysqli_query($conn, $agregarProduct);

if ($insertar){
    echo json_encode('<p class = "resultadoPositivo">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2l4 -4" />
    </svg>Se agregó "'.$descProduct.'" a la lista de productos</p>');
} else {
    echo json_encode('<p class = "resultadoNegativo">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 9v2m0 4v.01" />
            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
        </svg>Se ha producido un error</p>');
}
