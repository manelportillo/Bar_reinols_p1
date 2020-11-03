function validacionForm() {
    var email=document.getElementById('email').value;
    var password=document.getElementById('passwd').value;


    // alert(email);
    // alert(password);
    if (email == "" || password == "") {

        if (email == "" && password != "") {
            //alert ("No se ha especificado ningun Email");

            document.getElementById('mensaje').innerHTML="<p>No se ha especificado ningun Email</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('email').style.border = "2px solid red";
            document.getElementById('passwd').style.border = "2px solid grey";
            document.getElementById('error').style.border = "2px solid blue";
            document.getElementById('mensaje').style.color = "black"; document.getElementById('mensaje').style.backgroundColor = '#FA788D'; document.getElementById('mensaje').style.borderRadius = "4px"; document.getElementById('mensaje').style.padding = "0.5%";
            
        }else if (email != "" && password == "") {
            //alert ("No se ha especificado ninguna Contraseña");

            document.getElementById('mensaje').innerHTML="<p>No se ha especificado ninguna Contraseña</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('passwd').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid grey";
            document.getElementById('error').style.border = "2px solid blue";
            document.getElementById('mensaje').style.color = "black"; document.getElementById('mensaje').style.backgroundColor = '#FA788D'; document.getElementById('mensaje').style.borderRadius = "4px"; document.getElementById('mensaje').style.padding = "0.5%";
            
        }else{
            //alert ("No se ha especificado ningun valor");
            
            document.getElementById('mensaje').innerHTML="<p>No se ha especificado ningun Valor</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('passwd').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid red";
            document.getElementById('error').style.border = "2px solid blue";
            document.getElementById('mensaje').style.color = "black"; document.getElementById('mensaje').style.backgroundColor = '#FA788D'; document.getElementById('mensaje').style.borderRadius = "4px"; document.getElementById('mensaje').style.padding = "0.5%";
            
        }
        
        return false;
    }else{
        return true;
    }
}