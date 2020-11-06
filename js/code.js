function validacionForm() {
    // variables 
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    if (email == '' && password == '') {
        // si la contraseña y el correo estan vacios mostrar los dos campos en rojo y un mensaje en rojo
        document.getElementById("message").innerHTML = 'Inténtelo de nuevo.';
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("password").style.borderColor = "red";
    }else if (email == '' ) {
        // si el correo esta vacio mostrar el campo en rojo y un mensaje en rojo
        document.getElementById("message").innerHTML = 'Te has dejado el email vacio.';
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("password").style.borderColor = "white";
    }else if (password == '') {
        // si la password esta vacio mostrar el campo en rojo y un mensaje en rojo
        document.getElementById("message").innerHTML = 'Te has dejado la contraseña vacia.';
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "white";
    }else{
        return true;
    }
    document.getElementById("message").style= "background-color: #FFB0AE; border-radius: 5px; padding: 13px;";
    return false;
}