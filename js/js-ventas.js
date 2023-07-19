getDataVentasTmp()
getDataVentaTotal()
totalVentasDia()
totalVentasMes()
totalVentasAnio()


/*---------------------FECHA ACTUAL--------------------*/

window.onload = function() {
    let fecha = new Date();
    let dia = fecha.getDate();
    let mes = fecha.getMonth() + 1;
    let anio = fecha.getFullYear();
    if (dia < 10) {
        dia = "0" + dia;
    }

    if (mes < 10) {
        mes = "0" + mes;
    }

    document.getElementById('fechaVenta').value = anio + '-' + mes + '-' + dia;
}

/*---------------------------------------------------
--------------LISTA AUTOMÁTICA PRODUCTOS-------------
---------------------------------------------------*/

document.getElementById("productoVenta").addEventListener("keyup", getProductos)
let listaProd = document.getElementById("listaProductos")

function getProductos(){
    let inputProducto = document.getElementById("productoVenta").value

    if(inputProducto.length > 0){
        let url = "../configuraciones/ventas/getProductos.php"
        let formData = new FormData()
        formData.append("productoVenta", inputProducto)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors"
        })
        .then(response => response.json())
        .then(data => {
            listaProd.style.display = 'block'
            listaProd.innerHTML = data
            document.getElementById('cantidad').value = 1;
            
        })
        .catch(err => console.log(err))
    } else {
        listaProd.style.display = 'none'
    }
}

function mostrar (id, descripcion, precioVenta, stock, precioCompra){
    listaProd.style.display = 'none'
    document.getElementById('idProduct').value = id;
    document.getElementById('productoVenta').value = descripcion;
    document.getElementById('precioU').value = precioVenta;
    document.getElementById('precioTotal').value = precioVenta;

    //----------------Para calcular el stock-------------------
    document.getElementById('stock').value = stock - 1;
    document.getElementById('stockCalc').value = stock; //Modal para eliminar venta temporal
    //document.getElementById('stockCalcTotal').value = stock; //Modal para eliminar venta total
    //----------------------------------------------------------
    
    console.log(precioCompra);
    document.getElementById('precioCompra').value = precioCompra;
    
    document.getElementById('precioUGasto').value = precioCompra;
    calcularPrecio();
}

document.getElementById('cantidad').addEventListener("keyup", calcularPrecio)

function calcularPrecio(){
    let precioUnitario = document.getElementById('precioU').value;
    let cantidad = document.getElementById('cantidad').value;
    let precioCompra = document.getElementById('precioCompra').value;
    let stock = document.getElementById('stockCalc').value;
    
    let precioTotal = precioUnitario * cantidad;
    let precioCompraTotal = precioCompra * cantidad;
    let gananciaVenta = precioTotal - precioCompraTotal;
    document.getElementById('ganancia').value = gananciaVenta;
    document.getElementById('precioTotal').value = precioTotal;
    document.getElementById('precioUGasto').value = precioCompraTotal;

    console.log(gananciaVenta);

    $(".calcStockFinal").each(function(){
        if(isNaN(parseFloat($(this).val()))){
            let stockTotal = stock - cantidad;
            document.getElementById('stock').value = stockTotal;
        } else {
            console.log("No hacer nada");
        }
    })
    
}

/*---------------------------------------------------
-----------------REGISTRAR VENTA---------------------
---------------------------------------------------*/

let contentVentas = document.getElementById('formVentas');

contentVentas.addEventListener('submit', function(e){
    e.preventDefault();

    let resultado = document.getElementById('resultadoVentaTmp');
    let dataVentaTmp = new FormData(contentVentas);

    fetch("../configuraciones/ventas/addVentasTmp.php", {
        method: "POST",
        body: dataVentaTmp
    })
    .then(res => res.json())
    .then(data => {
        resultado.innerHTML = data
        resultado.style.display = "block"
        getDataVentasTmp()
        totalVenta()
        setTimeout(function(){
            resultado.style.display = 'none'
        }, 3000);
    });
})

/* ---------------------------------------------------------
---------------------TABLA VENTA TMP -----------------------
----------------------------------------------------------*/

function getDataVentasTmp(){
    let content = document.getElementById('dataCompra')
    let url = "../configuraciones/ventas/loadVentasTmp.php";
    let formData = new FormData()

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
}

