;
/*********************************************
VALIDAR EDITAR 
*********************************************/


function ValidarEditar(){

    let usuario = document.querySelector('#usuarioEditar').value
    let password = document.querySelector('#passwordEditar').value
    let email = document.querySelector('#emailEditar').value
    
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
            usuario = document.querySelector('#usuarioEditar').value = usuario
            password = document.querySelector('#passwordEditar').value = password
            email = document.querySelector('#emailEditar').value = email
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

            usuario = document.querySelector('#usuarioEditar').value = usuario
            password = document.querySelector('#passwordEditar').value = password
            email = document.querySelector('#emailEditar').value = email

            return false;
        }
        
    }

    if( email != '' ){

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;               
        
        if( !expresion.test(email) ){

            document.querySelector("#email").innerHTML = "<br>El email debe poseer un formato valido"

            usuario = document.querySelector('#usuarioEditar').value = usuario
            password = document.querySelector('#passwordEditar').value = password
            email = document.querySelector('#emailEditar').value = email

            return false;
        }
        
    }
    return true;

}