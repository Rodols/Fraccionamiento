<?php
$codigo_entrada = trim($_POST['cod']);
if (isset($codigo_entrada)) {
    if ($codigo_entrada != "") {
        include_once "abrir_conexion.php";
        $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE codigo = $codigo_entrada");
        while ($consulta = mysqli_fetch_array($resultados)) {
					echo "	
					<div id=\"marcoConsulta\">
            	   <form method=\"POST\" id=\"formDarSalida\" class=\"text-align-center\"  action=\"#\">
						<div class=\"form-row\">
							<div class=\"col-md-3 mb-3\">
								<label for=\"codigo\">Codigo</label>
								<input type=\"text\" name=\"codigo\" value='$consulta[0]' readonly=\"readonly\" class=\"form-control \" id=\"codigo\">
							</div>
							<div class=\"col-md-3 mb-3\">
								<label for=\"operario\">Usuario</label>
								<input type=\"text\" name=\"operario\" value='$consulta[1]' readonly=\"readonly\" class=\"form-control\" id=\"operario\">
							</div>

							<div class=\"col-md-3 mb-3\">
								<label for=\"fecha\">Fecha</label>
								<input type=\"text\" name=\"fecha\" value='$consulta[2]' readonly=\"readonly\" class=\"form-control\" id=\"fecha\">
							</div>
							<div class=\"col-md-3 mb-3\">
								<label for=\"entrada\">Entrada</label>
								<input type=\"text\" name=\"entrada\" value='$consulta[3]' readonly=\"readonly\" class=\"form-control\" id=\"entrada\">
							</div>
						</div>
						<div class=\"form-row\">
							<div class=\"col-md-6 mb-3\">
								<label for=\"nombre\">Nombre visitante</label>
								<input type=\"text\" name=\"nombre\" value='$consulta[4]' readonly=\"readonly\" class=\"form-control\" id=\"nombre\">
							</div> 
							<div class=\"col-md-6 mb-3\">
							<label for=\"motivo\">Motivo de visita</label>
							<input type=\"text\" name=\"motivo\" value='$consulta[10]' readonly=\"readonly\" class=\"form-control\" id=\"motivo\">
						</div>";
								if ($consulta[8] != "") {
								echo "
								<div class=\"form-row\">
							<div class=\"col-md-3 mb-3\">
								<label for=\"placas\">Placas</label>
								<input type=\"text\" name=\"placas\" value='$consulta[8]' readonly=\"readonly\" class=\"form-control\" id=\"placas\">
							</div>
							<div class=\"col-md-3 mb-3\">
							<label for=\"vehiculo\">Vehiculo</label>
							<input type=\"text\" name=\"vehiculo\" value='$consulta[9]' readonly=\"readonly\" class=\"form-control\" id=\"vehiculo\">
						</div>
						</div>
							";
						} 
						?>
						<?php
						echo "
						</div>
						<div class=\"form-row\">
							<div class=\"col-md-5 mb-3\">
								<label for=\"calle\">Calle</label>
								<input type=\"text\" name=\"calle\" value='$consulta[6]' readonly=\"readonly\" class=\"form-control\" id=\"calle\" size=\"31\">
							</div>
							<div class=\"col-md-2 mb-3\" >
								<label for=\"numero\">Numero</label>
								<input type=\"text\" name=\"numero\" value='$consulta[7]' readonly=\"readonly\" class=\"form-control\" id=\"numero\" size=\"8\">
							</div>
							<div class=\"col-md-5 mb-3\">
								<label for=\"referencia\">¿A quien visita?</label>
								<input type=\"text\" name=\"referencia\" value='$consulta[5]' readonly=\"readonly\" class=\"form-control\" id=\"referencia\">
							</div> 
						</div>
						<div class=\"form-row\">					
							<div class=\"col-md-6 mb-3\">
								<label for=\"obentrada\">Observaciones Entrada</label>
								<input type=\"text\" readonly=\"readonly\" name=\"obentrada\" value='$consulta[11]' class=\"form-control\" id=\"obentrada\">
							</div>
							<div class=\"col-md-6 mb-3\">
							<label for=\"observacionsalida\">Observaciones Salida</label>
							<input type=\"text\" name=\"obsalida\" class=\"form-control\" id=\"obsalida\">
						</div>
						</div>
						<div class=\"btn-group btn-group-toggle\" data-toggle=\"buttons\">
						<label class=\"mr-4\">  Semaforo de alerta: </label>
									<label class=\"btn btn-secondary active\" id=\"alertagreen\" > 
									<input  type=\"radio\" value=\"green\" name=\"alerta\" checked> Verde 
									</label>
									<label class=\"btn btn-secondary\" id=\"alertayellow\" >
									<input type=\"radio\" value=\"yellow\"  name=\"alerta\"  > Amarillo
									</label>	
									<label class=\"btn btn-secondary\" id=\"alertared\">   
									<input type=\"radio\" value=\"red\"  name=\"alerta\"  > Rojo
									</label>
						</div>		
						<div class=\"form-row mt-2\">
							<div class=\"col-md-4 mb-3\">
								<label for=\"foto_c\">Foto-Rostro</label><br>
								<input type=\"text\" readonly=\"readonly\" name=\"foto_r\" value='$consulta[12]' class=\"form-control\" >
								<img src='$consulta[12]'  width=\"400\" heigth=\"600\" name=\"foto_r\" />
							</div>
							<div class=\"col-md-4 mb-3\">
								<label for=\"foto_r\">Foto-Credencial</label><br>
								<input type=\"text\" readonly=\"readonly\" name=\"foto_c\" value='$consulta[13]' class=\"form-control\" >
								<img src='$consulta[13]'  width=\"400\" heigth=\"600\" name=\"foto_c\" />
							</div>
							<div class=\"col-md-4 mb-3\">
								<label for=\"foto_v\">Foto-Vehiculo</label><br>
								<input type=\"text\" readonly=\"readonly\" name=\"foto_v\" value='$consulta[14]' class=\"form-control\" >
								<img src='$consulta[14]'  width=\"400\" heigth=\"600\" name=\"foto_v\" />
							</div>
						</div>
						<center>
		 					<br><input type=\"submit\" value=\"Salida\" class=\"btn btn-danger\" onclick=\"DarSalida();\" name=\"btnSalida\">
		 				</center>
				    </form>
			</div>	
			</div>
							";
            } 

	 include_once "cerrar_conexion.php";		
            }
   
}
?>
