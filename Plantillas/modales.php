
    <!-- MODAL CONSULTAR GANANCIAS -->
    <div class="modal fade" id="modalGanancias" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Consultar ganancias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" id = "formGanancias">
                  <div class = "divTitleFechas">
                    <h6 class = "colorWhite">Consultar fecha personalizada</h6>
                  </div>
                  <div class="divFechas">
                    
                    <div class="divFechaini mt-2">
                      <label class = "colorWhite" for="fechaIniGan">Fecha inicial</label>
                      <input type="date" id = "fechaIniGan" name = "fechaIniGan" class = "form-control" value = "">
                    </div>

                    <div class="divFechaFin mt-2">
                      <label class = "colorWhite" for="fechaFinGan">Fecha final</label>
                      <input type="date" id = "fechaFinGan" name = "fechaFinGan" class = "form-control" value = "">
                    </div>

                    <div class="divBtnConsult contentCenter">
                        <input type="submit" value = "Consultar" name = "consultGanancias" id = "consultGanancias" class = "btn btn-sm btn-danger">
                    </div>

                    <div class="divBtnConsult contentCenter">
                        <input type="reset" value = "Limpiar" name = "limpiarGanancias" id = "limpiarGanancias" class = "btn btn-sm btn-info">
                    </div>

                  </div>
                  <div class="divResultGanancias" id = "resultGanancias">

                  </div>
                </form>

                <div class="containerTableGanancias">
                  <div class="divTableGanancias" id = "resTableGanancias">
                    <table class = "tableGanancias">
                      <h6>Registro de ganancias por mes</h6>
                      <tr>
                        <th>Mes</th>
                        <th>Ganancia total</th>
                        <th>Producto mas vendido</th>
                        <th>Cantidad</th>
                      </tr>

                      <tbody id = "contentGanancia">

                      </tbody>

                    </table>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>