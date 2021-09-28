<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">

    <title>Mod New</title>

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

            //Se carga el id

            $id_news=$_POST["id_news"];

            //Cargo los datos del formulario es

            $title_es=$_POST["title_es"];

            $description_es=$_POST["description_es"];

            $img_scr_es=$_POST["img_scr_es"];



            //Cargo los datos del formulario eng

            $title_eng=$_POST["title_eng"];

            $description_eng=$_POST["description_eng"];

            $img_scr_eng=$_POST["img_scr_eng"];



            $insertar_es="update news_es set title='$title_es', description='$description_es', img_scr='$img_scr_es'

                            where idnews_es='$id_news';";



            $insertar_eng="update news_eng set title='$title_eng', description='$description_eng', img_scr='$img_scr_eng'

                            where idnews_eng='$id_news';";

            

            $result_es=mysqli_query($con,$insertar_es); 

            $result_eng=mysqli_query($con,$insertar_eng);     



            if($result_es && $result_eng)

            {

                echo "<script>alert('Se ha modificado la noticia correctamente.');

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