<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">
    <title>Add Game</title>
</head>
<body>
    
    <?php
        require ("conecta.php");

        require ("verificar_admin.php");

        session_start();

        if(!verificar_admin())
        {
            header("location:login.php");
        }
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            //Cargo los datos del formulario es
            $name_es=$_POST["name_es"];
            $sub_title_es=$_POST["sub_title_es"];
            $description_es=$_POST["description_es"];
            $scr_youtube_es=$_POST["scr_youtube_es"];
            $platforms_es=$_POST["platforms_es"];
            $photo_es=$_POST["photo_es"];
            $href_es=$_POST["href_es"];

            //Cargo los datos del formulario es
            $name_eng=$_POST["name_eng"];
            $sub_title_eng=$_POST["sub_title_eng"];
            $description_eng=$_POST["description_eng"];
            $scr_youtube_eng=$_POST["scr_youtube_eng"];
            $platforms_eng=$_POST["platforms_eng"];
            $photo_eng=$_POST["photo_eng"];
            $href_eng=$_POST["href_eng"];

            $insertar_es="insert into inf_games_es(g_name, sub_title, description, scr_youtube, platforms, photo, href,alias)
                    values('$name_es','$sub_title_es','$description_es','$scr_youtube_es','$platforms_es','$photo_es','$href_es','$name_eng');";

            $insertar_eng="insert into inf_games_eng(g_name, sub_title, description, scr_youtube, platforms, photo, href,alias)
                    values('$name_eng','$sub_title_eng','$description_eng','$scr_youtube_eng','$platforms_eng','$photo_eng','$href_eng','$name_eng');";
            
            $result_es=mysqli_query($con,$insertar_es); 
            $result_eng=mysqli_query($con,$insertar_eng);     

            if($result_es && $result_eng)
            {
                echo "<script>alert('Se ha añadido el juego correctamente.');
                window.location='admin_index.php';</script>";
                       
                mysqli_close($con); 
            }
            else
            {
                echo "<script>alert('Ha habido un error.');
                window.location='admin_index.php';</script>";         
                
                mysqli_close($con);                
            }
        }
        else
        {
            header("location:index.php");
            mysqli_close($con);    
        } 
    ?>
</body>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/prism.js"></script>
    <script src="js/custom.js"></script>
</html>