
getDataProduct()

/*----------------------------------------------------------------
--------------------------AGREGAR PRODUCTO------------------------
----------------------------------------------------------------*/

let contentFormProduct = document.getElementById('addProductForm');

contentFormProduct.addEventListener('submit', function(e){
    e.preventDefault();

    let resultado = document.getElementById('divResultAddProduct');
    let datosFormAdd = new FormData(contentFormProduct);

    fetch("../configuraciones/inventario/addProduct.php", {
        method: 'POST',
        body: datosFormAdd
    })
    .then(res => res.json())
    .then(data => {
        resultado.innerHTML = data
        resultado.style.display = 'block'
        getDataProduct()
        setTimeout(function(){
            resultado.style.display = 'none'
        }, 3000);
    });

})

/*--------------------------------------------------------------
------------------------MOSTRAR PRODUCTOS-----------------------
--------------------------------------------------------------*/

document.getElementById('buscarProduct').addEventListener("keyup", getDataProduct)

function getDataProduct(){
    let input = document.getElementById("buscarProduct").value
    let content = document.getElementById("tableProduct")
    let url = "../configuraciones/inventario/loadInventario.php"
    let formData = new FormData()
    formData.append('buscarProduct', input)

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
}

/*--------------------------------------------------------------
------------------------EDITAR PRODUCTOS------------------------
--------------------------------------------------------------*/

function editProduct(idReg, descripcion, precioCompra, precioVenta, stock, fechaCompra){
    let editModal = new bootstrap.Modal(modalEditProduct, {}).show();
    document.getElementById('idEditProduct').value = idReg;
    document.getElementById('descEditProduct').value = descripcion;
    document.getElementById('cantEditProduct').value = stock;
    document.getElementById('precEditProduct').value = precioCompra;
    document.getElementById('precioEditVenta').value = precioVenta;
    document.getElementById('fechaEditCompra').value = fechaCompra;
}

let contentEditProduct = document.getElementById('editProductForm');
contentEditProduct.addEventListener('submit',  function(e){
    e.preventDefault();

    let resultadoEdit = document.getElementById('divResultEditProduct');
    let datosFormEdit = new FormData(contentEditProduct);

    fetch("../configuraciones/inventario/editProduct.php", {
        method: 'POST',
        body: datosFormEdit
    })
    .then(res => res.json())
    .then(data => {
        resultadoEdit.innerHTML = data
        resultadoEdit.style.display = 'block'
        getDataProduct()
        setTimeout(function(){
            resultadoEdit.style.display = 'none'
        }, 3000);
    });
})