;
/*********************************************
VALIDAR INGRESO 
*********************************************/

function ValidarIngreso(){

    let usuario = document.querySelector('#usuarioIngreso').value
    let password = document.querySelector('#passwordIngreso').value
    
    if( usuario != '' ){
        let caracteres = usuario.length
        console.log(usuario)
        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^[a-zA-Z0-9]*$/;

        if( caracteres > 20 ){

            document.querySelector("#usuario").innerHTML = "<br>El usuario solo puede poseer 20 caracteres."
            return false;
        }
        if( !expresion.test(usuario) ){

            document.querySelector("#usuario").innerHTML = "<br>No puede utilizar caracteres especiales ni espacios en blanco."
            usuario = document.querySelector('#usuarioIngreso').value = usuario
            password = document.querySelector('#passwordIngreso').value = password
            return false;
        }  
    }

    if( password != '' ){
        var caracteres = password.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/
                                 
        if( caracteres < 6 ){

            document.querySelector("#password").innerHTML = "<br>Debe utilizar un mínimo de 6 Carácteres."
            return false;
        }
        if( !expresion.test(password) ){

            document.querySelector("#password").innerHTML = "<br>La contraseña debe contener al menos 1 Mayúscula un signo y letras minusculas"

            usuario = document.querySelector('#usuarioIngreso').value = usuario
            password = document.querySelector('#passwordIngreso').value = password

            return false;
        }
        
    }

    return true;
}