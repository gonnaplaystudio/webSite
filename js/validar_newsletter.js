function validar(x){

    var email = document.getElementById("exampleInputEmail1");

    var errores=document.getElementById("errores");
    var continua=true;
    var expresion=/\w+@+\w+\.+[a-z]/;
    var borde="border:1px solid red";
    var borde_normal="border:1px solid darkgrey"
    var e=[];    
    
    if(email.value != null || email.value != "")
    {
        if (!expresion.test(email.value))
        {
            switch(x)
            {
                case "es":
                    e.push("*Formato de email incorrecto.");
                    break;
                
                case "eng":
                    e.push("*Wrong email format.");
                    break;
            }
            
            email.style=borde;
            continua=false;
        }
        else
            email.style=borde_normal;
    }
    else
    {
        email.style=borde_normal;
    }        

    

    errores.innerHTML=e.join(" <br> ");

    

    return continua;
}