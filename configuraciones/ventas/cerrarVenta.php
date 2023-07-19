<?php

require '../configuraciones/bbdd/bd.php';

if (isset($_POST['btn-cerrarVenta'])){
    $cerrarVenta = "DELETE FROM `ventas_tmp`";
    $sqlCerrar = mysqli_query($conn, $cerrarVenta); 
}
