<?php

require '../bbdd/bd.php';

$columns = ['idProducto','idVenta','producto','cantidad', 'fechaVenta','precioTotal','ganancia','stockInicial'];
$table = "registroventas";

$campo = isset($_POST['buscarVenta']) ? $conn->real_escape_string($_POST['buscarVenta']) : null; //evitar código malicioso con real_escape

$where = '';

if($campo != null){
    $where = "WHERE (";
    $contar = count($columns);//Calcular cuantos elementos tiene la tabla
    for($i = 0; $i < $contar; $i++){
        $where .=$columns[$i] . " LIKE '%". $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);//Se reemplaza el OR por string vacío de la variable where.
    $where .= ")";//Cerrar el paréntesis
}

//Implode convierte un arreglo a un string
$sql= "SELECT " . implode(", ", $columns). "
FROM $table
$where ORDER BY idVenta DESC LIMIT 300";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;//Indica cuantos resultados está trayendo la consulta

$html = '';

if($num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $idVenta = $row['idVenta'];
        $idProducto = $row['idProducto'];
        $producto = $row['producto'];
        $cantidad = $row['cantidad'];
        $stockInicial = $row['stockInicial'];
        $fechaVenta = $row['fechaVenta'];
        $precioTotal = $row['precioTotal'];
        $ganancia = $row['ganancia'];

        $html .= '<tr>';//Filas
            $html .= '<td>'.$row['producto'].'</td>';//Columnas
            $html .= '<td>'.$row['cantidad'].'</td>';//Columnas
            $html .= '<td>'.$row['fechaVenta'].'</td>';//Columnas
            $html .= '<td>$'.$row['precioTotal'].'</td>';//Columnas
            $html .= '<td>$'.$row['ganancia'].'</td>';//Columnas
            $html .= '<td><a data-bs-toggle="modal" data-bs-target="#modalDelVentTotal" class = "tdOptionDelete" onclick = "eliminarVentaTotal('."$idVenta".','."$idProducto".','."$stockInicial".')"><i class="fa-solid fa-trash"></i></a></td>';//Columnas
        $html .= '</tr>';
    }
}else{
    $html .= '<tr>';
    $html .= '<td colspan = "4">Sin resultados</td>';
    $html .= '</tr>';
}

//Retornar en un formato Json
echo json_encode($html, JSON_UNESCAPED_UNICODE); //en caso de que algún caracter sea especial o tenga acento

     
