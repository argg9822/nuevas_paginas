<?php

require '../bbdd/bd.php';

$totalVenta = "SELECT SUM(`precioTotal`) AS total FROM `ventas_tmp`";
$consultaTmp = mysqli_query($conn, $totalVenta);
$cadena = '<div><h5>Total: $';
$mostrar = mysqli_fetch_assoc($consultaTmp)['total'];
$cadena .= $mostrar;
echo json_encode($cadena.'</h5></div><div></div><div></div><div class = "ms-3"><form method = "POST"><button class = "btn btn-success" id = "btn-cerrarVenta" name = "btn-cerrarVenta" data-bs-target="#modalConfirmVenta">Confirmar</button></form></div>');