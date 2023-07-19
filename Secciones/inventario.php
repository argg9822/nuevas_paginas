<?php 

    session_start();
    $varSession = $_SESSION['nombre'];
    error_reporting(0);
    if($varSession == null || $varSession == ''){
        header("location: ../index.php");
        die();
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Nuevas Páginas</title>
        <link rel="icon" href="../img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/css-header.css?0.1">
        <link rel="stylesheet" href="../css/css-modales.css">
        <link rel="stylesheet" href="../css/css-inventario.css">
    </head>
    
    <body>

        <header>
            <a href="../../NuevasPaginas/" class = "a__logo">
                <img src="../img/logo.png" class = "logo" alt="Logo" width="15%">
                <h1 class = "logo colorWhite">NUEVAS PÁGINAS</h1>
            </a>

            <nav>
                <ul class = "nav_links">
                <li><a href="index.php">Inicio</a></li>
                <li class = "selected"><a href="#">Inventario</a></li>
                </ul>
            </nav>

            <div>
                <a><button class = "btnGanancias" id = "btnGanancias" data-bs-toggle="modal" data-bs-target="#modalGanancias">Ganancias</button></a>
                <a href = "../controlador/controlador_logout.php"><button class = "btn-logout"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                </svg></button>
                </a>
            </div>
        </header>

        <div class="container">
            <div class="row">
                <div class="divAdd col-4">
                    <div class="divBtnAdd">
                        <input type="button" value="+" class = "btn btn-success" id = "btnAddModal" data-bs-toggle="modal" data-bs-target="#modalProduct">
                        <label for="btnAddModal" class = "ms-3">Añadir nuevo producto</label>
                    </div>
                </div>

                <div class="col-3"></div>

                <div class="col-5">
                    <form method="post">
                        <input type="text" name="buscarProduct" id="buscarProduct" placeholder="Buscar producto" class = "form-control">
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <table class = "table table-dark table-striped table-hover">
                        <thead>
                            <th>Descripción</th>
                            <th>Precio compra</th>
                            <th>Precio venta</th>
                            <th>Ganancia</th>
                            <th>Fecha compra</th>
                            <th>Stock</th>
                            <th colspan="2">Opciones</th>
                        </thead>
                        <tbody id ="tableProduct">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL AÑADIR PRODUCTO -->

        <div class="modal fade" id="modalProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalProductLabel">Añadir producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="divFormAddProduct">
                            <form id = "addProductForm">
                                <div class="container">

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Descripción</span>
                                            <input type="text" class = "form-control" name = "descProduct" required autocomplete="off">
                                        </div>

                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Cantidad</span>
                                            <input type="number" class = "form-control" name = "cantProduct" required autocomplete="off">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Precio de compra</span>
                                            <span class = "input-group-text" id = "basic-addon1">$</span>
                                            <input type="number" class = "form-control" name = "precProduct" required autocomplete="off">
                                        </div>

                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Precio de venta</span>
                                            <span class = "input-group-text" id = "basic-addon1">$</span>
                                            <input type="text" class = "form-control" name = "precioVenta" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Fecha compra</span>
                                            <input type="date" class = "form-control" name = "fechaCompra" required autocomplete="off">
                                        </div>

                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Stock</span>
                                            <input type="number" class = "form-control" required disabled autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="divBtnSave row">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-success" value = "Agregar" id = "btnSaveProduct">
                                        </div>
                                        <div class="col-8" id = "divResultAddProduct">

                                        </div>
                                    </div>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- MODAL EDITAR PRODUCTO -->

        <div class="modal fade" id="modalEditProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalProductLabel">Editar producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="divFormEditProduct">
                            <form id = "editProductForm">
                                <div class="container">

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Descripción</span>
                                            <input type="text" class = "form-control" name = "descEditProduct" id = "descEditProduct" required autocomplete="off">
                                            <input type="number" class = "form-control" name = "idEditProduct" id = "idEditProduct"  required autocomplete="off" hidden>
                                        </div>

                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Stock</span>
                                            <input type="number" class = "form-control" name = "cantEditProduct" id = "cantEditProduct" required autocomplete="off">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Precio de compra</span>
                                            <span class = "input-group-text" id = "basic-addon1">$</span>
                                            <input type="number" class = "form-control" name = "precEditProduct" id = "precEditProduct" required autocomplete="off">
                                        </div>

                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Precio de venta</span>
                                            <span class = "input-group-text" id = "basic-addon1">$</span>
                                            <input type="text" class = "form-control" name = "precioEditVenta" id = "precioEditVenta" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col input-group mb-3">
                                            <span class = "input-group-text" id = "basic-addon1">Fecha compra</span>
                                            <input type="date" class = "form-control" name = "fechaEditCompra" id = "fechaEditCompra" required autocomplete="off">
                                        </div>

                                    </div>

                                    <div class="divBtnSave row">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-success" value = "Editar" id = "btnSaveEditProduct">
                                        </div>
                                        <div class="col-8" id = "divResultEditProduct">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CONSULTAR GANANCIAS -->

        <?php include '../Plantillas/modales.php' ?>;
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../js/ganancias.js"></script>
        <script src="../js/js-addProduct.js"></script>
    </body>

</html>