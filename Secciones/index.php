<?php
  session_start();
  $varSession = $_SESSION['nombre'];
  
  if($varSession == null || $varSession == ''){
    header("location: ../index.php");
    die();
  }

  include '../configuraciones/monthString.php';
  $mesActual = MonthString::convertMonth(date('m'));
  $anioActual = date('Y');
?>

<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>Nuevas Páginas</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" href="../img/logo.png">
      <link rel="stylesheet" href="../css/css-header.css?0.1">
      <link rel="stylesheet" href="../css/css-index.css?0.1">
      <link rel="stylesheet" href="../css/css-modales.css?0.1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
  </head>

  <body>
    <header>
      <a href="#" class = "a__logo">
        <img src="../img/logo.png" class = "logo" alt="Logo" width="15%">
        <h1 class = "logo colorWhite">NUEVAS PÁGINAS</h1>
      </a>

      <nav>
        <ul class = "nav_links">
          <li class = "selected"><a href="#">Inicio</a></li>
          <li><a href="inventario.php">Inventario</a></li>
        </ul>
      </nav>
      
      <div>
        <a><button class = "btnGanancias" id = "btnGananciasInicio" data-bs-toggle="modal" data-bs-target="#modalGanancias">Ganancias</button></a>
        <a href = "../controlador/controlador_logout.php"><button class = "btn-logout"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M7 12h14l-3 -3m0 6l3 -3" />
          </svg></button>
        </a>
      </div>

    </header>

    <div class="boxDashboard">
      <div class="dailySales">
        <div>
          <h6 class = "colorWhite gananciasTitle">Ganancias de hoy</h6>
        </div>

        <div id="dailySales">

        </div>
      </div>
      
      <div class="monthlySales">
        <div>
          <h6 class = "colorWhite gananciasTitle">Ganancias <?php echo $mesActual ?></h6>
        </div>

        <div id="monthlySales">

        </div>
      </div>

      <div class="yearlySales">
        <div>
          <h6 class = "colorWhite gananciasTitle">Ganancias del <?php echo $anioActual; ?></h6>
        </div>
        
        <div id="yearlySales">

        </div>
      </div>

    </div>

    <!-- REGISTRO DE VENTAS -->
  
    <div class="container">
      <div class="row containerVentas">
        <div class="col-5">
          <div class="divTituloVentas">
              <h4 class = "colorWhite">Registrar venta</h4>
          </div>

          <div class = "divFormVentas">
            <form style = "width: 100%;" id = "formVentas" method="POST">
              <div class="container">
                <div class="row">
                  <div class="col input-group mb-3 divProductoVenta" >
                      <span class = "input-group-text" id = "basic-addon1" style = "background-color:darkgreen; color:white;">Producto</span>
                      <input type="text" class = "form-control" name = "productoVenta" id = "productoVenta" required autocomplete="off">
                      <ul id = "listaProductos"></ul>
                      <input class = "form-control" name = "idProduct" id = "idProduct" required hidden>
                  </div>
                </div>

                <div class="row div_stock_cant">
                  <div class="col input-group mb-3">
                      <span class = "input-group-text calcStockFinal" id = "basic-addon1" style = "background-color:midnightblue; color:white;">Cantidad</span>
                      <input type="number" class = "form-control" name = "cantidad" id = "cantidad" required autocomplete="off">
                  </div>

                  <div class="col input-group mb-3">
                      <span class = "input-group-text calcStockFinal" id = "basic-addon1" style = "background-color:brown; color:white;">Stock</span>
                      <input type="number" class = "form-control" name = "stock" id = "stock" required autocomplete="off" readonly>
                      <input type="number" class = "form-control" name = "stockCalc" id = "stockCalc" autocomplete="off" readonly hidden>
                  </div>
                </div>

                <div class="row div_price_desc">
                  <div class="col input-group mb-3">
                      <span class = "input-group-text" id = "basic-addon1">Unidad  $</span>
                      <input type="number" class = "form-control" name = "precioU" id = "precioU" autocomplete="off">
                      <input type="number" class = "form-control" name = "precioCompra" id = "precioCompra" autocomplete="off" readonly hidden>
                      <input type="number" class = "form-control" name = "precioUGasto" id = "precioUGasto" autocomplete="off" readonly hidden>
                      <input type="number" class = "form-control" name = "ganancia" id = "ganancia" autocomplete="off" readonly hidden>
                  </div>

                  <div class="col">
                    <div class="form-check form-switch mt-2 checkDescuento" id = "divCheckDescuento">
                      <input class="form-check-input" type="checkbox" id="activeDescuento" onchange="readOnlyPrecio()">
                      <label class="form-check-label colorWhite" for="activeDescuento">Aplicar descuento</label>
                    </div>
                  </div>
                </div>
              
                <div class="row">
                  <div class="col input-group mb-3">
                      <span class = "input-group-text" id = "basic-addon1">Total  $</span>
                      <input type="number" class = "form-control" name = "precioTotal" id = "precioTotal" autocomplete="off" readonly value = "">
                  </div>
                </div>
                <div class="row">
                  <div class="col input-group mb-3">
                        <span class = "input-group-text" id = "basic-addon1">Fecha</span>
                        <input type="date" class = "form-control" name = "fechaVenta" id = "fechaVenta" value = "" required>
                    </div>
                </div>

                <div class="row divBtnAgregar">
                  <input class = "btn btn-warning" type="submit" value = "+ AGREGAR">
                  <div id = "resultadoVentaTmp" hidden>

                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- MUESTRA DE VENTA ACTUAL -->

        <div class="col-7 divCompraActual">
          
          <div class="divTituloTablaVentas">
              <h4 class = "colorWhite">Compra actual</h4>
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
              </svg>
          </div>
          <div style = "width:100%;" class = "divTableVentasTmp">
            <div class="box overflow-auto bg-body" style = "height: 260px; text-align: center;">
              <table class = "table tableVentasTmp" data-bs-spy="scroll">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id = "dataCompra">

                </tbody>
              </table>
              
            </div>
            <div class="divTotal mt-3 container mb-3">
              <div class = "row">
                <div class="col-auto" id = "ventaEliminada" hidden>
                  
                </div>

                <div class="col-auto" id = "totalCompra" name = "totalCompra">

                </div>

              </div>
                
            </div>
          </div>
        </div>
      </div>

      <!-- TABLA DE TODAS LAS VENTAS -->

      <div class="row">
        <div class="col">
          <div class="container">
            <div class="row mt-3 mb-3">
              <div class="col-3">
                <div id="ventaTotalEliminada" hidden></div>

              </div>
              <div class="col-1">
                <label for="buscarVenta">Buscar: </label>
              </div>
              <div class="col-4">
                <form action="" method="post">
                  <input class = "form-control" type="text" value = "" id = "buscarVenta" name = "buscarVenta">
                </form>
              </div>
            </div>
          </div>

          <div class="divTituloTotalVentas">
            <h3 class = "colorWhite">REGISTRO TOTAL DE VENTAS</h3>
          </div>

          <div class="box overflow-auto bg-body mb-5" style = "height:600px; text-align: center;">
              <table class = "table tableVentasTotales" data-bs-spy="scroll">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Precio total</th>
                    <th>Ganancia</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody id = "dataVentasTotal">

                </tbody>
              </table>
              
            </div>
        </div>
      </div>

    </div>

    <?php
      include '../configuraciones/ventas/cerrarVenta.php';
    ?>

    <!-- MODAL CONFIRMACIÓN ELIMINAR PRODUCTO VENTA TEMP -->

    <div class="modal fade" id="modalDelVenTemp" tabindex="-1" aria-labelledby="modalDelVenTempLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalDelVenTempLabel">¿Eliminar producto del carro de compras?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
            <form method = "post" id = "idVentaForm">
              <input type = "number" value = "" id = "idVentaInput" name = "idVentaInput" hidden>
              <input type = "number" value = "" id = "idProductInput" name = "idProductInput" hidden>
              <input type = "number" value = "" id = "stockIniInput" name = "stockIniInput" hidden>
              <input type = "submit" class = "btn btn-danger" id = "deleteProductTmp" data-bs-dismiss="modal" value = "SI">
            </form>
          </div>

        </div>
      </div>
    </div>

    <!-- MODAL CONFIRMACIÓN ELIMINAR PRODUCTO VENTA TOTAL -->

    <div class="modal fade" id="modalDelVentTotal" tabindex="-1" aria-labelledby="modalDelVentTotalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-footer contentCenter">
            <div>
              <h5 class="modal-title" id="modalDelVentTotalLabel">¿Eliminar producto del registro de ventas?</h5>
            </div>
            <div class = "contentCenter">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
              <form method = "post" id = "idVentaTotalForm">
                <input type = "number" value = "" id = "idVentaTotal" name = "idVentaTotal" hidden>
                <input type = "number" value = "" id = "idProductTotal" name = "idProductTotal" hidden>
                <input type = "number" value = "" id = "stockIniInputTotal" name = "stockIniInputTotal" hidden>
                <input type = "submit" class = "btn btn-danger" id = "deleteProductTotal" data-bs-dismiss="modal" value = "SI">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL CONSULTAR GANANCIAS -->

    <?php include '../Plantillas/modales.php' ?>;

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/evitar_reenvio.js"></script>
    <script src="../js/js-ventas.js"></script>
    <script src="../js/ganancias.js"></script>
  </body>
</html>