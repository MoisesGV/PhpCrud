<?php

class MvcController{
    
    #LLAMAR A LA PLANTILLA
    #---------------------------------------------

    function plantilla(){

        include "views/template.php";

    }

    #INTERACCION CON EL USUARIO
    #---------------------------------------------

    function enlacesPaginasController(){

        if( isset( $_GET["action"] ) ){

            $enlaceController = $_GET["action"];

        }
        else{
            $enlaceController= 'ingreso';
        }
        
        $respuesta = MvcModel::enlacesPaginasModel( $enlaceController );
        
        include($respuesta);
    
    }

    #REGISTRO USUARIOS
    #---------------------------------------------

    function registroUsuarioController(){
        
        if( isset($_POST["usuario"]) ){

            //preg_match: compara un string con una expresion regular

            if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
                preg_match('/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/', $_POST["password"])  &&
                preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/', $_POST["email"])){
                
                //ENCRIPTAR CONTRASEÑA
                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datosController = array( "usuario" => $_POST["usuario"],
                                "password" => $encriptar, //$_POST["password"], 
                                "email" => $_POST["email"]);

                $respuesta = Crud::RegistroUsuarioModel($datosController, "usuarios");
                
                if($respuesta == 'success'){
                    //header("location:index.php?action=ok");
                    header("location:ok");
                }
                else{
                    header("location:index.php");
                }
            }
            else{
                //header("location:index.php?action=errorR");
                header("location:errorR");
            }
        }
    }

    #INGRESO USUARIOS
    #---------------------------------------------

    function IngresoUsuarioController(){
        
        if( isset($_POST["usuarioIngreso"]) ){

            if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
                preg_match('/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/', $_POST["passwordIngreso"])){
                
                //ENCRIPTAR CONTRASEÑA
                $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');    

                $datosController = array( "usuario" => $_POST["usuarioIngreso"],
                                        "password" =>  $encriptar);// $encriptar);
        
                $respuesta = Crud::IngresoUsuarioModel($datosController, "usuarios");
                
                $intentos = $respuesta["intentos"];
                
                //var_dump($intentos);$maxIntentos = 3;
                
                //if($intentos < $maxIntentos){
                
                    if( $respuesta["nombre"] == $_POST["usuarioIngreso"] || $respuesta["clave"] == $encriptar ){

                        session_start();
                        $_SESSION["validar"] = true;
                        
                        //header("location:index.php?action=usuarios");
                        header("location:usuarios");
                    }
                    else{
                        //Aumenta el valor de $intentos en 1 
                        //$intentos=$intentos + 1;
                        //$datosIntentos = array(' usuarioActual'      => $usuarioActual,
                        //                       'actualizarIntentos' => $intentos);
                        //$respuestaActIntentos = Crud::IntentosUsuarioModel($datosIntentos, "usuarios");
                        
                        //    var_dump( $respuestaActIntentos);
                        //header("location:index.php?action=fallo");
                        header("location:fallo");
                    }
                //}           
            }
            else{
                //header("location:index.php?action=fallo");
                header("location:fallo");
            }
        }
    }

    #LISTAR DE USUARIOS
    #---------------------------------------------

    function ListarUsuariosController(){
        
        $respuesta = Crud::ListarUsuariosModel("usuarios");
        
        foreach ($respuesta as $key => $value) {
            echo    '<tr>
				    <td>'.$value["nombre"].'</td>
				    <td>---------</td>
				    <td>'.$value["email"].'</td>
				    <td><a href="index.php?action=editar&id='.$value["id"].'"><button>Editar</button></a></td>
				    <td><a href="index.php?action=usuarios&idEliminar='.$value["id"].'"><button>Borrar</button></a></td>
			    </tr>';
        //<td>'.$value["clave"].'</td>
        }
        
    }

    #EDITAR USUARIOS
    #---------------------------------------------

    function EditarUsuarioController(){
        $idEditar = $_GET['id'];
        $respuesta = Crud::EditarUsuarioModel($idEditar, 'usuarios');

        echo '  <input type="hidden" value="'.$respuesta['id'].'" name="idEditar">
                <input type="text" value="'.$respuesta['nombre'].'" name="usuarioEditar" required>
                <input type="password" value="'.$respuesta['clave'].'" name="passwordEditar" required>
                <input type="email" value="'.$respuesta['email'].'" name="emailEditar" required> ';
    }

    #ACTUALIZAR USUARIOS
    #---------------------------------------------
    function ActualizarUsuarioController(){
        if(isset($_POST['usuarioEditar'])){

            if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"]) &&
                preg_match('/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/', $_POST["passwordEditar"])  &&
                preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/', $_POST["emailEditar"])){

            //ENCRIPTAR CONTRASEÑA
            $encriptar = crypt($_POST["passwordEditar"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');    

                $datos = array( "id"         => $_POST['idEditar'],
                                "usuario"    => $_POST['usuarioEditar'],
                                "clave"      => $encriptar, //$_POST['passwordEditar'],
                                "email"      => $_POST['emailEditar']);
                $respuesta = Crud::ActualizarUsuarioModel($datos, 'usuarios');
                
                
                if($respuesta == 'success'){
                    //header("location:index.php?action=actualizacion");
                    header("location:actualizacion");
                }
                else{
                    echo "error";
                }
            }
            else{
                echo "error";
            }

        }
    }

    #ACTUALIZAR USUARIOS
    #---------------------------------------------
    function ElminarUsuarioController(){
       if( isset( $_GET['idEliminar'] )){

           $idController = $_GET['idEliminar'];
           $respuesta = Crud::ElminarUsuarioModel($idController, 'usuarios');

           if($respuesta == 'success'){
            header("location:usuarios");
            //header("location:index.php?action=usuarios");
        }
        else{
            echo "error";
        }
        }
    }

}
