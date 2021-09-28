function validar_add_news(){

    //juego es
    var title_es = document.getElementById("title_es");
    var img_scr_es = document.getElementById("img_scr_es");
    var description_es = document.getElementById("description_es");
    var errores_es=document.getElementById("errores_es");
    var e_es=[];  

    //juego eng
    var title_eng = document.getElementById("title_eng");
    var img_scr_eng = document.getElementById("img_scr_eng");
    var description_eng = document.getElementById("description_eng");
    var errores_eng=document.getElementById("errores_eng");
    var e_eng=[];    


    var continua=true;
    var expresion=/\w+\.+[a-z]/;
    var borde_rojo="border:1px solid red";
    var borde_normal="border:1px solid aqua"

    function validar_es()
    {
        if(title_es.value == null || title_es.value == "")
        {
            e_es.push("*La noticia tiene que tener un título.");
            title_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            title_es.style=borde_normal;
        }

        if(description_es.value == null || description_es.value == "")
        {
            e_es.push("*La noticia tiene que tener una descripción.");
            description_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            description_es.style=borde_normal;
        }

        if(img_scr_es.value == null || img_scr_es.value == "")
        {
            e_es.push("*La noticia tiene que tener una foto de portada.");
            img_scr_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(img_scr_es.value))
            {
                e_es.push("*Formato de foto incorrecto.");
                img_scr_es.style=borde_rojo;
                continua=false;
            }
            else
            {
                img_scr_es.style=borde_normal;
            }
        }

        return continua;
    }

    function validar_eng()
    {
        if(title_eng.value == null || title_eng.value == "")
        {
            e_eng.push("*La noticia tiene que tener un título.");
            title_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            title_eng.style=borde_normal;
        }

        if(description_eng.value == null || description_eng.value == "")
        {
            e_eng.push("*La noticia tiene que tener una descripción.");
            description_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            description_eng.style=borde_normal;
        }

        if(img_scr_eng.value == null || img_scr_eng.value == "")
        {
            e_eng.push("*La noticia tiene que tener una foto de portada.");
            img_scr_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(img_scr_eng.value))
            {
                e_eng.push("*Formato de foto incorrecto.");
                img_scr_eng.style=borde_rojo;
                continua=false;
            }
            else
            {
                img_scr_eng.style=borde_normal;
            }
        }

        return continua;
    }

    continua = validar_es();
    continua = validar_eng();

    errores_es.innerHTML=e_es.join(" <br> "); 
    errores_eng.innerHTML=e_eng.join(" <br> ");   

    return continua;
}

