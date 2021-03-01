<?php
require_once('models/conexion.php');

class Crud extends Conexion{
    
    #REGISTRO USUARIOS
    #---------------------------------------------

    function RegistroUsuarioModel($datos, $tabla){

        $stmt = Conexion::Conectar()->prepare("INSERT INTO $tabla(nombre, clave, email) VALUES (:usuario, :password, :email)");
        $stmt->bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos["email"], PDO::PARAM_STR);
        
        if( $stmt->execute() ){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
    }

    #INGRESO USUARIOS
    #---------------------------------------------

    function IngresoUsuarioModel($datos, $tabla){
        $stmt = Conexion::Conectar()->prepare("SELECT nombre, clave, intentos FROM $tabla WHERE nombre = :nombre AND clave = :clave");
        $stmt->bindParam(":nombre", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos["password"], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    #REGISTRO USUARIOS
    #---------------------------------------------

    function ListarUsuariosModel($tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT id, nombre, clave, email FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }

    #EDITAR USUARIOS
    #---------------------------------------------

    function EditarUsuarioModel($idEditar, $tabla){

        $stmt = Conexion::Conectar()->prepare("SELECT id, nombre, clave, email FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $idEditar, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();
    }

    #ACTUALIZAR USUARIOS
    #---------------------------------------------

    function ActualizarUsuarioModel($datos, $tabla){

        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nombre = :nombre, clave = :clave, email = :email WHERE id = :id");
        $stmt->bindParam(":nombre", $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos['id'], PDO::PARAM_STR);

        if( $stmt->execute() ){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
    }

    #ELIMINAR USUARIOS
    #---------------------------------------------

    function  ElminarUsuarioModel($datos, $tabla){
        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if( $stmt->execute() ){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();

    }

    #INTENTOS USUARIOS
    #---------------------------------------------

    function IntentosUsuarioModel($datos, $tabla){
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE nombre = :nombre");
        $stmt->bindParam(":intentos", $datos['actualizarIntentos'], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos['usuarioActual'], PDO::PARAM_STR);

        if( $stmt->execute() ){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
    }
            
}
