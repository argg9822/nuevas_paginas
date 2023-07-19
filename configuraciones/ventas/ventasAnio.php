<?php 

    setlocale(LC_TIME, 'es_CO.UTF-8'); //CONVERTIR A ESPAÑOL
    date_default_timezone_set ('America/Bogota'); //DEFINIR ZONA HORARIA
    require '../bbdd/bd.php';

    $anio = date("Y");
    $mes = date("m");
    $dia = date("d");

    $ventasAnio ="SELECT SUM(ganancia) AS gananciaAnio FROM registroventas WHERE fechaVenta BETWEEN '$anio-01-01' AND '$anio-12-31'";
    $sqlConsulta = mysqli_query($conn,$ventasAnio);
    $cadena ="<span class = 'totalventasAnio'>$";        
    $imprimir = mysqli_fetch_assoc($sqlConsulta)['gananciaAnio'];
    if($imprimir == null || $imprimir == ''){
        $imprimir = 0;
    }
    $cadena = $cadena."".$imprimir;
    echo $cadena."</span>";