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
  <title>PuraVidaTours | Reserva tu hotel</title>
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

    .wrapper {
      border: 1px solid #00000038;
      overflow: hidden;
      height: 350px;
      max-width: auto;
      box-shadow: 0 4px 8px 0 #00000033;
      border-radius: 4px;
    }

    .first {
      max-width: 350px;
      height: auto;
      float: left;
    }

    .second {
      overflow: hidden;
      width: auto;
      padding: 35px;
    }

    .sin-estilo {
      border: none;
      padding: 0;
      background: none;
    }
    .bg {
      background-image: url(./img/bannerlogin.png);
      background-position: center center;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <!-- Large modal -->
  <script>
    $('#myModal').modal(options)
  </script>

  <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="container w-100 bg-white  rounded-3 shadow">
          <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
            </div>
            <div class="col bg-white p-5 rounded-end">
              <div align="right">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <h2 class="fw-bold text-center py-5">¡Bienvenido a PuraVidaTours!</h2>

              <!-- Login form -->
              <form action="login.php" method="POST" class="was-validated" onsubmit="MultipleTransaccion()">
                <div class="mb-4">
                  <label for="correo" class="form-label">Correo electronico:</label>
                  <input required type="email" class="form-control" name="correo" id="correo">
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Contraseña:</label>
                  <input required type="password" class="form-control" name="password" id="password">
                </div>
                <?php
                  if(isset($_SESSION["error"])) {
                    $error = $_SESSION["error"];
                    echo "<div style='padding-bottom: 20px; margin-top: -18px;'>";
                    echo "  <span style='color:#ff0000;'>$error</span>";
                    echo "</div>";
                  }
                ?>
                <div class='d-grid'>
                  <button type='submit' name='but_login' id='but_login' class='btn btn-success'>Iniciar sesión</button>
                </div>
                <br>
                <div class="my-3 text-center">
                  <span>¿No tienes cuenta aún? <a href="register.php">Regístrate</a></span><br><br>
                  <span><a href="javascript:history.back()">Atrás</a></span>
                </div>
              </form> <!-- Se cierra el form del Login -->
              <!-------------------------------->
            </div>
          </div>
          <div><input type="button" id="IdPersona" onclick="SetId()" disabled hidden></div>
        </div>
      </div>
    </div>
  </div>

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
    <div class="slideshow-container">
      <div class="mySlides">
        <div class="numbertext">1/3</div>
        <img src="./img/hotelSlide1.jpg" style="width:100%">
      </div>
  
      <div class="mySlides">
        <div class="numbertext">2/3</div>
        <img src="./img/hotelSlide2.jpg" style="width:100%">
      </div>
  
      <div class="mySlides">
        <div class="numbertext">3/3</div>
        <img src="./img/hotelSlide3.jpg" style="width:100%">
      </div>
  
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);
  
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
  
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
  
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>

    <div style="margin-top: 70px;"></div>
    <h1>Hoteles Disponibles</h1>
    <hr>
    <!-- PHP -->
    <?php
      require_once "config.php";

      // Solo se muestran los 3 primeros
      $sql = "SELECT * FROM tours.hotel LIMIT 3";
      if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo "<div class='wrapper'>";
            echo   "<div class='first'>";
            echo      "<img src='img/hoteles/" . $row['imagen'] . "' style='width: 100%; padding: 12px; border-radius: 15px;'/>";
            echo  "</div>";
            echo  "<div class='second'>";
            echo    "<h4 style='font-weight: bold; color: #0077d8; padding-bottom: 5px;'>" . $row['nombre'] . "</h4>";
            echo    "<h5 style='font-weight: 400;'>" . substr($row['descripcion'], 0, 450) . "...</h5>";
            echo    "<div style='padding-top: 10px;'>";
            echo      "<h5>Precio: <span style='font-weight: bold; color: #319424;'>CRC " . number_format($row['costo']) . "</span>";
            echo       "<span style='color: #272727; font-weight: 400; font-size: 14px; padding-left: 5px;'> por noche</span></h5>";
            echo    "</div>";
            echo    "<br>";
            echo    "<a href='#' style='font-weight: bold; font-size: 18px;' class='btn btn-success'>Ver más</a>";
            echo  "</div>";
            echo "</div>";
            echo "<br>";
          }
          $sql_ = "SELECT COUNT(*) as cantidad FROM tours.hotel";
          if ($result = mysqli_query($con, $sql_)) {
            if (mysqli_num_rows($result) > 0) {
              if (($row = mysqli_fetch_array($result))) {
                if ($row['cantidad'] > 3) {
                  echo "<br>";
                  echo "<div class='d-grid gap-4'>";
                  echo   "<button class='btn btn-success' id='ver_mas' name='ver_mas'";
                  echo    "style='padding-top:10px;padding-bottom:10px;font-size:20px' type='button'>Ver más</button>";
                  echo "</div>";
                }
              }
            }
          }
          // Free result set
          mysqli_free_result($result);
        } else {
          echo '<div class="alert alert-danger"><em>No hay hoteles en el sistema.</em></div>';
        }
      } else {
        echo "<div class='alert alert-danger'><span>¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.</span></div>";
      }
      
      mysqli_close($con);
    ?>

  <div style="margin-top: 150px;"></div>
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

  <div style="margin-top: 150px;"></div>
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