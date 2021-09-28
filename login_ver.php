<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <?php
        require ("conecta.php");
        require ("valida_campos.php");  

        session_start();
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST["usuario"]) || isset($_POST["clave"]))
            {
                //Valido los datos
                $usuario=valida_campo($_POST["usuario"]);
                $clave=valida_campo($_POST["clave"]);

                $seleccionar="select * from admin 
                                where usuario='$usuario'
                                and clave='$clave'";
                
                $result=mysqli_query($con,$seleccionar);   

                if($result)
                {
                    $res_login=mysqli_fetch_assoc($result);

                    if(mysqli_affected_rows($con)>=1)
                    {
                        //iniciar sesión                        
                        $_SESSION["rol"]=$res_login["rol"];  
                        echo "<script>alert('Bienvenido $usuario.');
                            window.location='admin_index.php';</script>";                
                    }
                    else
                    {
                        //no es usuario
                        echo "<script>alert('No es administrador.');
                            window.location='login.php';</script>";
                    }
                }
                else
                {
                    switch($_SESSION["idioma"])
                    {
                        case "es":
                            echo "<script>alert('Ha habido un error.');
                            window.location='login.php';</script>";
                            break;

                        case "eng":
                            echo "<script>alert('An error has occured.');
                            window.location='login.php';</script>";
                            break;
                    }           
                        mysqli_close($con);                
                }

                //mysqli_close($con);// Cierra la conexión se le pasa como parámetro el objeto de conexión
            }
            else
            {
                header("location:login.php");
                mysqli_close($con);    
            }
        }
        else
        {
            header("location:login.php");
            mysqli_close($con);    
        } 
    ?>
</body>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/prism.js"></script>
    <script src="js/custom.js"></script>
</html>