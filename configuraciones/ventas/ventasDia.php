<?php 

    setlocale(LC_TIME, 'es_CO.UTF-8'); //CONVERTIR A ESPAÑOL
    date_default_timezone_set ('America/Bogota'); //DEFINIR ZONA HORARIA
    require '../bbdd/bd.php';

    $anio = date("Y");
    $mes = date("m");
    $dia = date("d");

    $ventasDia ="SELECT SUM(ganancia) AS gananciaDia FROM registroventas WHERE fechaVenta = '$anio-$mes-$dia'";
    $sqlConsulta = mysqli_query($conn,$ventasDia);
    $cadena ="<span class = 'totalVentasDia'>$";        
    $imprimir = mysqli_fetch_assoc($sqlConsulta)['gananciaDia'];
    if($imprimir == null || $imprimir == ''){
        $imprimir = 0;
    }
    $cadena = $cadena."".$imprimir;
    echo $cadena."</span>";

   




?>