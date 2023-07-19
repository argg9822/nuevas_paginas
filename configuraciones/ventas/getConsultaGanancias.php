<?php

require_once '../bbdd/bd.php';

$fechaIni = $_POST['fechaIniGan'];
$fechaFin = $_POST['fechaFinGan'];

if ($fechaIni != null && $fechaFin != null){
    $sqlGanancias = "SELECT SUM(`ganancia`) AS gananciasFecha FROM `registroventas` WHERE `fechaVenta` BETWEEN '$fechaIni' AND '$fechaFin'";
    $consultar = mysqli_query($conn, $sqlGanancias);
    $outputGanancias = "";

    if  ($consultar){
        $getGanancias = mysqli_fetch_assoc($consultar)['gananciasFecha'];
        if ($getGanancias == null || $getGanancias == ''){
            $outputGanancias = "Sin resultados";
        } else {
            $outputGanancias = "Total ganancia: <span class = 'pGanancias'> $".$getGanancias."</span>
            <abbr title = 'Detalles'>
                <a type ='button' onclick = 'detallesGanancias' class = 'detallesGanancias'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-down-right' width='20' height='20' viewBox='0 0 30 30' stroke-width='1' stroke='#000000' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                        <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                        <line x1='7' y1='7' x2='17' y2='17' />
                        <polyline points='17 8 17 17 8 17' />
                    </svg>
                </a>
            </abbr>";
        }
        
    } else {
        $outputGanancias = "Error al realizar la consulta, intente nuevamente";   
    }

} else {
    $outputGanancias = "Por favor inserte un rango de fechas válido";
}

echo json_encode('<div class = "resultGanancias"><span class = "colorBlack spanGanancias">'.$outputGanancias.'</span></div>');