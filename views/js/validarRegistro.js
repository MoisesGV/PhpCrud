;
function ValidarRegistro(){

    let usuario = document.querySelector('#usuario').value
    let password = document.querySelector('#password').value
    let email = document.querySelector('#email').value
    
    if( usuario != '' ){
        var caracteres = usuario.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        expresion = /^[a-zA-Z0-9]*$/;

        if( caracteres > 20 ){

            document.querySelector("label[for='usuario']").innerHTML += "<br>Puede utilizar solo 20 caracteres."
            
            return false;
        }
        if( !expresion.test(usuario) ){

            document.querySelector("label[for='usuario']").innerHTML += "<br>No puede utilizar caracteres especiales ni espacios en blanco."
            usuario = document.querySelector('#usuario').value = usuario
            password = document.querySelector('#password').value = password
            email = document.querySelector('#email').value = email
            return false;
        }
    }

    if( password != '' ){
        var caracteres = password.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        expresion = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/
                                 
        if( caracteres < 6 ){

            document.querySelector("label[for='password']").innerHTML += "<br>Puede utilizar solo 20 caracteres."
            return false;
        }
        if( !expresion.test(password) ){

            document.querySelector("label[for='password']").innerHTML += "<br>La contraseña debe contener al menos 1 Mayúscula un signo y letras minusculas"

            usuario = document.querySelector('#usuario').value = usuario
            password = document.querySelector('#password').value = password
            email = document.querySelector('#email').value = email

            return false;
        }
        
    }

    if( email != '' ){
        var caracteres = password.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES 
        expresion = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}*$/

                                 
        if( !expresion.test(email) ){

            document.querySelector("label[for='email']").innerHTML += "<br>El contenido agregado no es un email válido"
            return false;
        }
        
    }

    return true;
}