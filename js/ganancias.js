/* ---------------- Consultar ganancias por fecha -------------------*/

let formGananciasFecha = document.getElementById('formGanancias');
formGananciasFecha.addEventListener('submit', function(e){
    e.preventDefault();
    let resultado = document.getElementById('resultGanancias');
    let formData = new FormData(formGananciasFecha);

    fetch('../configuraciones/ventas/getConsultaGanancias.php', {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        resultado.innerHTML = data
    })
})

//Ganancias meses
let urlGanancias = '';

//Página inicio
if(document.getElementById('btnGananciasInicio')){
    let btnGananciasInicio = document.getElementById('btnGananciasInicio');
    btnGananciasInicio.addEventListener('click', function(){
        urlGanancias = '../configuraciones/ventas/consultaGananciasMes.php';
        getGananciasMes(urlGanancias);
    })

} else if (document.getElementById('btnGanancias')){
    //Página inventario
    let btnGanancias = document.getElementById('btnGanancias');
    btnGanancias.addEventListener('click', function(){
        urlGanancias = '../configuraciones/ventas/consultaGananciasMes.php';
        getGananciasMes(urlGanancias);
    })
}

function getGananciasMes (url){
    
    let resultadoTable = document.getElementById('contentGanancia');
    let formData = new FormData();

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        resultadoTable.innerHTML = data
    })
}