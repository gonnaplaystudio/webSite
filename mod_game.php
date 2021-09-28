<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">
    <title>Mod Game</title>
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
            //Se carga el alias
            $alias=$_POST["alias"];

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

            $insertar_es="update inf_games_es set g_name='$name_es', sub_title='$sub_title_es', description='$description_es'
                            , scr_youtube='$scr_youtube_es', platforms='$platforms_es', photo='$photo_es', href='$href_es'
                            where alias='$alias';";

            $insertar_eng="update inf_games_eng set g_name='$name_eng', sub_title='$sub_title_eng', description='$description_eng'
                            , scr_youtube='$scr_youtube_eng', platforms='$platforms_eng', photo='$photo_eng', href='$href_eng'
                            where alias='$alias';";
            
            $result_es=mysqli_query($con,$insertar_es); 
            $result_eng=mysqli_query($con,$insertar_eng);     

            if($result_es && $result_eng)
            {
                echo "<script>alert('Se ha modificado el juego correctamente.');
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