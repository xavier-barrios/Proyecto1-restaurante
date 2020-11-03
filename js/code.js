function validacionForm() {
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    if (email == '' && password == '') {
        document.getElementById("message").innerHTML = 'Inténtelo de nuevo.';
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("password").style.borderColor = "red";
    }else if (email == '' ) {
        document.getElementById("message").innerHTML = 'Te has dejado el email vacio.';
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("password").style.borderColor = "white";
    }else if (password == '') {
        document.getElementById("message").innerHTML = 'Te has dejado la contraseña vacia.';
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "white";
    }else{

        return true;
    }
    // document.getElementById("submit").style.color = "red";
    // document.getElementById("submit").style.backgroundColor = "#FFB0AE";
    document.getElementById("message").style= "background-color: #FFB0AE; border-radius: 5px; padding: 13px;";
    return false;
    /*
    if (email == '' && password == '') {
        alert('El email y la password estan vacio');
    }else if (email == '' ) {
        alert('El email esta vacio');
    }else if (password == '') {
        alert('El password esta vacio');
    }else{
        return true;
    }
    return false;
    */
   
}