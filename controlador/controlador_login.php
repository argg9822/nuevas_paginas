<?php
session_start();
require 'configuraciones/bbdd/bd.php';

$respuesta = "";
if(!empty($_POST['btn-ingresar'])){
    if(!empty($_POST['usuario']) AND !empty($_POST['password'])){
        $usuario = trim($_POST['usuario']);
        $password = $_POST['password'];
        $sql = "SELECT * FROM `usuarios` WHERE `email` = '$usuario' AND password = '$password'";
        $consulta = mysqli_query($conn, $sql);
        if($datos=$consulta->fetch_object()){
            header("location: Secciones/index.php");
            $_SESSION['id_user'] = $datos->id;
            $_SESSION['nombre'] = $datos->nombre;
            $_SESSION['usuario'] = $datos->email;
        }else{
            $respuesta = "<h6 class = 'mb-2'>Usuario o contraseña incorrectos</h6>";
        }
    }else{
        $respuesta = "<h6 class = 'mb-2'>Se requiere usuario y contraseña</h6>";
    }
}