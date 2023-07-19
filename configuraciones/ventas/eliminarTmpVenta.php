<?php 

require_once "../bbdd/bd.php";

$idVenta = trim($_POST['idVentaInput']);
$idProductInput = trim($_POST['idProductInput']);
$stockIniInput = trim($_POST['stockIniInput']);

$deleteVentaTemp = "DELETE FROM ventas_tmp WHERE idVenta = $idVenta";
$sql = mysqli_query($conn, $deleteVentaTemp);

$deleteVentarReal = "DELETE FROM registroventas WHERE idVenta = $idVenta";
$sqlVentaReal = mysqli_query($conn, $deleteVentarReal);

$updateStock = "UPDATE `inventario` SET `stock`= $stockIniInput WHERE `id` = $idProductInput ";
$sqlUpStock = mysqli_query($conn, $updateStock);

if ($sql){
    echo json_encode('<div><p>Producto eliminado</p></div>');
} else {
    echo json_encode('<p>Error al eliminar producto</p>');
}

mysqli_close($conn);