;
/*********************************************
VALIDAR USUARIO 
*********************************************/

let usuarioExistente = false
let emailExistente = false

$("#usuario").change(function(){

    let usuario = $("#usuario").val()
    let datos = new FormData()
    datos.append('validarUsuario', usuario)
    //console.log(usuario)
    
    $.ajax({
        url:'views/modules/ajax.php',
        method:'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            console.log(respuesta) 

            if(respuesta == 0){
                
                $('label[for="usuario"] span').html('')
                usuarioExistente = false
            }
            else{
                $('label[for="usuario"] span').html('<p>Este usuario ya existe en la Base de Datos</p>')
                usuarioExistente = true
            }
            
        }
    })

});

/*********************************************
VALIDAR EMAIL 
*********************************************/

$("#email").change(function(){

    let email = $("#email").val()
    let datos = new FormData()
    datos.append('validarEmail', email)
    //console.log(email)
    
    $.ajax({
        url:'views/modules/ajax.php',
        method:'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            console.log(respuesta) 

            if(respuesta == 0){
                
                $('label[for="email"] span').html('')
                emailExistente = false
            }
            else{
                $('label[for="email"] span').html('<p>Este email ya existe en la Base de Datos</p>')
                emailExistente = true
            }
            
        }
    })

});




/*********************************************
VALIDAR REGISTRO 
*********************************************/
function ValidarRegistro(){

    let usuario = document.querySelector('#usuario').value
    let password = document.querySelector('#password').value
    let email = document.querySelector('#email').value
    
    if( usuario != '' ){
        let caracteres = usuario.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^[a-zA-Z0-9]*$/;

        if( caracteres > 20 ){

            document.querySelector("label[for='usuario']").innerHTML = "<br>Puede utilizar solo 20 caracteres."
            
            return false;
        }
        if( !expresion.test(usuario) ){

            document.querySelector("label[for='usuario']").innerHTML = "<br>No puede utilizar caracteres especiales ni espacios en blanco."
            usuario = document.querySelector('#usuario').value = usuario
            password = document.querySelector('#password').value = password
            email = document.querySelector('#email').value = email
            return false;
        }
        if(usuarioExistente){
            document.querySelector("label[for='usuario']").innerHTML = "<p>Este usuario ya existe en la Base de Datos.</p>"
            return false;
        }
    }

    if( password != '' ){
        var caracteres = password.length

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?.]).*$/
                                 
        if( caracteres < 6 ){

            document.querySelector("label[for='password']").innerHTML = "<br>Debe utilizar un minimo de 6 Carácteres."
            return false;
        }
        if( !expresion.test(password) ){

            document.querySelector("label[for='password']").innerHTML = "<br>La contraseña debe contener al menos 1 Mayúscula un signo y letras minusculas"

            usuario = document.querySelector('#usuario').value = usuario
            password = document.querySelector('#password').value = password
            email = document.querySelector('#email').value = email

            return false;
        }
        
    }

    if( email != '' ){

        //VALIDAR UTILIZANDO EXPRESIONES REGULARES
        let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                                 
        
        if( !expresion.test(email) ){

            document.querySelector("label[for='email']").innerHTML = "<br>El email debe poseer un formato valido"

            usuario = document.querySelector('#usuario').value = usuario
            password = document.querySelector('#password').value = password
            email = document.querySelector('#email').value = email

            return false;
        }
        if(emailExistente){
            document.querySelector("label[for='email']").innerHTML = "<p>Este Email ya existe en la Base de Datos.</p>"
            return false;
        }
        
    }

    return true;
}