<?php

require '../bbdd/bd.php';

$idProduct = trim($_POST['idProduct']);
$producto = trim($_POST['productoVenta']);
$cantidad = trim($_POST['cantidad']);
$fecha = trim($_POST['fechaVenta']);
$precioTotal = trim($_POST['precioTotal']);
$ganancia = trim($_POST['ganancia']);
$stockRemain = trim($_POST['stock']);
$stockInicial = trim($_POST['stockCalc']);

if ($idProduct == "" || $cantidad == "" || $fecha == "" ){
    echo json_encode('<p>Por favor complete todos los campos</p>');
} else {
    $ventaTmp= "INSERT INTO `ventas_tmp`(`idProducto`, `cantidad`, `fechaVenta`, `precioTotal`, `ganancia`, `stockInicial`) 
                VALUES ('$idProduct','$cantidad','$fecha','$precioTotal','$ganancia', '$stockInicial')";
    $insertVentaTmp = mysqli_query($conn, $ventaTmp);

    $ventaReal = "INSERT INTO `registroventas`(`idProducto`, `producto`, `cantidad`, `fechaVenta`, `precioTotal`, `ganancia`, `stockInicial`) 
    VALUES ('$idProduct','$producto','$cantidad','$fecha','$precioTotal','$ganancia','$stockInicial')";
    $insertarVentaReal = mysqli_query($conn, $ventaReal);

    $updateStock = "UPDATE `inventario` SET `stock`='$stockRemain' WHERE `id` = $idProduct";
    $updateSql = mysqli_query($conn, $updateStock);

    if($insertVentaTmp && $insertarVentaReal){
        echo json_encode('<p>Producto agregado</p>');    
    } else {
        echo json_encode('<p>Error al agregar el producto</p>');
    }    
}

mysqli_close($conn);
