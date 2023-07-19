<?php

require_once '../bbdd/bd.php';
include '../monthString.php';

setlocale(LC_ALL, 'es_ES'); //CONVERTIR A ESPAÑOL
$anioActual = date('Y');

$numMeses = "SELECT MONTH(`fechaVenta`) AS mes FROM `registroventas` WHERE YEAR(fechaVenta) = '$anioActual' GROUP BY mes";
$consultaSqlMeses = mysqli_query($conn, $numMeses); //Consulta el número de registros

$outputTable[] = '';

$i = 1;

if($consultaSqlMeses->num_rows > 0){
    do{
        $consultaGanancias = "SELECT SUM(ganancia) AS ganancias FROM `registroventas` WHERE MONTH(`fechaVenta`) = '$i' AND YEAR(fechaVenta) = '$anioActual'";
        $consultaSql = mysqli_query($conn, $consultaGanancias);
        $mesLetra = MonthString::convertMonth($i);

            while ($row = $consultaSql->fetch_assoc()){
                $gananciaMes = $row['ganancias'];

                $outputTable [$i-1] = '<tr>';
                $outputTable [$i-1] .= '<td>'.$mesLetra.'</td>';
                $outputTable [$i-1] .= '<td>$'.$gananciaMes.'</td>';
            }

            $productoMasVendido = "SELECT producto, SUM(cantidad) AS cantProduct FROM `registroventas` WHERE MONTH(`fechaVenta`) = $i AND YEAR(fechaVenta) = '$anioActual' GROUP BY producto ORDER BY cantProduct DESC LIMIT 1";
            $productoSql = mysqli_query($conn, $productoMasVendido);

            while ($row1 = $productoSql->fetch_assoc()){
                $productoMes = $row1['producto'];
                $cantProduct = $row1['cantProduct'];

                $outputTable [$i-1] .= '<td>'.$productoMes.'</td>';
                $outputTable [$i-1] .= '<td>'.$cantProduct.'</td>';
                $outputTable [$i-1] .= '</tr>';
            }
        
        $i++;

    } while ($i <= $consultaSqlMeses->num_rows);

} else {
    $outputTable [$i-1] .= '<tr>';
    $outputTable [$i-1] .= '<td colspan = "4">No hay resultados</td>';
    $outputTable [$i-1] .= '</tr>';
}

echo json_encode($outputTable, JSON_UNESCAPED_UNICODE);

mysqli_close($conn);



