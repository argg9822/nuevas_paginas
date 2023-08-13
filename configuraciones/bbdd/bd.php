<?php

$conn = new mysqli("localhost", "", "", "");

if ($conn -> connect_error){
    die ('Error de conexión ' . $conn->connect_error);
}
?>
