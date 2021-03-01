<?php
	session_start();
	if( !$_SESSION["validar"] ){

		header("location:ingresar");
		exit();
	}
?><h1>USUARIOS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
		<?php
			$mvc = new MvcController();
			$mvc -> ListarUsuariosController();
			$mvc -> ElminarUsuarioController();
		?>

		</tbody>



	</table>
<?php
if(isset($_GET["action"])){
	if($_GET["action"] == 'actualizacion'){
		echo "Actualización Exitosa";
	}
}

