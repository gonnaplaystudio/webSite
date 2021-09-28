<?php

    require("conecta.php");
    require("verificar_admin.php");

    session_start();
    
    if(!isset($_SESSION["idioma"]))
    {
        $_SESSION["idioma"]="es";
        header("location:flappy.php?lang=es");
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

    //SELECT GAMES
    $game_alias="Rise of Icarus";//cambiar por cada página del juego

    $sql_games="select * from inf_games_".$_SESSION["idioma"].
                    " where alias='$game_alias';";
    $rs_games=mysqli_query($con,$sql_games);
    $row_games=mysqli_fetch_assoc($rs_games);

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
    <title><?php echo $row_games["g_name"]; ?></title>
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
              <a class="nav-link" href="about_us.php"><?php echo $fila_index["contact"] ?></a>
            </li>
            <?php admin_tab(); ?>
            
          </ul>

          <div class="btn-group">
            <button type="button" class="language-btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <img src=<?php echo "img/navbar/".$fila_index["language"];?> class="d-inline-block language-border-btn" width="30" height="30"alt="...">
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark">
              <li>
                <a class="dropdown-item-custom" href="icarus.php?lang=eng">
                  <img src=<?php echo "img/navbar/".$fila_index["english"];?> class="d-inline-block align-text-top language-border mx-auto d-block" width="30" height="30"alt="...">
                </a> 
              </li>
              <li>
                <a class="dropdown-item-custom" href="icarus.php?lang=es">
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
        
        <div class="row margin-bottom-un">
            <div class="col">
                <div class="ratio ratio-16x9">
                    <iframe src=<?php echo $row_games["scr_youtube"]; ?>
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                        clipboard-write; encrypted-media; gyroscope; picture-in-picture" class=" border-radius" allowfullscreen class="embed-responsive-item">
                    </iframe>
                </div>
            </div>
        </div>        

        <div class="row margin-bottom-un">
            <div class="col">                
                <div class="border-rrss">
                    <div class="d-flex justify-content-center text-success">
                        <small><?php echo $fila_index["downloads"]; ?></small>
                    </div>
                    <div class="row margin-bottom-un">
                        <div class="d-flex justify-content-center col">
                            <a href="#"><img src="img/icarus/soon.png" class="logos-store" alt="..."></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-12">
                <h2 class="text-success"><?php echo $row_games["g_name"]; ?></h2>
            </div>
            <div class="col-12">
                <small class="text-muted align-top"><?php echo $row_games["sub_title"]; ?></small>
            </div>
            <div class="col-12">
                <p><?php echo $row_games["description"]; ?></p>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/icarus/icarus_web_1.jpg" class="d-block w-100  border-radius" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/icarus/icarus_web_2.jpg" class="d-block w-100 border-radius" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/icarus/icarus_web_3.jpg" class="d-block w-100 border-radius" alt="...">
                        </div>
                    </div>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col">
                <div class="border-kit">
                    <a href="#" class="kit-btn"><span><?php echo $fila_index["press_kit"] ?></span></a>
                </div>
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