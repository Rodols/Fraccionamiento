<?php
if (isset($_POST['st'])) {
    $st_vigilante= $_POST['st'];
  echo "	 
       <div id=\"marcoConsulta\">
      <form method=\"POST\" action=\"#\" id=\"formSt\" enctype=\"multipart/form-data\">
          <div class=\"form-row\">
              <div class=\"col-md-4 mb-3\">
                  <label for=\"cod\">Código</label>
                  <input type=\"text\" name=\"cod\" required=\"required\" class=\"form-control\" id=\"cod\">
              </div>
              <input type=\"hidden\" id=\"vigilante\" name=\"vigilante\"  value='$st_vigilante'>
              <div class=\"col-md-8 mb-3\">
                  <label for=\"nombre\">Nombre del visitante</label>
                  <input type=\"text\" name=\"nombre\" required=\"\" class=\"form-control\" id=\"nombre\">
              </div>
          </div>
          <div class=\"form-row\">   
               <div class=\"col-md-6 mb-3\">
                   <label for=\"nombre_referencia\">Persona a visitar</label>
                   <input type=\"text\" name=\"nombre_referencia\" class=\"form-control\" id=\"nombre_referencia\">
               </div>

              <div class=\"col-md-4 mb-3\">
                  <label for=\"select1\" >Calle</label><br>
                       <select id=\"select1\" name=\"select1\" class=\"form-control\" onchange=\"populate(this.id,'select2')\">
                          <option value=\"Calle\"> Calle</option>
                          <option value=\"Asturia\"> Asturia</option>
                          <option value=\"Avila\"> Avila</option>
                          <option value=\"CadizDerecha\"> CadizDerecha</option>
                          <option value=\"Cordoba\"> Cordoba</option>
                          <option value=\"EspañaEntrada\"> EspañaEntrada</option>
                          <option value=\"EspañaSalida\"> EspañaSalida</option>
                          <option value=\"Galicia\"> Galicia</option>
                          <option value=\"Granada\"> Granada</option>
                          <option value=\"Ibiza\"> Ibiza</option>
                          <option value=\"Jerez\"> Jerez</option>
                          <option value=\"Mallorca\"> Mallorca</option>
                          <option value=\"Marbella\"> Marbella</option>
                          <option value=\"SantanderDerecha\"> SantanderDerecha</option>
                          <option value=\"SantanderIzquierda\"> SantanderIzquierda</option>
                          <option value=\"Toledo\"> Toledo</option>
                          <option value=\"Valencia\"> Valencia</option>
                      </select>
              </div>
              <div class=\"col-md-2 mb-3\">
                  <label for=\"select1\" >Número</label><br>
                  <select id=\"select2\" class=\"form-control\" name=\"select2\">
                      <option value=\"\" >Numero</option>
                  </select>
              </div>
          </div>  
          <div class=\"form-row\">
               <div class=\"col-md-6 mb-3\">
                  <label for=\"motivo\">Motivo de visita</label>
                  <input type=\"text\" name=\"motivo\" class=\"form-control\" id=\"motivo\" placeholder=\"Visita\">
              </div>
              <div class=\"col-md-6 mb-3\">
                  <label for=\"observacion\">Observaciones</label>
                  <input type=\"text\" name=\"observacion\" class=\"form-control\" id=\"observacion\">
               </div>
          </div>
             <div class=\"form-group\">
            <input type=\"checkbox\" name=\"check\" id=\"check\" value=\"1\" onchange=\"javascript:showContent()\" /><b>Acceso en vehículo</b>
              </div>
         <div id=\"content\" style=\"display: none;\">
              <div class=\"form-row\">
                  <div class=\"col-md-3 mb-3\">
                      <label for=\"placas\">Placas</label>
                      <input type=\"text\" name=\"placas\"  class=\"form-control\" id=\"placas\">
                   </div>
                   <div class=\"col-md-3 mb-3\">
                      <label for=\"vehiculo\">Vehículo</label>
                      <input type=\"text\" name=\"vehiculo\"  class=\"form-control\" id=\"vehiculo\">
                   </div>
                  <div class=\"col-md-6 mb-3\">
                      <label for=\"ImgCoche\">Captura de vehículo</label>
                      <input type=\"file\" class=\"form-control-file\" id=\"ImgCoche\" name=\"ImgCoche\">
                  </div>
              </div>
         </div>
       <div class=\"form-row\">
          <div class=\"col-md-6 mb-3\">
               <label for=\"imagen_credencial\">Captura de credencial</label>
               <input type=\"file\" class=\"form-control-file\"  id=\"imagen_credencial\" name=\"imagen_credencial\">
          </div>
          <div class=\"col-md-6 mb-3\">
               <label for=\"imagen_rostro\">Captura de rostro</label>
               <input type=\"file\" class=\"form-control-file\"  id=\"imagen_rostro\" name=\"imagen_rostro\">
          </div>
      </div>
              <center>
                  <br><input type=\"submit\" value=\"Guardar\" class=\"btn btn-success\" name=\"btn1\"><br>
              </center>
      </form>
  </div>
  <script src=\"../Js/salida.js\"></script>
                      ";
      }