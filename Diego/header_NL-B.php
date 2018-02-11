<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--CSS Diego para gen de Animales-->
    <link rel="stylesheet" href="css/css_DiegoMOD.css">

    <!-- CSS Xavito para el footer -->
    <link rel="stylesheet" href="css/demo-xavi.css">
    <link rel="stylesheet" href="css/footer-xavi.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-faded fixed-top" style="background-color: white">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" width="150px" height="50px" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php require 'barraDeBusqueda.php'
              ?>
              <li class="nav-item">
                <a class="nav-link" id="pruebaNaranjito" href="vaciolegal.html" style="border-radius: 15px;">Login / Register</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
