<?php
session_start();
ob_start();
if ($_SESSION['session_exito'] != 1) {
    //require 'index.php';
    header('Location:../index.php');
} else {
    include_once '../plantillas/InicioDocumento.inc.php';
    ?>
    <body onload="VistaEntrada();">
<?php include_once '../plantillas/BarraNavegacion.inc.php';
}
?>
<div class="contenedor container-fluid" id="pantallaR">
        <center>
            <h4 id="tabE"><br>Registro de entrada (Xalapa Ver, <?=$fechaActual;?>)</h4><br>
                </center>
 <div class="row">
    <div class="col-md-2">
        </div>
    <div class="col-md-8" >
        <div id="marcoRegistro">
        <form method="POST" action="#" id="formEntrada" enctype="multipart/form-data">
            <div class="form-row">
                    <div class="col-md-3 mb-2">
                        <label for="cod">Código</label>
                        <input type="text" name="cod" required="required" class="form-control" id="cod">
                    </div>
                      <input type="hidden" id="vigilante" name="vigilante"  value='<?=$user?>'>
                    <div class="col-md-5 mb-2">
                          <label for="nombre">Nombre del visitante</label>
                         <input type="text" name="nombre" required="" class="form-control" id="nombre">
                     </div>
                    <div id="content" class="col-md-4" style="display: none;">
                         <div class="form-row">
                            <div class="col-md-6">
                                 <label for="placas">Placas</label>
                                 <input type="text" name="placas"  class="form-control" id="placas"> 
                             </div> 
                             <div class="col-md-6">
                                  <label for="vehiculo">Vehículo</label>
                                  <input type="text" name="vehiculo"  class="form-control" id="vehiculo">
                              </div>
                           </div>
                        </div>
                      </div>
            <div class="form-row">   
                 <div class="col-md-5">
                     <label for="nombre_referencia">Persona a visitar</label>
                     <input type="text" name="nombre_referencia" class="form-control" id="nombre_referencia">
                 </div>
                <div class="col-md-4 mb-3">
                    <label for="select1" >Calle</label><br>
                         <select id="select1" name="select1" class="form-control" onchange="populate(this.id,'select2')">
                            <option value="Calle"> Calle</option>
                            <option value="Asturia"> Asturia</option>
                            <option value="Avila"> Avila</option>
                            <option value="CadizDerecha"> CadizDerecha</option>
                            <option value="Cordoba"> Cordoba</option>
                            <option value="EspañaEntrada"> EspañaEntrada</option>
                            <option value="EspañaSalida"> EspañaSalida</option>
                            <option value="Galicia"> Galicia</option>
                            <option value="Granada"> Granada</option>
                            <option value="Ibiza"> Ibiza</option>
                            <option value="Jerez"> Jerez</option>
                            <option value="Mallorca"> Mallorca</option>
                            <option value="Marbella"> Marbella</option>
                            <option value="SantanderDerecha"> SantanderDerecha</option>
                            <option value="SantanderIzquierda"> SantanderIzquierda</option>
                            <option value="Toledo"> Toledo</option>
                            <option value="Valencia"> Valencia</option>
                        </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="select1" >Número</label><br>
                    <select id="select2" class="form-control" name="select2">
                        <option value="" >Numero</option>
                    </select>
                </div>
            </div>  
            
            <div class="form-row">
                 <div class="col-md-6 mb-3">
                    <label for="motivo">Motivo de visita</label>
                    <input type="text" name="motivo" class="form-control" id="motivo" placeholder="Visita">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="observacion">Observaciones</label>
                    <input type="text" name="observacion" class="form-control" id="observacion">
                 </div>
            </div>
               <div class="form-group">
              <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" /><b>Acceso en vehículo</b>
                </div>
         <div class="form-row">
            <div class="col-md-4 mb-3">
                 <label for="imagen_credencial">Captura de credencial</label>
                 <input type="file" class="form-control-file"  id="imagen_credencial" name="imagen_credencial">
            </div>
            <div class="col-md-4 mb-3">
                 <label for="imagen_rostro">Captura de rostro</label>
                 <input type="file" class="form-control-file"  id="imagen_rostro" name="imagen_rostro">
            </div>
            <div class="col-md-4 mb-3">
                        <label for="ImgCoche">Captura de vehículo</label>
                        <input type="file" class="form-control-file" id="ImgCoche" name="ImgCoche">
                    </div>
        </div>
                <center>
                    <br><input type="submit" value="Guardar" class="btn btn-success" name="btn1"><br>
                </center>

        </form>
    </div>
</div>

<div class="col-md-2" >
<!--
<div class="row">
<div class="col-md-12" >
<embed width="100%" height="100%" src="https://youtube.com/v/s3sQMUGIE94">
</div>
    </div><br>
    <div class="row">
<div class="col-md-12" >
<embed width="100%" height="100%"  src="https://youtube.com/v/2DwfeMnCWHs"> 
</div>
    </div><br>
    <div class="row" ">
<div class="col-md-12">
<embed width="100%" height="100%" src="https://www.youtube.com/v/tgbNymZ7vqY">
    </div>
    </div>
    --->
</div>
</div>
<script type="text/javascript" src="../Js/registro.js"></script>
<script type="text/javascript" src="../Js/entrada.js"></script>
