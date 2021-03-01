<?php
	session_start();
	if( !$_SESSION["validar"] ){

		header("location:ingresar");
		exit();
	}
?>
<h1>EDITAR USUARIO</h1>

<form method="post">

	<?php 
		$editar = new MvcController();
		$editar->EditarUsuarioController();
		$editar->ActualizarUsuarioController();
	?>
	<input type="submit" value="Editar">

</form>

