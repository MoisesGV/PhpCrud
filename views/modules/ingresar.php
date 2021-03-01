<h1>INGRESAR</h1>

	<form method="post" action="">
		
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" value="Enviar">

	</form>
<?php

$mvc = new MvcController();
$mvc->IngresoUsuarioController();

if(isset($_GET['action'])){
	if($_GET['action']=='fallo'){
		echo 'Fallo al ingresar';
	}
}
