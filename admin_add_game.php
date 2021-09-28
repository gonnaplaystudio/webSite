<?php

    require("conecta.php");
    require("verificar_admin.php");

    session_start();

    if(!verificar_admin())
    {
        header("location:login.php");
    }
    
    if(!isset($_SESSION["idioma"]))
    {
        $_SESSION["idioma"]="es";
        header("location:admin_add_game.php?lang=es");
    }
    else
    {
      if(isset($_GET["lang"]))
      {
        $_SESSION["idioma"]=$_GET["lang"];
      }
    }   

    $sql_index="select * from inicio_".$_SESSION["idioma"];
    $rs_index=mysqli_query($con,$sql_index);
    $fila_index=mysqli_fetch_assoc($rs_index);

    mysqli_close($con);
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
    <title>Admin_Add_Game</title>
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top pegajosa nav-bar-coll">
      <div class="container-md">
        <a class="navbar-brand" id="studio" href="index.php">
          <img src="../html_gonna/img/navbar/Logo_2_prueba.png" alt="" width="25" height="25" class="d-inline-block align-text-top logo-gonna">
          Gonna Play Studio
        </a>
        <!--<a id="studio" class="navbar-brand" href="#">Gonna Play Studio</a>-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse nav-links" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php"><?php echo $fila_index["home"] ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projects.php"><?php echo $fila_index["projects"] ?></a>
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
                <a class="dropdown-item-custom" href="index.php?lang=eng">
                  <img src=<?php echo "img/navbar/".$fila_index["english"];?> class="d-inline-block align-text-top language-border mx-auto d-block" width="30" height="30"alt="...">
                </a> 
              </li>
              <li>
                <a class="dropdown-item-custom" href="index.php?lang=es">
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

    <form  method="POST" action="add_game.php">
      <div class="row">  
      <div class="col-lg-6">
          <fieldset>
            <div class="form-border-back">
              <legend class="tittle-form-back">AÑADIR JUEGO ES</legend>
                <div class="form-group contenedor-inputs text-center">

                  <div class="i-48">
                    <label for="name_es" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name_es" name="name_es" >
                  </div>
                  <div class="i-48">
                    <label for="sub_title_es" class="form-label">Sub título</label>
                    <input type="text" class="form-control" id="sub_title_es" name="sub_title_es" >
                  </div>
                  <div class="i-100">
                    <label for="description_es" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description_es" name="description_es" rows="3"></textarea>
                  </div>
                  <div class="i-100">
                    <label for="platforms_es" class="form-label">Plataformas</label>
                    <input type="text" class="form-control" id="platforms_es" name="platforms_es">
                  </div>
                  <div class="i-100">
                    <label for="scr_youtube_es" class="form-label">Link Youtube Trailer</label>
                    <input type="text" class="form-control" id="scr_youtube_es" name="scr_youtube_es">
                  </div>
                  <div class="i-48">
                    <label for="photo_es" class="form-label">Foto portada</label>
                    <input type="text" class="form-control" id="photo_es" name="photo_es" >
                  </div>
                  <div class="i-48">
                    <label for="href_es" class="form-label">Página href</label>
                    <input type="text" class="form-control" id="href_es" name="href_es" >
                  </div>

                </div>
                <div id="errores_es" class="text-danger"></div>
            </div>
          </fieldset>      

      </div>     
      <div class="col-lg-6">
          <fieldset>
            <div class="form-border-back">
              <legend class="tittle-form-back">AÑADIR JUEGO ENG</legend>
                <div class="form-group contenedor-inputs text-center">

                  <div class="i-48">
                    <label for="name_eng" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name_eng" name="name_eng" >
                  </div>
                  <div class="i-48">
                    <label for="sub_title_eng" class="form-label">Sub title</label>
                    <input type="text" class="form-control" id="sub_title_eng" name="sub_title_eng" >
                  </div>
                  <div class="i-100">
                    <label for="description_eng" class="form-label">Description</label>
                    <textarea class="form-control" id="description_eng" name="description_eng" rows="3"></textarea>
                  </div>
                  <div class="i-100">
                    <label for="platforms_eng" class="form-label">Plataforms</label>
                    <input type="text" class="form-control" id="platforms_eng" name="platforms_eng">
                  </div>
                  <div class="i-100">
                    <label for="scr_youtube_eng" class="form-label">Link Youtube Trailer</label>
                    <input type="text" class="form-control" id="scr_youtube_eng" name="scr_youtube_eng">
                  </div>
                  <div class="i-48">
                    <label for="photo_eng" class="form-label">Cover photo</label>
                    <input type="text" class="form-control" id="photo_eng" name="photo_eng" >
                  </div>
                  <div class="i-48">
                    <label for="href_eng" class="form-label">Page href</label>
                    <input type="text" class="form-control" id="href_eng" name="href_eng" >
                  </div>

                </div>
                <div id="errores_eng" class="text-danger"></div>
              </div>
            </fieldset>          
          </div>  
        </div>
        <div class="row margin-600">
          <div class="col mt-4">
            <button type="submit" class="btn btn-secondary mx-auto d-block" onclick="return validar_add_game()">AÑADIR</button>            
          </div>
      </div>
    </form>        

    <footer id="footer" class="border-rrss">
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center-footer">
            <small>Copyright © Gonna Play Studio All Rights Reserved.</small>
          </div>
          <div class="col-lg-6 d-flex justify-content-logos">
            <a href="https://blog.bootswatch.com/"><img src="img/footer/logo_insta_2.png" class="logos-rrss" alt="..."></a>
            <a href="https://blog.bootswatch.com/"><img src="img/footer/logo_twitter_2.png" class="logos-rrss" alt="..."></a>
            <a href="https://blog.bootswatch.com/"><img src="img/footer/logo_mail_2.png" class="logos-rrss" alt="..."></a>
            <a href="https://blog.bootswatch.com/"><img src="img/footer/logo_discord.png" class="logos-rrss" alt="..."></a>
          </div>
        </div>
      </footer>

  </div>
  
</body>

<script src="js/validar_add_game.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/prism.js"></script>
<script src="js/custom.js"></script>

</html>