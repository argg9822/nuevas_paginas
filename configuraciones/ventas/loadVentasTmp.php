<?php

require '../bbdd/bd.php';

$columns = ['ventas_tmp.idProducto AS idProducto','ventas_tmp.idVenta AS ID', 'inventario.descripcion AS producto', 'ventas_tmp.cantidad AS Cantidad', 'ventas_tmp.fechaVenta AS fecha', 'ventas_tmp.precioTotal AS Total', 'ventas_tmp.stockInicial AS stockInicial'];
$table = "ventas_tmp";

$where = 'INNER JOIN inventario ON (inventario.id = ventas_tmp.idProducto)';

//Implode convierte un arreglo a un string
$sql= "SELECT " . implode(", ", $columns). "
FROM $table
$where";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;//Indica cuantos resultados está trayendo la consulta

$html = '';
$i = 1;

if($num_rows > 0){
    for (; ; ){
        if ($i > $num_rows){
            break;
        }
        
        while($row = $resultado->fetch_assoc()){
                $idVenta = $row['ID'];
                $idProducto = $row['idProducto'];
                $producto = $row['producto'];
                $Cantidad = $row['Cantidad'];
                $stockInicial = $row['stockInicial'];
                $fecha = $row['fecha'];
                $Total = $row['Total'];

                $html .= '<tr>';//Filas
                $html .= '<td>'.$i++.'</td>';//Columnas
                $html .= '<td>'.$producto.'</td>';//Columnas
                $html .= '<td>'.$Cantidad.'</td>';//Columnas
                $html .= '<td>$'.$Total.'</td>';//Columnas
                $html .= '<td><button class = "btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#modalDelVenTemp" onclick = "eliminarVentaTemp('."$idVenta".','."$idProducto".','."$stockInicial".')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                    <path d="M10 10l4 4m0 -4l-4 4" />
                </svg></button></td>';//Columnas
                $html .= '</tr>';
        }
    }
} else{
    $html .= '<tr>';
    $html .= '<td colspan = "4">Agregue productos al carro de compras</td>';
    $html .= '</tr>';
}

//Retornar en un formato Json
echo json_encode($html, JSON_UNESCAPED_UNICODE); //en caso de que algún caracter sea especial o tenga acento

     
