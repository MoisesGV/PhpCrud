<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return ValidarRegistro()">
	
	<label for="usuario">Usuario <span></span></label>
	<input type="text" placeholder="Usuario" name="usuario" id="usuario" maxlength="20" required>

	<label for="password">Contraseña</label>
	<input type="password" placeholder="Contraseña" name="password" id="password" minlength="6" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%&?.]).{6,}" required>
	
	<label for="email">Email <span></span></label>
	<input type="email" placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

	<input type="submit" value="Enviar">

</form>
<?php
$registro = new MvcController();
$registro->registroUsuarioController();

if(isset($_GET['action'])){
	if($_GET['action']=='ok'){
		echo 'Registro exitoso';
	}
	else if($_GET['action'] == 'errorR'){
		echo 'Error en el registro';
	}
}
?>