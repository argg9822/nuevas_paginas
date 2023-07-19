<?php
require '../bbdd/conexPDO.php';

$conn = new Database();
$pdo = $conn->conectar();

$producto = trim($_POST['productoVenta']);

$sql = "SELECT `id`, `descripcion`, `precio`, `precioVenta`, `stock` FROM `inventario` WHERE descripcion LIKE ? ORDER BY descripcion ASC";
$query = $pdo->prepare($sql);
$query->execute(['%'. $producto.'%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)){
    $html .= "<li onclick = \"mostrar('".$row['id']."','".$row['descripcion']."','".$row['precioVenta']."','".$row['stock']."','".$row['precio']."')\" class = 'liAutocomplete'>".$row['descripcion']."</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);