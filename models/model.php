<?php

class MvcModel{

    function enlacesPaginasModel($enlace){

        if( $enlace == 'editar' || 
            $enlace == 'ingresar' || 
            $enlace=='usuarios' || 
            $enlace=='salir' ){

            $module = 'views/modules/'.$enlace . '.php';
        }
        else if($enlace=='index'){
            $module = 'views/modules/registro.php';
        }
        else if($enlace=='ok'){
            $module = 'views/modules/registro.php';
        }
        else if($enlace=='fallo'){
            $module = 'views/modules/ingresar.php';
        }
        else if($enlace=='actualizacion'){
            $module = 'views/modules/usuarios.php';
        }
        else if($enlace=='errorR'){
            $module = 'views/modules/registro.php';
        }
        
        
        else{
            $module = 'views/modules/registro.php'; 
        }
        return $module;
    }
}