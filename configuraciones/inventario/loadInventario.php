<?php

require '../bbdd/bd.php';

$columns = ['id','descripcion','precio', 'precioVenta', 'fechaCompra', 'stock'];
$table = "inventario";

$campo = isset($_POST['buscarProduct']) ? $conn->real_escape_string($_POST['buscarProduct']) : null; //evitar código malicioso con real_escape

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
$where ORDER BY id DESC LIMIT 200";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;//Indica cuantos resultados está trayendo la consulta

$html = '';

if($num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $idreg = $row['id'];
        $descripcion = $row['descripcion'];
        $precioCompra = $row['precio'];
        $precioVenta = $row['precioVenta'];
        $fechaCompra = $row['fechaCompra'];
        $stock = $row['stock'];
        $ganancia = ($precioVenta - $precioCompra);

        $html .= '<tr>';//Filas
        $html .= '<td>'.$descripcion.'</td>';//Columnas
        $html .= '<td>$'.$precioCompra.'</td>';//Columnas
        $html .= '<td>$'.$precioVenta.'</td>';//Columnas
        $html .= '<td>$'.$ganancia.'</td>';//Columnas
        $html .= '<td>'.$fechaCompra.'</td>';//Columnas
        $html .= '<td>'.$stock.'</td>';//Columnas
        $html .= '<td><a name = "btnModalEdit" type="button" class="btn btn-primary" 
        onclick ="editProduct('."$idreg".', '."'$descripcion'".', '."$precioCompra".', '."$precioVenta".', '."$stock".','."'$fechaCompra'".');">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
        </svg>
        </a></td>';//Columnas
        /*$html .= '<td><a name = "btnModalDelete" type="button" class="btn btn-danger" onclick ="eliminar('."$idreg".');">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="4" y1="7" x2="20" y2="7" />
            <line x1="10" y1="11" x2="10" y2="17" />
            <line x1="14" y1="11" x2="14" y2="17" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        </a></td>';//Columnas*/
        $html .= '</tr>';//Se cierra la fila
    }
}else{
    $html .= '<tr>';
    $html .= '<td colspan = "7">Sin resultados</td>';
    $html .= '</tr>';
}




//Retornar en un formato Json
echo json_encode($html, JSON_UNESCAPED_UNICODE); //en caso de que algún caracter sea especial o tenga acento

     
