<?php
  session_start();

  if(isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PuraVidaTours | Nosotros</title>
  <link rel="icon" href="img/favicon.png">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="styles.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    html {
      box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 8px;
    }

    .container {
      padding: 0 16px;
    }

    .container::after,
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    .title {
      color: grey;
    }

    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }

    .button:hover {
      background-color: #555;
    }

    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }

    .sin-estilo {
      border: none;
      padding: 0;
      background: none;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-custom-2 bg-shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="./img/PuravidaTours.png" width="30" height="30" class="d-inline-block align-top" alt="">
          PuraVidaTours
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="destinos.php">Destinos</a></li>
                <li><a class="dropdown-item" href="hotel.php">Hoteles</a></li>
                <li><a class="dropdown-item"
                    href="https://www.airbnb.co.cr/a/stays/Costa-Rica?c=.pi0.pk393578303_53373630718&localized_ghost=true&gclid=CjwKCAiAnO2MBhApEiwA8q0HYXnbXJEwsupSJK44wgq5NRyXKS9FIrSRKJmUcqf-RQkz_cGHezb7fxoCiiIQAvD_BwE&_set_bev_on_new_domain=1637596028_ZmI2ZTA2NzgzMjNj">Airbnb</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Ver más
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="reglas.php">Reglas para viajar</a></li>
                <li><a class="dropdown-item" href="recomendaciones.php">Recomendaciones</a></li>
                <li><a class="dropdown-item" href="nosotros.php">Nosotros</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="contacto.php">Contacto</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav mb-lg-0">
            <?php
              if(!(isset($_SESSION["logeado"]))) {
                echo "<li class='nav-item'>";
                echo "  <a style='margin-right:-10px;' class='nav-link' href='#' data-toggle='modal' data-target='.bd-example-modal-lg'>Ingresar</a>";
                echo "</li>";
              } else {
                // 
                echo "<li class='nav-item dropdown'>";
                echo "  <a style='margin-left:-10px;' href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'
                aria-expanded='false'>". $correo ."</a>";
                echo  "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                echo    "<li><a class='dropdown-item' href='#'>Realizar un viaje</a></li>";
                echo    "<li><a class='dropdown-item' href='#'>Mis viajes</a></li>";
                 echo    "<li><a class='dropdown-item' href='#'>Mi usuario</a></li>";
                echo  "</ul>";
                echo "</li>";
                // Boton de cerrar sesion
                echo "<li class='nav-item'>";
                echo "  <form method='post' action='cerrar.php'>";
                echo "    <input type='submit' class='nav-link sin-estilo' style='margin-top: 8px; margin-right:-15px;' href='#' value='Cerrar sesión'>";
                echo "  </form>";
                echo "</li>";      
              }
            ?>
            <!-- <a style='margin-right: -10px;' class='nav-link' href='login.html' data-toggle='modal'
              data-target='.bd-example-modal-lg'>Ingresar</a> -->
            <!-- <button type="button" class="btn btn-secondary" data-toggle="modal"
              data-target=".bd-example-modal-lg">Ingresar</button> -->
          </ul>
        </div>
      </div>
    </nav>

  <div class="container">
    <div class="" style="margin-top: 100px; text-align: center; font-size: 60px;">
      <p style="font-weight: bold; color: #333333;">Nosotros</p>
    </div>
    <h2 style="color:#333333; padding-left: 20px;">¿Quiénes somos?</h2>
    <h5 style="padding:20px 40px 20px 40px; color: #868686; font-weight: 400;">
      PuraVidaTours es una empresa que nació enfocada en el área de turismo nacional, así como para facilitar las necesidades 
      de nuestros clientes, hoy día brindamos servicios complementarios en áreas importantes tales como salud, educación, 
      bienes raíces, comercios afiliados, publicidad y mucho más, con el principal interés de brindar la mayor calidad 
      posible de un servicio completo creado para el goce de toda la familia.</h5><br>
    <h2 style="color:#333333;padding-left: 20px;">Integrantes</h2>
    <br>
    <div class="row">
      <div class="column">
        <div class="card">
          <img src="img/pfp.png" style="width:100%">
          <div class="container">
            <br>
            <h2>Jose Esteban</h2>
            <p class="title">Diseñador</p>
            <div style="color: #868686;">
              <p>jazofeifaz233@ulacit.ed.cr</p>
            </div> 
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="img/pfp.png" style="width:100%">
          <div class="container">
            <br>
            <h2>Jocsan Barquero</h2>
            <p class="title">Diseñador</p>
            <p></p>
            <div style="color: #868686;">
              <p>jbarqueroc064@ulacit.ed.cr</p>
            </div>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="img/pfp.png" style="width:100%">
          <div class="container">
            <br>
            <h2>Diego Reynieri</h2>
            <p class="title">Diseñador</p>
            <div style="color: #868686;">
              <p>dcoream377@ulacit.ed.cr</p>
            </div> 
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="img/pfp.png" style="width:100%">
          <div class="container">
            <br>
            <h2>Moisés Badilla</h2>
            <p class="title">Diseñador</p>
            <div style="color: #868686;">
              <p>mbadillal667@ulacit.ed.cr</p>
            </div>
            <p><button class="button">Contact</button></p>
          </div>
        </div>
      </div>
    </div>

    <div style="margin-top: 170px;"></div>
    <div class="container">
      <h1>Nuestras recomendaciones</h1>
      <hr style="color: #b1b1b1;">
      <div class="news-cards">
        <div>
          <img src="img/news1.jpg" alt="" />
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Ver más <i class="fas fa-angle-double-right"></i></a>
        </div>
        <div>
          <img src="img/news2.jpg" alt="" />
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Ver más <i class="fas fa-angle-double-right"></i></a>
        </div>
        <div>
          <img src="img/news3.jpg" alt="" />
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Ver más <i class="fas fa-angle-double-right"></i></a>
        </div>
        <div>
          <img src="img/news4.jpg" alt="" />
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Ver más <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>
    </div>

    <section class="social">
      <p>Follow PuraVidaTours</p>
      <div class="links">
        <a href="https://facebook.com">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://linkdin.com">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </section>
  </div>

  <style>
    body {
      margin-top: 20px;
    }

    .footer_area {
      position: relative;
      z-index: 1;
      overflow: hidden;
      box-shadow: 0 8px 48px 8px #0000002d;
      padding: 60px;
    }

    .footer_area .row {
      margin-left: -25px;
      margin-right: -25px;
    }

    .footer_area .row .col,
    .footer_area .row .col-1,
    .footer_area .row .col-10,
    .footer_area .row .col-11,
    .footer_area .row .col-12,
    .footer_area .row .col-2,
    .footer_area .row .col-3,
    .footer_area .row .col-4,
    .footer_area .row .col-5,
    .footer_area .row .col-6,
    .footer_area .row .col-7,
    .footer_area .row .col-8,
    .footer_area .row .col-9,
    .footer_area .row .col-auto,
    .footer_area .row .col-lg,
    .footer_area .row .col-lg-1,
    .footer_area .row .col-lg-10,
    .footer_area .row .col-lg-11,
    .footer_area .row .col-lg-12,
    .footer_area .row .col-lg-2,
    .footer_area .row .col-lg-3,
    .footer_area .row .col-lg-4,
    .footer_area .row .col-lg-5,
    .footer_area .row .col-lg-6,
    .footer_area .row .col-lg-7,
    .footer_area .row .col-lg-8,
    .footer_area .row .col-lg-9,
    .footer_area .row .col-lg-auto,
    .footer_area .row .col-md,
    .footer_area .row .col-md-1,
    .footer_area .row .col-md-10,
    .footer_area .row .col-md-11,
    .footer_area .row .col-md-12,
    .footer_area .row .col-md-2,
    .footer_area .row .col-md-3,
    .footer_area .row .col-md-4,
    .footer_area .row .col-md-5,
    .footer_area .row .col-md-6,
    .footer_area .row .col-md-7,
    .footer_area .row .col-md-8,
    .footer_area .row .col-md-9,
    .footer_area .row .col-md-auto,
    .footer_area .row .col-sm,
    .footer_area .row .col-sm-1,
    .footer_area .row .col-sm-10,
    .footer_area .row .col-sm-11,
    .footer_area .row .col-sm-12,
    .footer_area .row .col-sm-2,
    .footer_area .row .col-sm-3,
    .footer_area .row .col-sm-4,
    .footer_area .row .col-sm-5,
    .footer_area .row .col-sm-6,
    .footer_area .row .col-sm-7,
    .footer_area .row .col-sm-8,
    .footer_area .row .col-sm-9,
    .footer_area .row .col-sm-auto,
    .footer_area .row .col-xl,
    .footer_area .row .col-xl-1,
    .footer_area .row .col-xl-10,
    .footer_area .row .col-xl-11,
    .footer_area .row .col-xl-12,
    .footer_area .row .col-xl-2,
    .footer_area .row .col-xl-3,
    .footer_area .row .col-xl-4,
    .footer_area .row .col-xl-5,
    .footer_area .row .col-xl-6,
    .footer_area .row .col-xl-7,
    .footer_area .row .col-xl-8,
    .footer_area .row .col-xl-9,
    .footer_area .row .col-xl-auto {
      padding-right: 25px;
      padding-left: 25px;
    }

    .single-footer-widget {
      position: relative;
      z-index: 1;
    }

    .single-footer-widget .copywrite-text a {
      color: #747794;
      font-size: 1rem;
    }

    .single-footer-widget .copywrite-text a:hover,
    .single-footer-widget .copywrite-text a:focus {
      color: #3f43fd;
    }

    .single-footer-widget .widget-title {
      margin-bottom: 1.5rem;
    }

    .single-footer-widget .footer_menu li a {
      color: #747794;
      margin-bottom: 1rem;
      display: block;
      font-size: 1rem;
    }

    .single-footer-widget .footer_menu li a:hover,
    .single-footer-widget .footer_menu li a:focus {
      color: #3f43fd;
    }

    .single-footer-widget .footer_menu li:last-child a {
      margin-bottom: 0;
    }

    .footer_social_area {
      position: relative;
      z-index: 1;
    }

    .footer_social_area a {
      border-radius: 50%;
      height: 40px;
      text-align: center;
      width: 40px;
      display: inline-block;
      background-color: #f5f5ff;
      line-height: 40px;
      -webkit-box-shadow: none;
      box-shadow: none;
      margin-right: 10px;
    }

    .footer_social_area a i {
      line-height: 36px;
    }

    .footer_social_area a:hover,
    .footer_social_area a:focus {
      color: #ffffff;
    }

    @-webkit-keyframes bi-cycle {
      0% {
        left: 0;
      }

      100% {
        left: 100%;
      }
    }

    @keyframes bi-cycle {
      0% {
        left: 0;
      }

      100% {
        left: 100%;
      }
    }

    ol li,
    ul li {
      list-style: none;
    }

    ol,
    ul {
      margin: 0;
      padding: 0;
    }
  </style>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <footer class="footer_area section_padding_130_0">
    <div class="container">
      <div class="row">
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Footer Logo-->
            <div class="footer-logo mb-3"></div>
            <p>PuraVidaTours, tu sitio de <br>viajes preferido.</p>
          </div>
        </div>
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title">Sobre nosotros</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <li><a href="nosotros.html">Nosotros</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title">Soporte</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="privacidad.html">Politica de privacidad</a></li>
                <li><a href="terminos.html">Términos &amp; Condiciones</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <footer class="footer">
    <h3 style="font-weight: 400;">PuraVidaTours Copyright</h3>
  </footer>

  <!-- Scroll Reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="main.js"></script>
  </div>
</body>

</html>