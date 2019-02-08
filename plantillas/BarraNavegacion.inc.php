<?php
$user = $_SESSION['nombre'];
$tipo = $_SESSION['tipo'];
?>
<nav class="navbar navbar-default navbar-static-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Este botón despliega la barra de navegación</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				  <a class="navbar-brand" href="#">REAL DEL BOSQUE</a>
				</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a class="navbar-r" href="registro.php">RegistroDeEntrada</a></li>
					<li><a class="navbar-r" href="consulta.php">RegistroDeSalida</a></li>
					<li><a  class="navbar-r" href="visitas.php">Visitantes</a></li>
					<li><a  class="navbar-r" href="bitacora.php">Bitacora</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a class="navbar-r" href="registro_user.php">Usuario: <?=$user;?></a></li>
					<li><a class="navbar-r" href="../index.php">Salir</a></li>
				</ul>

			</div>
		</div>
	</nav>
