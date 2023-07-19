<?php

$conn = new mysqli("localhost", "id20517865_variedadesnp", "BerthaG2023*+", "id20517865_nuevaspaginas");

if ($conn -> connect_error){
    die ('Error de conexión ' . $conn->connect_error);
}
?>