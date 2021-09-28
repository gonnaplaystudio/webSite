<?php



    require("conecta.php");

    require("verificar_admin.php");



    session_start();

    

    if(!isset($_SESSION["idioma"]))

    {

        $_SESSION["idioma"]="es";

        header("location:about_us.php?lang=es");

    }

    else

    {

      if(isset($_GET["lang"]))

      {

        $_SESSION["idioma"]=$_GET["lang"];

      }

    }   



    //SELECT MAIN

    $sql_index="select * from inicio_".$_SESSION["idioma"];

    $rs_index=mysqli_query($con,$sql_index);

    $fila_index=mysqli_fetch_assoc($rs_index);


    $sql_about="select * from about_".$_SESSION["idioma"];

    $rs_about=mysqli_query($con,$sql_about);

    $fila_about=mysqli_fetch_assoc($rs_about);



    mysqli_close($con);

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/navbar/Logo_2_prueba.png">

    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <title><?php echo $fila_index["about"] ?></title>

</head>

<body>

  

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top pegajosa nav-bar-coll">

      <div class="container-md">

        <a class="navbar-brand" id="studio" href="index.php">

          <img src="img/navbar/Logo_2_prueba.png" alt="" width="25" height="25" class="d-inline-block align-text-top logo-gonna">

          Gonna Play Studio

        </a>

        <!--<a id="studio" class="navbar-brand" href="#">Gonna Play Studio</a>-->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        

        

        <div class="collapse navbar-collapse nav-links" id="navbarColor01">

          <ul class="navbar-nav me-auto">

            <li class="nav-item">

              <a class="nav-link" href="index.php"><?php echo $fila_index["home"] ?>

              </a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="projects.php"><?php echo $fila_index["projects"] ?></a>

            </li>

            <li class="nav-item">

              <a class="nav-link active" href="about_us.php"><?php echo $fila_index["about"] ?></a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="contact.php"><?php echo $fila_index["contact"] ?></a>

            </li>

            <?php admin_tab(); ?>

            

          </ul>



          <div class="btn-group">

            <button type="button" class="language-btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

              <img src=<?php echo "img/navbar/".$fila_index["language"];?> class="d-inline-block language-border-btn" width="30" height="30"alt="...">

            </button>

            <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark">

              <li>

                <a class="dropdown-item-custom" href="about_us.php?lang=eng">

                  <img src=<?php echo "img/navbar/".$fila_index["english"];?> class="d-inline-block align-text-top language-border mx-auto d-block" width="30" height="30"alt="...">

                </a> 

              </li>

              <li>

                <a class="dropdown-item-custom" href="about_us.php?lang=es">

                  <img src=<?php echo "img/navbar/".$fila_index["spanish"];?> class="d-inline-block align-text-top language-border mx-auto d-block" width="30" height="30"alt="...">

                </a>

              </li>

            </ul>

          </div>

        </div>

      </div>

    </nav>

    

    <br>



    <div class="container-md">



    <div class="row car-margin">

        <div class="col">

            <img src="img/about/about_img.png" class="d-block w-100 desc-us-border">

        </div>

    </div>

        

    <div class="row">

        <div class="col">

            <div class="text-center">

                <div class="d-flex justify-content-center text-success">

                    <h2><?php echo $fila_about['title'] ?></h2>

                </div>

                <div class="d-flex justify-content-center">

                    <p>

                    <?php echo $fila_about['studio'] ?>

                    </p>

                </div>

            </div>

        </div>

    </div>



    <br>



    <!-- <div class="row">

        <div class="col">

            <div class="d-flex justify-content-center border-rrss">

                <h4 class="text-success">CREW</h4>

            </div>

        </div>

    </div> -->



    <div class="row row-cols-2 car-margin">

        <div class="col-xxl-4 col-xl-9 col-lg-9 col-md-8 col-sm-8 col-7 carles-text">

            <span class="text-success crew-name-font">Rostyslav Simchera</span><br>

            <small class="text-muted align-top"><?php echo $fila_about['ross_rol'] ?></small>

            <p class="p-font-addapted"><?php echo $fila_about['ross'] ?></p>

        </div>

        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-5 d-flex justify-content-carles">

            <img src="img/about/ross.png" class="img-fluid img-border-radius">

        </div>

        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-5 d-flex justify-content-ross">

            <img src="img/about/carles.png" class="img-fluid img-border-radius">

        </div>

        <div class="col-xxl-4 col-xl-9 col-lg-9 col-md-8 col-sm-8 col-7">

            <span class="text-success crew-name-font">Carles Navarro</span><br>

            <small class="text-muted align-top"><?php echo $fila_about['carles_rol'] ?></small>

            <p class="p-font-addapted"><?php echo $fila_about['carles'] ?></p>

        </div>     

    </div>





    <div class="row car-margin">

        <div class="col">

            <div class="d-flex justify-content-center border-rrss">

                <h4 class="text-success">AWARDS</h4>

            </div>

        </div>

    </div>



    <div class="row car-margin">

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-6">

            <img src="img/about/award_1.png" class="img-fluid ">

        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-6">

            <img src="img/about/award_1.png" class="img-fluid ">

        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-6">

            <img src="img/about/award_1.png" class="img-fluid ">

        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-6">

            <img src="img/about/award_1.png" class="img-fluid ">

        </div>

    </div>





    </div>

    

    <div class="container-md">



    <footer id="footer" class="border-rrss">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center-footer">

            <small>Copyright © Gonna Play Studio All Rights Reserved.</small>

          </div>

          <div class="col-lg-6 d-flex justify-content-logos">

          <a href="https://www.instagram.com/gonnaplaystudio/"><img src="img/footer/logo_insta_2.png" class="logos-rrss" alt="..."></a>

          <a href="https://twitter.com/gonnaplaystudio"><img src="img/footer/logo_twitter_2.png" class="logos-rrss" alt="..."></a>

          <a href="mailto:gonnaplaystudio@gmail.com"><img src="img/footer/logo_mail_2.png" class="logos-rrss" alt="..."></a>

          <a href="https://discord.gg/R9andZCEVy"><img src="img/footer/logo_discord.png" class="logos-rrss" alt="..."></a>

          </div>

        </div>

      </footer>

  



    </div>

</body>



<script src="js/validar_newsletter.js"></script>

<!-- <script src="js/animation.js"></script> -->

<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/prism.js"></script>

<script src="js/custom.js"></script>



</html>