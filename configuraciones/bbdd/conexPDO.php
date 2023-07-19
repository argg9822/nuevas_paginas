<?php

//Clase para generar la conexión a la base de datos

class Database {
    private $hostname = "localhost";
    private $database = "id20517865_nuevaspaginas";
    private $username = "id20517865_variedadesnp";
    private $password = "BerthaG2023*+";
    private $charset = "utf8";

    function conectar (){
        try {
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" .
            $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e){
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}