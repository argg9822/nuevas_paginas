<?php

require_once '../bbdd/bd.php';

$idReg = trim($_POST['idEditProduct']);
$descProduct = trim($_POST['descEditProduct']);
$cantProduct = trim($_POST['cantEditProduct']);
$precProduct = trim($_POST['precEditProduct']);
$precioVenta = trim($_POST['precioEditVenta']);
$fechaCompra = trim($_POST['fechaEditCompra']);

$editarProduct = "UPDATE `inventario` SET `descripcion`='$descProduct',`precio`= $precProduct,`precioVenta`=$precioVenta,`fechaCompra`='$fechaCompra',`stock`=$cantProduct WHERE `id` = $idReg";

$actualizar = mysqli_query($conn, $editarProduct);

if ($actualizar){
    echo json_encode('<p class = "resultadoPositivo">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <circle cx="12" cy="12" r="9" />
        <path d="M9 12l2 2l4 -4" />
    </svg>Producto editado correctamente</p>');
} else {
    echo json_encode('<p class = "resultadoNegativo">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 9v2m0 4v.01" />
            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
        </svg>Se ha producido un error</p>');
}