/*-----------------------------------------------------------
-----------------------TOTAL VENTA---------------------------
-----------------------------------------------------------*/

function totalVenta (){
    let content = document.getElementById('totalCompra')
    let url = "../configuraciones/ventas/totalVenta.php";
    let formData = new FormData()

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
}

/*-----------------------------------------------------------
-----------------------ELIMINAR VENTA------------------------
-----------------------------------------------------------*/

function eliminarVentaTemp(idVenta, idProductoInput, stockInicial){
    document.getElementById('idProductInput').value = idProductoInput;    
    document.getElementById('idVentaInput').value = idVenta;
    document.getElementById('stockIniInput').value = stockInicial;
}

let formVentaTmp = document.getElementById('idVentaForm');

    formVentaTmp.addEventListener('submit', function(e){
        e.preventDefault();

        let contentResultado = document.getElementById('ventaEliminada');
        let formData = new FormData(formVentaTmp);

        fetch("../configuraciones/ventas/eliminarTmpVenta.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            contentResultado.innerHTML = data
            getDataVentasTmp()
            totalVenta ()
        });
    })    

/* ---------------------------------------------------------
--------------------TABLA VENTA TOTAL ----------------------
----------------------------------------------------------*/

document.getElementById('buscarVenta').addEventListener('keyup', getDataVentaTotal)

function getDataVentaTotal(){
    let input = document.getElementById('buscarVenta').value
    let content = document.getElementById('dataVentasTotal')
    let url = "../configuraciones/ventas/loadVentasTotal.php";
    let formData = new FormData()
    formData.append('buscarVenta', input)

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
}

function eliminarVentaTotal(idVenta, idProducto, stockInicial){
    document.getElementById('idVentaTotal').value = idVenta;
    document.getElementById('idProductTotal').value = idProducto;
    document.getElementById('stockIniInputTotal').value = stockInicial;
}

let idVentaTotalForm = document.getElementById('idVentaTotalForm');

idVentaTotalForm.addEventListener('submit', function(e){
    e.preventDefault();

    let contentResultado = document.getElementById('ventaTotalEliminada');
    let formData = new FormData(idVentaTotalForm);

    fetch("../configuraciones/ventas/eliminarVentaTotal.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        getDataVentaTotal()
        totalVentasAnio()
        totalVentasMes()
        totalVentasDia()
        contentResultado.innerHTML = data
        contentResultado.style.display = "block"
        setTimeout(function(){
            contentResultado.style.display = 'none'
        }, 3000);
        
    });
})

/*----------------------------------------------------
----------------------GANANCIAS-----------------------
----------------------------------------------------*/

function totalVentasDia(){
    $.ajax({
        type:"POST",
        url:"../configuraciones/ventas/ventasDia.php",
        data: "Busqueda=" + $('#buscarVenta').val(),
        success:function(r){
            $("#dailySales").html(r);
        }
    });
}

function totalVentasMes(){
    $.ajax({
        type:"POST",
        url:"../configuraciones/ventas/ventasMes.php",
        data: "Busqueda=" + $('#buscarVenta').val(),
        success:function(r){
            $("#monthlySales").html(r);
        }
    });
}

function totalVentasAnio(){
    $.ajax({
        type:"POST",
        url:"../configuraciones/ventas/ventasAnio.php",
        data: "Busqueda=" + $('#buscarVenta').val(),
        success:function(r){
            $("#yearlySales").html(r);
        }
    });
}

/*-----------------------------------------------------------
---------------------------DESCUENTO-------------------------
-----------------------------------------------------------*/

let botonDescuento = document.getElementById('activeDescuento');
let inputPrecioU = document.getElementById('precioU');
let checkDescuento = document.getElementById('divCheckDescuento');

window.addEventListener('load', function(){
    $("#precioU").attr("readonly","readonly");
})

function readOnlyPrecio(){
    if(botonDescuento.checked){
        $("#precioU").removeAttr("readonly");
        checkDescuento.classList.remove('checkDescuento');
        checkDescuento.classList.add('checkDescuentoActive');
    }else {
        $("#precioU").attr("readonly","readonly");
        checkDescuento.classList.remove('checkDescuentoActive');
        checkDescuento.classList.add('checkDescuento');
    }
}

inputPrecioU.addEventListener('keyup', calcularPrecio)



