<?php 

require "../bbdd/bd.php";

$idVenta = trim($_POST['idVentaTotal']);
$stockInicial = trim($_POST['stockIniInputTotal']);
$idProducto = trim($_POST['idProductTotal']);

$deleteVentarReal = "DELETE FROM registroventas WHERE idVenta = $idVenta";
$sqlVentaReal = mysqli_query($conn, $deleteVentarReal);

$updateStock = "UPDATE `inventario` SET `stock`= $stockInicial WHERE `id` = $idProducto ";
$sqlUpStock = mysqli_query($conn, $updateStock);

if ($sqlVentaReal){
    echo json_encode('<p>Producto eliminado</p>');
} else {
    echo json_encode('<p>Error al eliminar producto</p>');
}

mysqli_close($conn);