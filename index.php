<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PuraVidaTours</title>
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="stylelogin.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="animaciones.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<style>
  body {
    background-image:
      linear-gradient(#000000ab,
        #000000ef),
      url(./img/indexbg.jpg);
    background-attachment: fixed;

  }

  .bg {
    background-image: url(./img/bannerlogin.png);
    background-position: center center;
    border-radius: 5px;
  }
</style>




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


  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="container w-100 bg-white  rounded-3 shadow">
          <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
            </div>
            <div class="col bg-white p-5 rounded-end">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 class="fw-bold text-center py-5">¡Bienvenido a PuraVidaTours!</h2>

              <!-- Login -->
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
                <div class="d-grid">
                  <button type="submit" name="but_login" id="but_login" class="btn btn-success">Iniciar sesión</button>
                </div>
                <br>
                <div class="my-3 text-center">
                  <span>¿No tienes cuenta aún? <a href="register.html">Regístrate</a></span><br><br>
                  <span><a href="javascript:history.back()">Atrás</a></span>
                </div>
              </form> <!-- Se cierra el Login -->
              <!-------------------------------->
            </div>
          </div>
          <div><input type="button" id="IdPersona" onclick="SetId()" disabled hidden></div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="menu-btn">
      <i class="fas fa-bars fa-2x"></i>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-custom-2 bg-shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./img/PuravidaTours.png" width="30" height="30" class="d-inline-block align-top" alt="">
          PuraVidaTours
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="destinos.html">Destinos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="hotel.html">Hoteles</a></li>
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
                <li><a class="dropdown-item" href="reglas.html">Reglas para viajar</a></li>
                <li><a class="dropdown-item" href="recomendaciones.html">Recomendaciones</a></li>
                <li><a class="dropdown-item" href="nosotros.html">Nosotros</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="contacto.html">Contacto</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav mb-lg-0">
            <li class="nav-item">
              <a style="margin-right: -10px;" class="nav-link" href="login.html" data-toggle="modal"
                data-target=".bd-example-modal-lg">Ingresar</a>
              <!-- <button type="button" class="btn btn-secondary" data-toggle="modal"
                data-target=".bd-example-modal-lg">Ingresar</button> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>

    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./img/img1.jpg" alt="First slide">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h1 class="animate__animated animate__zoomInUp animate__slow">First slide label</h1>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div> -->
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./img/img2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./img/img3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- NEWS CARDS -->
    <div class="news-cards ">
      <div class="cards-glass animate__animated animate__fadeInLeft animate__delay-2s">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news1.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass animate__animated animate__fadeInLeft">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news2.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass animate__animated animate__fadeInRight">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news3.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass animate__animated animate__fadeInRight animate__delay-2s">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news4.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>
    </div>

    <!-- Card Banner 1-->
    <section class="cards-banner-one">
      <div class="content" style="font-size: 20px;">
        <h2>Lorem, ipsum dolor.</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat maxime facilis quasi alias illo, fugiat
          cupiditate porro dolores tenetur delectus!</p>
        <a href="#" style="color: white;">Learn More<i class="fas fa-chevron-right"></i></a>
      </div>
    </section>

    <!-- NEWS CARDS -->
    <div class="news-cards">
      <div class="cards-glass ">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news1.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass ">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news2.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass ">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news3.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>

      <div class="cards-glass ">
        <div class="overflow-cards">
          <div class="card-img-top"><img src="img/news4.jpg" alt="" />
          </div>
        </div>
        <div class="font-cards">
          <h3>Lorem, ipsum dolor.</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore fugit esse corporis nesciunt minima
            doloremque modi mollitia rerum, similique optio eligendi itaque amet qui ullam vel incidunt asperiores fuga?
          </p>
          <a href="#">Learn More <i class="fas fa-angle-double-right"></i></a>
        </div>
      </div>
    </div>


    <!-- third card -->
    <section class="cards-banner-two">
      <div class="content">
        <h2>Lorem, ipsum dolor.</h2>
        <!-- lorem 30 -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut qui laudantium id quam magni accusantium,
          veritatis, ipsam labore, reprehenderit dolore repudiandae nemo sint deserunt! Suscipit facilis qui inventore
          consequatur fugit.</p>
        <a href="#" class="btn">Learn More <i class="fas fa-chevron-right"></i></a>
      </div>
    </section>

    <!-- Follow -->
    <section class="social">
      <div style="padding-top: 100px;"></div>
      <p style="color: #ffffff;">Follow PuraVidaTours</p>
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
  <footer class="footer_area section_padding_130_0" style="background-color: #ffffff;">
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
</body>

</html>

<?php
    unset($_SESSION["error"]);
?>