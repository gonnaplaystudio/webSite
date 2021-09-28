<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">
    <title>Newsletter</title>
</head>
<body>
    
    <?php
        require ("conecta.php");// inserta el código php de la página conecta.php
        require ("valida_campos.php");  

        session_start();
        
        if($_SERVER["REQUEST_METHOD"]=="POST")// esto es lo mismo que if(!_POST)
        {
            if(isset($_POST["email"]))
            {
                // Cargo los datos del formulario
                $email=valida_campo($_POST["email"]);
                //Inserto los datos en la bd

                $seleccionar="select * from newsletter 
                                where email='$email'";
                
                $result=mysqli_query($con,$seleccionar);   

                if($result)
                {
                    //comprobar si esta activo sino activarlo
                    $res_email=mysqli_fetch_assoc($result);

                    if(mysqli_affected_rows($con)==0)
                    {
                        //no existe asique darle de alta
                        $insertar="insert into newsletter (email,active)
                        values ('$email',true)";
                        
                        $resultado=mysqli_query($con,$insertar);// se le pasa la conexión y la sql a ejecutar

                        if ($resultado)// Si se ha insertado
                        {
                            switch($_SESSION["idioma"])
                            {
                                case "es":
                                    echo "<script>alert('Se ha registrado correctamente.');
                                    window.location='index.php';</script>";
                                    break;

                                case "eng":
                                    echo "<script>alert('It has been successfully registered.');
                                    window.location='index.php';</script>";
                                    break;
                            }

                            mysqli_close($con);
                        }
                        else
                        {
                            switch($_SESSION["idioma"])
                            {
                                case "es":
                                    echo "<script>alert('No se ha registrado correctamente.');
                                    window.history.back;</script>";
                                    break;

                                case "eng":
                                    echo "<script>alert('It has not been successfully registered.');
                                    window.location='index.php';</script>";
                                    break;
                            }
                            mysqli_close($con);
                        }                    
                    }
                    else
                    {
                        if($res_email["active"])
                        {
                            switch($_SESSION["idioma"])
                            {
                                case "es":
                                    echo "<script>alert('Ya está dado de alta en la newsletter.');
                                    window.location='index.php';</script>";
                                    break;

                                case "eng":
                                    echo "<script>alert('You are already registered in the newsletter.');
                                    window.location='index.php';</script>";
                                    break;
                            }
                        }else
                        {
                            $sql_update="update newsletter
                                SET active = true
                                WHERE email = '$email'";
        
                            $update_result=mysqli_query($con,$sql_update);
        
                            if($update_result)
                            {
                                //Se activa el usuario
                                switch($_SESSION["idioma"])
                                {
                                    case "es":
                                        echo "<script>alert('Bienvenido de nuevo.');
                                        window.location='index.php'</script>";
                                        break;

                                    case "eng":
                                        echo "<script>alert('Wellcome back.');
                                        window.location='index.php';</script>";
                                        break;
                                }
                                mysqli_close($con);
                            }
                            else
                            {
                                switch($_SESSION["idioma"])
                                {
                                    case "es":
                                        echo "<script>alert('Ha habido un error.');
                                        window.location='index.php';</script>";
                                        break;

                                    case "eng":
                                        echo "<script>alert('An error has occured.');
                                        window.location='index.php';</script>";
                                        break;
                                }
                                mysqli_close($con);
                            }
                        }
                    }
                }
                else
                {
                    switch($_SESSION["idioma"])
                    {
                        case "es":
                            echo "<script>alert('Ha habido un error.');
                            window.location='index.php';</script>";
                            break;

                        case "eng":
                            echo "<script>alert('An error has occured.');
                            window.location='index.php';</script>";
                            break;
                    }           
                        mysqli_close($con);                
                }

                //mysqli_close($con);// Cierra la conexión se le pasa como parámetro el objeto de conexión
            }
            else
            {
                header("location:index.php");
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



