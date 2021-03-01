<?php 

class Conexion{

    function Conectar(){
        $link = new PDO("mysql:host=localhost;dbname=pdocrud","root","");
        return $link;
    }

}
