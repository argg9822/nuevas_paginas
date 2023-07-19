<?php

    setlocale(LC_TIME, 'es_CO.UTF-8'); //CONVERTIR A ESPAÑOL
    date_default_timezone_set ('America/Bogota'); //DEFINIR ZONA HORARIA
    require '../bbdd/bd.php';

    $anio = date("Y");
    $mes = date("m");
    $dia = date("d");

    $ventasMes ="SELECT SUM(ganancia) AS gananciaMes FROM registroventas WHERE fechaVenta BETWEEN '$anio-$mes-01' AND '$anio-$mes-$dia'";
    $sqlMes = mysqli_query($conn,$ventasMes);
    $cadena ="<span class = 'totalVentasMes'>$";        
    $imprimirMes = mysqli_fetch_assoc($sqlMes)['gananciaMes'];

    if($imprimirMes == null || $imprimirMes == ''){
        $imprimirMes = 0;
    }
    
    $cadena = $cadena."".$imprimirMes;
    echo $cadena."</span>";