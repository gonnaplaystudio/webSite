<?php



    require("conecta.php");

    require("verificar_admin.php");



    session_start();

    

    if(!isset($_SESSION["idioma"]))

    {

        $_SESSION["idioma"]="es";

        header("location:projects.php?lang=es");

    }

    else

    {

      if(isset($_GET["lang"]))

      {

        $_SESSION["idioma"]=$_GET["lang"];

      }

    }   



    $sql="select * from inf_games_".$_SESSION["idioma"]." order by id_inf_games_".$_SESSION["idioma"]." desc";

    $sql_index="select * from inicio_".$_SESSION["idioma"];

    $rs_index=mysqli_query($con,$sql_index);

    $fila_index=mysqli_fetch_assoc($rs_index);

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href='https://fonts.google.com/specimen/Russo+One?query=russo#standard-styles' rel='stylesheet'>

    <link href="bootswatch/bootstrap_vapor.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <link rel="icon" href="img/navbar/Logo_2_prueba.png">

    <title><?php echo $fila_index["projects"] ?></title>

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

              <a class="nav-link active" href="projects.php"><?php echo $fila_index["projects"] ?></a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="about_us.php"><?php echo $fila_index["about"] ?></a>

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

                <a class="dropdown-item-custom" href="projects.php?lang=eng">

                  <img src=<?php echo "img/navbar/".$fila_index["english"];?> class="d-inline-block align-text-top language-border mx-auto d-block" width="30" height="30"alt="...">

                </a> 

              </li>

              <li>

                <a class="dropdown-item-custom" href="projects.php?lang=es">

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

  

      <!-- <div class="card text-white text-center col" style="border: none;">

        <img src="img/Portada_Web.jpg" class="card-img" alt="...">

        <div class="card-img-overlay">

          <h5 class="card-title">Card title</h5>

          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

          <p class="card-text">Last updated 3 mins ago</p>

        </div>

      </div> -->

      <!-- <div class="row">

        <div class="card col no-border">

          <img src="img/Portada_web.png" class="card-img" alt="...">

          <div class="card-img-overlay text-center contenedor-tarjeta">

            <div class="tarjeta">

              <div class="texto-tarjeta">            

                <img src="img/Logo_FW.png" class="img-fluid logo">

              </div>

            </div>        

          </div>

        </div>

      </div> -->



      <div class="row" style="margin-bottom:500px;">



      <?php 

        $rs=mysqli_query($con,$sql);

        while($fila=mysqli_fetch_assoc($rs))

        {  

      ?>

        <div class="card mb-3 col-lg-6 no-border">

        <a href=<?php echo $fila["href"] ?>>

          <img src=<?php echo "img/".$fila["photo"];?> class="card-img-top grow border-radius" alt="...">

        </a>

          <div class="card-body border-info title-border">

            <h5 class="card-title text-success"><?php echo $fila["g_name"]; ?></h5>          

            <p class="card-text text-muted"><?php echo $fila["platforms"]; ?></p>

          </div>

        </div>



      <?php }

        mysqli_close($con);?>

    </div>



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