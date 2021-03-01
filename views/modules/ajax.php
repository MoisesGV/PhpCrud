<?php

require_once('../../controllers/controller.php');
require_once('../../models/crud.php');

class Ajax {

    public $validarUsuario;
    public $validarEmail;

    function ValidarUsuarioAjax(){

        $datos = $this->validarUsuario;
        $respuesta = MvcController::ValidarUsuarioController($datos);
        //echo $datos;
    }

    function ValidarEmailAjax(){

        $datos = $this->validarEmail;
        $respuesta = MvcController::ValidarEmailController($datos);
        //echo $datos;
    }
}
if(isset( $_POST['validarUsuario']) ){

$nombreUsuario = new Ajax();
$nombreUsuario -> validarUsuario = $_POST['validarUsuario'];
$nombreUsuario -> ValidarUsuarioAjax();
}

if(isset( $_POST['validarEmail']) ){
$nombreUsuario = new Ajax();
$nombreUsuario -> validarEmail = $_POST['validarEmail'];
$nombreUsuario -> ValidarEmailAjax();
}