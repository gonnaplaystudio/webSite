function validar_add_game(){

    //juego es
    var name_es = document.getElementById("name_es");
    var sub_title_es = document.getElementById("sub_title_es");
    var description_es = document.getElementById("description_es");
    var platforms_es = document.getElementById("platforms_es");
    var scr_youtube_es = document.getElementById("scr_youtube_es");
    var photo_es = document.getElementById("photo_es");
    var href_es = document.getElementById("href_es");
    var errores_es=document.getElementById("errores_es");
    var e_es=[];  

    //juego eng
    var name_eng = document.getElementById("name_eng");
    var sub_title_eng = document.getElementById("sub_title_eng");
    var description_eng = document.getElementById("description_eng");
    var platforms_eng = document.getElementById("platforms_eng");
    var scr_youtube_eng = document.getElementById("scr_youtube_eng");
    var photo_eng = document.getElementById("photo_eng");
    var href_eng = document.getElementById("href_eng");
    var errores_eng=document.getElementById("errores_eng");
    var e_eng=[];    


    var continua=true;
    var expresion=/\w+\.+[a-z]/;
    var borde_rojo="border:1px solid red";
    var borde_normal="border:1px solid aqua"

    function validar_es()
    {
        if(name_es.value == null || name_es.value == "")
        {
            e_es.push("*El juego tiene que tener un nombre.");
            name_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            name_es.style=borde_normal;
        }

        if(sub_title_es.value == null || sub_title_es.value == "")
        {
            e_es.push("*El juego tiene que tener un subtítulo.");
            sub_title_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            sub_title_es.style=borde_normal;
        }

        if(description_es.value == null || description_es.value == "")
        {
            e_es.push("*El juego tiene que tener una descripción.");
            description_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            description_es.style=borde_normal;
        }

        if(platforms_es.value == null || platforms_es.value == "")
        {
            e_es.push("*El juego tiene que estar en al menos una plataforma.");
            platforms_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            platforms_es.style=borde_normal;
        }

        if(scr_youtube_es.value == null || scr_youtube_es.value == "")
        {
            e_es.push("*El juego tiene que tener un trailer en youtube.");
            scr_youtube_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            scr_youtube_es.style=borde_normal;
        }

        if(photo_es.value == null || photo_es.value == "")
        {
            e_es.push("*El juego tiene que tener una foto de portada.");
            photo_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(photo_es.value))
            {
                e_es.push("*Formato de foto incorrecto.");
                photo_es.style=borde_rojo;
                continua=false;
            }
            else
            {
                photo_es.style=borde_normal;
            }
        }

        if(href_es.value == null || href_es.value == "")
        {
            e_es.push("*El juego tiene que tener una foto de portada.");
            href_es.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(href_es.value))
            {
                e_es.push("*Formato de href incorrecto.");
                href_es.style=borde_rojo;
                continua=false;
            }
            else
            {
                href_es.style=borde_normal;
            }
        }

        return continua;
    }

    function validar_eng()
    {
        if(name_eng.value == null || name_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener un nombre.");
            name_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            name_eng.style=borde_normal;
        }

        if(sub_title_eng.value == null || sub_title_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener un subtítulo.");
            sub_title_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            sub_title_eng.style=borde_normal;
        }

        if(description_eng.value == null || description_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener una descripción.");
            description_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            description_eng.style=borde_normal;
        }

        if(platforms_eng.value == null || platforms_eng.value == "")
        {
            e_eng.push("*El juego tiene que estar en al menos una plataforma.");
            platforms_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            platforms_eng.style=borde_normal;
        }

        if(scr_youtube_eng.value == null || scr_youtube_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener un trailer en youtube.");
            scr_youtube_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            scr_youtube_eng.style=borde_normal;
        }

        if(photo_eng.value == null || photo_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener una foto de portada.");
            photo_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(photo_eng.value))
            {
                e_eng.push("*Formato de foto incorrecto.");
                photo_eng.style=borde_rojo;
                continua=false;
            }
            else
            {
                photo_eng.style=borde_normal;
            }
        }

        if(href_eng.value == null || href_eng.value == "")
        {
            e_eng.push("*El juego tiene que tener una foto de portada.");
            href_eng.style=borde_rojo;
            continua=false;
        }
        else
        {
            if(!expresion.test(href_eng.value))
            {
                e_eng.push("*Formato de href incorrecto.");
                href_eng.style=borde_rojo;
                continua=false;
            }
            else
            {
                href_eng.style=borde_normal;
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

