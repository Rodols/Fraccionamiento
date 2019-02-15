<?php
$user = $_SESSION['nombre'];
$tipo = $_SESSION['tipo'];
?>
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    				<a class="navbar-brand navbar-r" href="#">RealDelBosque</a>
    			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li><a  href="registro_user.php" class=" btn btn-outline-success  ">
						<i class="material-icons">&#xe55a;</i> <span> <?=$user?></span></a>
					</li>   
					<li class="nav-item active"><a  href="registro.php" class="nav-link navbar-r btn btn-outline">
						 <i class="material-icons">&#xe85d;</i> <span> RegistroDeEntrada</span></a>
      				 </li>
      				<li class="nav-item active"><a class="nav-link navbar-r btn btn-outline " href="consulta.php">
						  <i class="material-icons">&#xe862;</i><span>RegistroDeSalida</span></a>
     				 </li>
					<li class="nav-item active"><a  href="visitas.php" class="nav-link navbar-r btn btn-outline">
						 <i class="material-icons">&#xe2c9;</i> <span> Visitantes</span></a>
      				 </li>
      				<li class="nav-item active"><a class="nav-link navbar-r btn btn-outline " href="bitacora.php">
						  <i class="material-icons">&#xe0e0;</i><span>Bitacora</span></a>
					   </li>
				 </ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="navbar-r" href="../index.php">Salir</a></li>
				</ul>
			</div>
		</nav>
    </div>