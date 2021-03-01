<h1>INGRESAR</h1>

	<form method="post" onsubmit="return ValidarIngreso()">
		<span id="usuario"></span>
		<input type="text" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso" maxlength="20" required>
		<span id="password"></span>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%&?.]).{6,}" required>

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
