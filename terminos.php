<?php
  session_start();

  if(isset($_SESSION["correo"])) {
    $correo = $_SESSION["correo"];
  }
  if (isset($_SESSION["logeado"])) {
    if ($_SESSION["logeado"]==2) {
      header('Location: admin/dashboard.php');
      return;
    }
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
              echo    "<li><a class='dropdown-item' href='realizar_viaje.php'>Realizar un viaje</a></li>";
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

  <div style="margin-top: 100px"></div>
  <div class="container">
    <p style="font-size: 40px; margin-top: 55px; margin-bottom: 30px; background-color: #cfcfcf; padding: 30px;">TÉRMINOS Y CONDICIONES</p>
    <div><strong>1.</strong>&nbsp;<strong>Pol&iacute;tica de Privacidad</strong></div>
    <p>puravidatours.com (en adelante &ldquo;PuraVidaTours; o &ldquo;Nosotros&rdquo;) valora a sus usuarios y
      est&aacute; comprometida a proteger su privacidad. En el desempe&ntilde;o de dicho compromiso, PuraVidaTours
      ha desarrollado esta pol&iacute;tica de privacidad (en adelante, la &ldquo;Pol&iacute;tica de Privacidad&rdquo; o
      &ldquo;Pol&iacute;tica&rdquo;) que describe las pol&iacute;ticas y pr&aacute;cticas de PuraVidaTours en lo
      que se refiere a la recolecci&oacute;n, uso y divulgaci&oacute;n de informaci&oacute;n personal recopilada. Al
      visitar, utilizar y/o registrarse en este sitio web (en adelante, el &ldquo;Sitio Web&rdquo;), usted como usuario
      del mismo (en adelante, &ldquo;Usted&rdquo;), acepta las pr&aacute;cticas que se detallan a continuaci&oacute;n.
      Esta Pol&iacute;tica contiene las pr&aacute;cticas de privacidad del Sitio Web operado por PuraVidaTours, en
      cumplimiento de las leyes aplicables.</p>
    <p><strong>2.</strong>&nbsp;<strong>Informaci&oacute;n Recopilada</strong></p>
    <p>PuraVidaTours recibe y almacena informaciones personales que sean relacionadas directamente con los
      servicios ofrecidos por PuraVidaTours que los usuarios proporcionen al navegar por el Sitio Web de Viajes
      Col&oacute;n, al utilizar nuestros servicios en l&iacute;nea, ya sea al proporcionarlos de manera
      telef&oacute;nica en nuestro centro de atenci&oacute;n, al participar en promociones y ofertas, al registrarse
      como usuario, v&iacute;a correo electr&oacute;nico, informaci&oacute;n publicada en los foros, grupos de chat o
      comentarios mediante los cuales Usted interact&uacute;e en el Sitio Web, o de cualquier forma cuando contrata con
      Nosotros alg&uacute;n producto o servicio. La informaci&oacute;n recopilada (en adelante la
      &ldquo;Informaci&oacute;n Personal&rdquo;) incluye &ndash;entre otros- nombre y apellido, nacionalidad,
      n&uacute;mero telef&oacute;nico, n&uacute;mero de c&eacute;dula de identidad o n&uacute;mero de pasaporte,
      direcci&oacute;n de correo electr&oacute;nico, y si Usted hace una reserva a trav&eacute;s de nuestro Sitio Web,
      la informaci&oacute;n sobre su tarjeta de cr&eacute;dito (tal como el n&uacute;mero de la tarjeta de
      cr&eacute;dito, el nombre del titular de la tarjeta y la fecha de vencimiento). Tambi&eacute;n podremos solicitar
      informaci&oacute;n sobre programas de fidelidad y viajero frecuente. Usted podr&aacute; elegir no darnos
      informaci&oacute;n, pero en general se requiere cierta informaci&oacute;n sobre Usted para comprar, realizar
      transacciones en nuestro Sitio Web, si Usted elige no brindarnos determinada informaci&oacute;n, entonces no
      podr&aacute; hacer uso de nuestros servicios. En caso que Usted realice una reserva en nombre de un tercero,
      deber&aacute; obtener previamente el consentimiento de dicho tercero antes de facilitarnos su Informaci&oacute;n
      Personal. Adicionalmente, PuraVidaTours podr&aacute; grabar o controlar para prop&oacute;sitos de control de
      calidad y de formaci&oacute;n del personal, las llamadas realizadas a nuestro centro de atenci&oacute;n al
      cliente. Las grabaciones de las llamadas se retendr&aacute;n durante el tiempo que sea razonablemente necesario y
      posteriormente se borrar&aacute;n, a entera discreci&oacute;n de PuraVidaTours.</p>
    <p><strong>3.</strong>&nbsp;<strong>Otra Informaci&oacute;n Recopilada</strong></p>
    <p>En la medida permitida por la Ley, PuraVidaTours podr&aacute; obtener Informaci&oacute;n Personal sobre
      Usted y a&ntilde;adirla a la Informaci&oacute;n Personal que Usted nos proporciona ya sea de entidades afiliadas,
      socios comerciales, como ser bases de datos p&uacute;blicas, informaci&oacute;n recopilada durante una
      conversaci&oacute;n telef&oacute;nica con el centro de atenci&oacute;n al cliente y/o a trav&eacute;s de
      aplicaciones interactivas. Tenga en cuenta que toda la informaci&oacute;n que recopilamos sobre Usted puede
      combinarse con la Informaci&oacute;n Personal para, por ejemplo ayudarnos a adaptar nuestras comunicaciones a sus
      necesidades y desarrollar nuevos productos o servicios que puedan ser de su inter&eacute;s. Cualquier
      Informaci&oacute;n Personal obtenida por PuraVidaTours por los medios aqu&iacute; descritos ser&aacute;
      tratada de conformidad con las disposiciones de esta Pol&iacute;tica de Privacidad. Tal como establece esta
      Pol&iacute;tica m&aacute;s abajo, esta Pol&iacute;tica no cubre las pr&aacute;cticas de aquellos terceros de los
      cuales recibimos informaci&oacute;n.</p>
    <p><strong>4.</strong>&nbsp;<strong>Autorizaci&oacute;n de Registro y Tratamiento de la Informaci&oacute;n
        Personal</strong></p>
    <p>Al visitar, utilizar y/o registrarse en el Sitio Web Usted, autoriza expresamente a PuraVidaTours, a
      registrar y tratar su Informaci&oacute;n Personal para entre otros, los siguientes fines: llevar a cabo las
      transacciones que usted haya iniciado; ofrecerle productos y servicios; enviarle confirmaci&oacute;n y
      actualizaciones sobre su viaje; procesamiento de facturas; responder a sus preguntas y comentarios; contactarnos
      con Usted para prop&oacute;sitos de servicio al cliente, realizar encuestas, estad&iacute;sticas o an&aacute;lisis
      sobre h&aacute;bitos de consumo o preferencias, notificarle por correo electr&oacute;nico las ofertas especiales y
      los productos y servicios relacionados con viajes que podr&iacute;an serle de inter&eacute;s salvo que usted no lo
      desee (ver m&aacute;s adelante: pol&iacute;tica de renuncia (Opt. Out). Asimismo, utilizamos la informaci&oacute;n
      de las tarjetas de cr&eacute;dito (tal como nombre del titular de la tarjeta, n&uacute;mero de la tarjeta de
      cr&eacute;dito y fecha de vencimiento) solamente para el prop&oacute;sito de completar las reservas de viaje que
      Usted realiza en nuestro Sitio Web, incluyendo el env&iacute;o de sus datos a los Prestatarios Finales de
      servicios, para gestionar sus reservas y/o solicitudes de compra. Asimismo, Usted puede optar porque Viajes
      Col&oacute;n recuerde ciertos datos de su tarjeta de cr&eacute;dito y facturaci&oacute;n, los cuales
      aparecer&aacute;n en forma autom&aacute;tica al ingresar al Sitio Web PuraVidaTours. Al recopilar la
      Informaci&oacute;n Personal para publicidad o venta directa y otras actividades an&aacute;logas, le dar&aacute; el
      tratamiento correspondiente seg&uacute;n lo prescrito por las leyes aplicables.</p>
    <p><strong>5.</strong>&nbsp;<strong>Almacenamiento y Transferencia de Informaci&oacute;n Personal.
        Consentimiento</strong></p>
    <p>Toda Informaci&oacute;n Personal es recolectada y almacenada en servidores ubicados f&iacute;sicamente en Costa
      Rica. PuraVidaTours puede reubicar estos servidores en cualquier otro pa&iacute;s, en el futuro, y puede
      almacenar Informaci&oacute;n Personal en Costa Rica o en otros pa&iacute;ses, con fines de respaldo o back up.
      Usted presta su consentimiento inequ&iacute;voco para que PuraVidaTours pueda transferir sus datos con
      destino a cualquier pa&iacute;s del mundo.</p>
    <p>Al remitir Informaci&oacute;n Personal en el Sitio Web, Usted autoriza y presta su consentimiento libre e
      informado, clara, veraz y oportunamente para que, de conformidad con la legislaci&oacute;n aplicable y nuestra
      Pol&iacute;tica de Privacidad, PuraVidaTours recopile, utilice y almacene su Informaci&oacute;n Personal
      para (I) proveer los productos y servicios que usted solicite; y (II) enviarle informaci&oacute;n relevante en
      forma personalizada incluido pero no limitado a la promoci&oacute;n de los productos y servicios.</p>
    <p>En el caso de transferencia de datos personales, se informa que el receptor de los datos personales
      asumir&aacute; las mismas obligaciones que corresponden al responsable que transfiere los datos personales.</p>
    <p><strong>6.</strong>&nbsp;<strong>Custodia y Confidencialidad de la Informaci&oacute;n Personal</strong></p>
    <p>La Informaci&oacute;n Personal ser&aacute; tratada con el grado de protecci&oacute;n legalmente exigible para
      garantizar la seguridad de la misma y evitar su alteraci&oacute;n, p&eacute;rdida, tratamiento o acceso no
      autorizado.</p>
    <p>PuraVidaTours resguarda su Informaci&oacute;n Personal de acuerdo a est&aacute;ndares y procedimientos de
      seguridad y confidencialidad impuestas por la legislaci&oacute;n aplicable. PuraVidaTours no transmite,
      divulga o proporciona la Informaci&oacute;n Personal recopilada a terceros diferentes del titular de dicha
      Informaci&oacute;n Personal y/o aquellos terceros descritos en la presente Pol&iacute;tica. En este sentido, este
      Sitio Web toma los recaudos para proteger la Informaci&oacute;n Personal de los usuarios.</p>
    <p><strong>7.</strong>&nbsp;<strong>Acceso a la Informaci&oacute;n Personal por Terceros</strong></p>
    <p>Usted presta su consentimiento inequ&iacute;voco para que PuraVidaTours pueda compartir la
      Informaci&oacute;n Personal relevante de sus usuarios con prestatarios finales para la gesti&oacute;n de sus
      reservas y/o solicitudes de compra, tales como aerol&iacute;neas, hoteles, compa&ntilde;&iacute;as arrendadoras de
      autos, mayoristas de viajes, y otros prestatarios finales de productos y servicios que Usted contrate por nuestro
      Sitio Web. Tambi&eacute;n podr&iacute;amos autorizar a prestatarios finales de servicios a recopilar
      Informaci&oacute;n Personal en nuestro nombre, incluyendo seg&uacute;n sea necesario para operar ciertos elementos
      de nuestro Sitio Web o para facilitar la entrega de publicidad en l&iacute;nea adaptada a sus intereses.
      Adem&aacute;s, PuraVidaTours podr&aacute; compartir Informaci&oacute;n Personal con socios comerciales, con
      quienes conjuntamente podr&iacute;amos ofrecer productos o servicios. Dichos prestatarios finales y socios
      comerciales est&aacute;n sujetos a contratos de confidencialidad que proh&iacute;ben la utilizaci&oacute;n o
      divulgaci&oacute;n no autorizada de la Informaci&oacute;n Personal a la cual tienen acceso. PuraVidaTours
      podr&aacute; compartir tambi&eacute;n su Informaci&oacute;n Personal con la finalidad de cumplir la normativa
      aplicable y cooperar con las autoridades competentes. Finalmente, PuraVidaTours podr&aacute; tambi&eacute;n
      compartir su Informaci&oacute;n Personal con las empresas relacionadas a puravidatours.com, como son todas aquellas
      que formen parte del Grupo Col&oacute;n. El acceso a la informaci&oacute;n personal por tercero se regir&aacute;
      por la pol&iacute;tica de renuncia (opt out) descrita en el numeral inmediato siguiente.</p>
    <p><strong>8.</strong>&nbsp;<strong>Pol&iacute;tica de renuncia (opt out)</strong></p>
    <p>Cuando Usted realice transacciones o se registre como usuario en PuraVidaTours, se le dar&aacute; una
      opci&oacute;n en cuanto a si desea recibir env&iacute;os promocionales, mensajes o alertas de correo
      electr&oacute;nico sobre ofertas. Usted podr&aacute; modificar sus elecciones en cualquier momento, a
      trav&eacute;s de la configuraci&oacute;n de correo electr&oacute;nico de la p&aacute;gina puravidatours.com. Aunque
      actualmente no lo hace, PuraVidaTours se reserva el derecho de restringir la inscripci&oacute;n en el futuro
      a aquellos usuarios que aceptan recibir env&iacute;os promocionales, mensajes o alertas de correo
      electr&oacute;nico. Tambi&eacute;n se le dar&aacute; en cada mensaje de correo electr&oacute;nico que le enviemos
      la oportunidad de darse de baja en la suscripci&oacute;n a la recepci&oacute;n de mensajes.</p>
    <p><strong>9.</strong>&nbsp;<strong>Derechos de acceso, cancelaci&oacute;n, rectificaci&oacute;n y oposici&oacute;n
        de la Informaci&oacute;n Personal</strong></p>
    <p>Los usuarios, titulares de la Informaci&oacute;n Personal tienen reconocidos y podr&aacute;n ejercitar los
      derechos de acceder, cancelar y actualizar su Informaci&oacute;n Personal, as&iacute; como a oponerse al
      tratamiento de la misma y a ser informado de las cesiones llevadas a cabo, en forma gratuita a intervalos no
      inferiores a seis meses, salvo que se acredite un inter&eacute;s leg&iacute;timo al efecto tienen la
      atribuci&oacute;n de atender las denuncias y reclamos que se interpongan con relaci&oacute;n al incumplimiento de
      las normas sobre protecci&oacute;n de datos personales.</p>
    <p>Los usuarios garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de la
      Informaci&oacute;n Personal facilitada, y se comprometen a mantenerla debidamente actualizada.</p>
    <p>Los derechos antes descritos se ejercen por escrito a trav&eacute;s de la presentaci&oacute;n de la solicitud
      respectiva San Jos&eacute;, Costa Rica, Paseo Col&oacute;n, apartado postal 986-1007 Centro Col&oacute;n.</p>
    <p>En su solicitud deber&aacute; indicar su nombre completo y, en su caso, documento que acredite la
      representaci&oacute;n legal del titular, adjuntar copia simple de su c&eacute;dula de identidad, indicaci&oacute;n
      de su correo electr&oacute;nico y direcci&oacute;n postal que designe para notificaciones y alg&uacute;n
      n&uacute;mero telef&oacute;nico de contacto; y descripci&oacute;n clara y precisa de los datos personales respecto
      de los que busca ejercer el derecho de acceso, rectificaci&oacute;n y cancelaci&oacute;n y documentos que
      sustenten el cambio.</p>
    <p>Una vez cumplido con los requisitos antes detallados, y siempre que correspondiera hacer lugar a la solicitud,
      PuraVidaTours le comunicar&aacute; a Usted si ha procedido a dar lugar a la misma o si rechaza el pedido.
    </p>
    <p>Asimismo, usted puede acceder, actualizar y corregir su informaci&oacute;n de registro en cualquier tiempo
      accediendo a puravidatours.com.</p>
    <p><strong>10. &Aacute;mbito de nuestro servicio</strong></p>
    <p>A trav&eacute;s de este sitio web, PuraVidaTours y/o sus prestatarios finales proporcionamos una plataforma
      en l&iacute;nea a trav&eacute;s de la cual todos los tipos de alojamiento temporal (por ejemplo, hoteles, moteles,
      albergues en conjunto el/los "alojamiento/s") ofertan sus habitaciones y los usuarios de la p&aacute;gina web
      pueden realizar reservas, as&iacute; como tarifas a&eacute;reas, renta de autos, seguros de viaje. Al llevar a
      cabo una reserva mediante puravidatours.com, establece Usted una relaci&oacute;n contractual directa (legalmente
      vinculante) con el establecimiento en el que ha reservado. Desde el momento en que realiza su reserva, Nosotros
      actuamos &uacute;nicamente como intermediarios entre Usted y el establecimiento, trasmitiendo los datos de la
      reserva al establecimiento y le enviamos un correo electr&oacute;nico de confirmaci&oacute;n en
      representaci&oacute;n del establecimiento.</p>
    <p>La informaci&oacute;n que mostramos est&aacute; basada en la informaci&oacute;n que nos proporcionan los
      establecimientos. Aunque intentamos que nuestro servicio sea lo m&aacute;s preciso posible, no podemos verificar
      ni garantizar que toda la informaci&oacute;n sea exacta, completa o correcta. Tampoco nos hacemos responsables de
      errores (como errores manifiestos y tipogr&aacute;ficos), interrupciones (debido a ca&iacute;das temporales y/o
      parciales del servidor o a reparaciones, actualizaciones y mantenimiento de nuestro sitio web u otros motivos),
      informaci&oacute;n imprecisa, enga&ntilde;osa o falsa, o falta de informaci&oacute;n. El establecimiento es
      responsable en todo momento de la precisi&oacute;n, la exactitud y la correcci&oacute;n de la informaci&oacute;n
      (tanto descriptiva como referente a tarifas y disponibilidad) que aparece en nuestro sitio web. Nuestro sitio web
      no constituye ni debe ser visto como una recomendaci&oacute;n o promoci&oacute;n de la calidad, el nivel de
      servicio, la calificaci&oacute;n o clasificaci&oacute;n (por estrellas) de cualquier establecimiento disponible.
    </p>
    <p>Tenga presente que cuando accede al Sitio Web de PuraVidaTours nosotros autom&aacute;ticamente recibimos
      informaci&oacute;n sobre Usted y su computadora. Por ejemplo, recibimos informaci&oacute;n de cookies (ver
      definici&oacute;n m&aacute;s abajo), web beacons (ver definici&oacute;n m&aacute;s abajo) respecto de su navegador
      y su sistema operativo, de las p&aacute;ginas de Internet que ha visitado, de los enlaces que ha visto, de la
      direcci&oacute;n de IP de su computadora y del sitio web que cerr&oacute; antes de ingresar a nuestro Sitio Web.
      PuraVidaTours utiliza la informaci&oacute;n recopilada principalmente para mejorar su experiencia de usuario
      y mejorar nuestro servicio.</p>
    <p>En todo momento, podr&aacute; elegir no recibir un archivo de cookies habilitando su navegador web para que
      rechace cookies o le informe antes de aceptarlas. Tenga en cuenta que al negarse a aceptar una cookie no
      podr&aacute; obtener acceso a muchos servicios de viaje y herramientas de planificaci&oacute;n ofrecidos por este
      Sitio Web. Asimismo, a fin de facilitar las transacciones en nuestro Sitio Web, Usted podr&aacute; elegir que
      PuraVidaTours guarde informaci&oacute;n sobre sus tarjetas de cr&eacute;dito.</p>
    <p>&ldquo;<em>Cookies&rdquo;</em>&nbsp;son archivos de texto que se descargan autom&aacute;ticamente y se almacenan
      en el disco duro de su computadora cuando navega en una p&aacute;gina o en un portal de internet
      espec&iacute;fico, los cuales permiten guardar cierta cantidad de datos sobre su actividad en internet. Las
      cookies se utilizan con el fin de conocer los intereses, el comportamiento y la demograf&iacute;a de quienes
      visitan o son usuarios de nuestro Sitio Web y de esa forma, comprender mejor sus necesidades e intereses y darles
      un mejor servicio o proveerle informaci&oacute;n relacionada. Tambi&eacute;n usaremos la informaci&oacute;n
      obtenida por intermedio de las cookies para analizar las p&aacute;ginas navegadas por el visitante o usuario, las
      b&uacute;squedas realizadas, mejorar nuestras iniciativas comerciales y promocionales, mostrar publicidad o
      promociones, banners de inter&eacute;s, personalizar contenidos, presentaci&oacute;n y servicios.</p>
    <p>&ldquo;<em>Web beacons&rdquo;</em>&nbsp;son im&aacute;genes que pueden aparecer insertadas en p&aacute;ginas y
      sitios web y tienen una finalidad similar a los cookies. Adicionalmente un Web beacon es utilizado para medir
      patrones de tr&aacute;fico de los usuarios de una p&aacute;gina a otra con el objeto de maximizar como fluye el
      tr&aacute;fico a trav&eacute;s de la Web.</p>
    <p><strong>11. Protecci&oacute;n de Contrase&ntilde;as y Acceso</strong></p>
    <p>Al registrarse en puravidatours.com, PuraVidaTours le requiere elegir una identificaci&oacute;n de usuario y
      una contrase&ntilde;a (es decir, acceder a una cuenta personal dentro del Sitio Web). Por lo tanto, si por
      cualquier raz&oacute;n su contrase&ntilde;a llega a estar comprometida, Usted debe de inmediato: (I) cambiarla,
      modificando su informaci&oacute;n de registro que fue entregada a este Sitio Web, y (II) contactarnos.</p>
    <p><strong>12. V&iacute;nculos Externos</strong></p>
    <p>Este Sitio Web puede contener v&iacute;nculos (links) a otros sitios web que tienen sus propias pol&iacute;ticas
      de privacidad y confidencialidad. Por ello le recomendamos que si Usted visita esos otros sitios web, revise
      cuidadosamente sus pr&aacute;cticas y pol&iacute;ticas de confidencialidad, toda vez que esta Pol&iacute;tica de
      Privacidad no cubre las pr&aacute;cticas o pol&iacute;ticas de terceros, incluyendo aquellos que pueden revelar
      y/o compartir informaci&oacute;n con PuraVidaTours.</p>
    <p><strong>13. Informaci&oacute;n P&uacute;blica</strong></p>
    <p>Tenga presente que cuando coloca informaci&oacute;n en un &aacute;rea p&uacute;blica de este Sitio Web (incluido
      sin limitar: avisos, grupos de chat, &aacute;lbumes de fotograf&iacute;as electr&oacute;nicos y comentarios sobre
      los productos y servicios), la est&aacute; poniendo a disposici&oacute;n de otros miembros, usuarios del Sitio Web
      y al p&uacute;blico en general; lo cual queda fuera del &aacute;mbito de control de PuraVidaTours. Por
      favor, recuerde lo anterior y sea cuidadoso con la informaci&oacute;n que decide divulgar.</p>
    <p><strong>14. Responsable de la Protecci&oacute;n de su Informaci&oacute;n Personal</strong></p>
    <p>El responsable de la base de datos en Costa Rica es Agencias de PuraVidaTours. San Jos&eacute; de Costa
      Rica, Paseo Col&oacute;n, avenida 3, calle 36.</p>
    <p><strong>15. Modificaciones</strong></p>
    <p>PuraVidaTours podr&aacute; realizar modificaciones a esta Pol&iacute;tica de Privacidad en el futuro.
      Cualquier modificaci&oacute;n a la manera como PuraVidaTours utiliza la Informaci&oacute;n Personal
      ser&aacute; reflejada en versiones futuras de esta &ldquo;Pol&iacute;tica de Privacidad,&rdquo; y ser&aacute;n
      publicadas en esta p&aacute;gina, por lo que se aconseja revisar peri&oacute;dicamente la Pol&iacute;tica de
      Privacidad.</p>
    <p><strong>16. Contacto</strong></p>
    <p>Si tiene preguntas sobre esta Pol&iacute;tica de Privacidad, las pr&aacute;cticas de PuraVidaTours, o sus
      transacciones en la p&aacute;gina de PuraVidaTours,&nbsp;<a
        href="#">www.puravidatours.com</a>&nbsp;cont&aacute;ctenos por medio de correo
      electr&oacute;nico a contactenos@puravidatours.com.</p>
    <p><strong>17. Uso del sitio web</strong></p>
    <p>Como condici&oacute;n para su uso de este Sitio Web, Usted garantiza que (a) tiene al menos 18 a&ntilde;os; (b)
      que posee la capacidad legal para constituir una obligaci&oacute;n legalmente vinculante; (c) que va a utilizar
      este Sitio Web de conformidad con estas Condiciones de Uso; (d) s&oacute;lo utilizar&aacute; este Sitio Web para
      realizar reservas leg&iacute;timas para Usted o para otra persona en nombre y representaci&oacute;n de la cual
      usted est&aacute; legalmente autorizado para actuar; (c) informar&aacute; a estas otras personas sobre de los
      t&eacute;rminos y condiciones que se aplican a las reservas que Usted a realizado en su nombre, incluyendo todos
      los t&eacute;rminos y restricciones de los prestatario final que le sean aplicables; (e) toda la
      informaci&oacute;n proporcionada por Usted en este Sitio Web es verdadera, precisa, actual y completa, y (f) si
      usted tiene una cuenta de puravidatours.com, velar&aacute; por la informaci&oacute;n de su cuenta y
      supervisar&aacute; y ser&aacute; completamente responsable del uso de la misma por Usted y por nadie m&aacute;s
      que Usted. puravidatours.com tiene derecho a negar el acceso a este Sitio Web y a los servicios que ofrecemos, a
      cualquier persona que, incluyendo, pero sin limitaci&oacute;n, haya infringido estas Condiciones de Uso.</p>
    <p><strong>18. Usos prohibidos</strong></p>
    <p>El contenido y la informaci&oacute;n incluida en este Sitio Web (incluyendo, pero sin limitaci&oacute;n los
      precios y la disponibilidad de servicios de viaje), as&iacute; como la infraestructura utilizada para proporcionar
      dicha informaci&oacute;n y contenido, es de nuestra propiedad o de nuestros Prestatarios finales y
      suministradores. Usted puede hacer copias de su itinerario (y documentos relacionados) relativos a sus viajes o
      servicios reservados a trav&eacute;s de este Sitio Web, pero asimismo Usted se compromete a no modificar, copiar,
      distribuir, transmitir, mostrar, realizar, reproducir, publicar, conceder licencias, crear trabajos derivados,
      transferir o vender o revender cualquier informaci&oacute;n, software, productos o servicios obtenidos de o a
      trav&eacute;s de este Sitio Web. Adem&aacute;s, Usted se compromete a abstenerse de:</p>
    <p>a.&nbsp;Usar este Sitio Web o sus contenidos con fines comerciales;</p>
    <p>b.&nbsp;Realizar cualquier reserva especulativa, falsa o fraudulenta o cualquier reserva en previsi&oacute;n de
      la demanda;</p>
    <p>c.&nbsp;Acceder, controlar o copiar cualquier contenido o informaci&oacute;n incluida en este Sitio Web
      utilizando para ello cualquier tipo de robot, spider, scraper u otro medio autom&aacute;tico, as&iacute; como
      cualquier proceso manual para cualquier prop&oacute;sito, sin nuestro permiso expreso y por escrito;</p>
    <p>d.&nbsp;Infringir las restricciones de cualquier aviso de exclusi&oacute;n de robots incluido en este Sitio Web,
      as&iacute; como, puentear o burlar otras medidas empleadas para prevenir o limitar el acceso a este Sitio Web;</p>
    <p>e.&nbsp;Emprender cualquier acci&oacute;n que imponga o pueda imponer, a nuestro criterio, una carga irrazonable
      o desproporcionadamente grande para nuestra infraestructura;</p>
    <p>f.&nbsp;Establecer un enlace a cualquier contenido de este Sitio Web (incluyendo, sin limitaci&oacute;n, el
      proceso de compra de cualquier servicio de viaje) para cualquier que sea su prop&oacute;sito y sin nuestro permiso
      expreso y por escrito; y/o</p>
    <p>g.&nbsp;Replicar, reflejar o de alg&uacute;n modo incorporar cualquier contenido de este Sitio Web en cualquier
      otro sitio web sin nuestra previa autorizaci&oacute;n y por escrito.</p>
    <p>Si su reserva o cuenta muestra signos razonables de fraude, abuso o de actividad sospechosa, PuraVidaTours
      podr&aacute; cancelar cualquier reserva asociados a su nombre, direcci&oacute;n de correo electr&oacute;nico o
      cuenta, as&iacute; como cerrar todas las cuentas asociadas de PuraVidaTours. Si Usted ha realizado una
      actuaci&oacute;n fraudulenta, de cualquier tipo, PuraVidaTours se reserva el derecho a emprender cualquier
      acci&oacute;n legal necesaria y respecto de la cual Usted puede ser responsable de las p&eacute;rdidas
      patrimoniales sufridas por PuraVidaTours, incluyendo las costas procesales e indemnizaci&oacute;n por
      da&ntilde;os y perjuicios. Usted podr&aacute; impugnar la cancelaci&oacute;n de una reserva, el bloqueo o el
      cierre de una cuenta, a trav&eacute;s del Servicio de Atenci&oacute;n al Cliente comunic&aacute;ndose al
      tel&eacute;fono (506) 2547-2626.</p>
    <p><strong>19. Pol&iacute;tica de Privacidad</strong></p>
    <p>Apreciamos conocer sus opiniones. Tenga en cuenta que al enviar informaci&oacute;n a este Sitio Web por correo
      electr&oacute;nico o comentarios en este Sitio Web o por cualquier otro medio, incluidas las calificaciones de los
      hoteles, preguntas, comentarios, sugerencias, ideas o contenidos similares (colectivamente, "Publicaciones"),
      usted otorga a PuraVidaTours, y sus compa&ntilde;&iacute;as relacionadas (Grupo Col&oacute;n), sitios web
      asociados o vinculados a trav&eacute;s de los cuales ofrecemos nuestros servicios (colectivamente, "Afiliados de
      PuraVidaTours "), una licencia no exclusiva, libre de regal&iacute;as, perpetua, transferible, irrevocable y
      totalmente sublicenciable con derecho a: (a) usar, reproducir, modificar, adaptar, traducir, distribuir, publicar,
      crear trabajos derivados y mostrar p&uacute;blicamente y ejecutar dichas Publicaciones con un alcance mundial y a
      trav&eacute;s de cualquier medios de comunicaci&oacute;n; y (b) usar el nombre que usted env&iacute;e en
      conexi&oacute;n con dichas Publicaciones. Usted reconoce y consciente que las empresas relacionadas a Viajes
      Col&oacute;n pueden incluir referencias en sus comentarios o cr&iacute;ticas (por ejemplo, la inclusi&oacute;n de
      su nombre y su ciudad natal en su opini&oacute;n enviada sobre un hotel) a su discreci&oacute;n, y que tales
      publicaciones pueden ser compartidas con nuestros socios prestatarios finales. Usted asimismo otorga a Viajes
      Col&oacute;n el derecho de perseguir legalmente a cualquier persona o entidad que viole sus derechos o los de las
      empresas relacionadas a PuraVidaTours a trav&eacute;s de las Publicaciones como consecuencia del
      incumplimiento de estas Condiciones de Uso. Usted reconoce y acepta que las Publicaciones no son confidenciales y
      de propiedad no exclusiva. No nos hacemos responsables y no asumimos ninguna responsabilidad por cualquier
      Publicaci&oacute;n enviados por usted. No tenemos la obligaci&oacute;n de publicar sus comentarios; nos reservamos
      el derecho a nuestra absoluta discreci&oacute;n para determinar qu&eacute; comentarios se publican en el Sitio
      Web.</p>
    <p>De vez en cuando ofreceremos a los clientes incentivos, tales como cupones de descuento o derechos a participar
      en promociones y sorteos, para que expresen sus comentarios y opiniones sobre sus estancias de hotel. Ya que es
      importante para nosotros que los comentarios de los pasajeros y/o hu&eacute;spedes, sean imparciales y honestos,
      estos incentivos se pondr&aacute;n a disposici&oacute;n de los clientes, independientemente, de si su
      opini&oacute;n o comentario sobre su estancia, es positivo o negativo.</p>
    <p>Si usted no est&aacute; de acuerdo con estas Condiciones de Uso, por favor no nos env&iacute;e sus Publicaciones.
    </p>
    <p>Usted es completamente responsable del contenido de sus Publicaciones, (espec&iacute;ficamente incluyendo, pero
      sin limitaci&oacute;n, los comentarios publicados a este Sitio Web). Se le proh&iacute;be publicar o transmitir
      a/o desde este Sitio Web: (a) cualquier material ilegal, amenazante, injurioso, difamatorio, obsceno,
      pornogr&aacute;fico o cualquier otro contenido que viole los derechos de publicidad y/o privacidad o que pueda
      vulnerar cualquier ley; (b) cualquier material o contenido comercial (incluyendo, pero sin limitaci&oacute;n, la
      solicitud de fondos, publicidad o comercializaci&oacute;n de cualquier tipo bien o servicio); y (c) cualquier
      material o contenido que infrinja, falso o que viole cualquier derecho de autor, marca registrada, patente u otro
      derecho de propiedad de cualquier tercero. Usted ser&aacute; el &uacute;nico responsable de los da&ntilde;os que
      resulten de cualquier vulneraci&oacute;n de las restricciones anteriores, o cualquier otro da&ntilde;o resultante
      de la publicaci&oacute;n de dichos contenidos o materiales en este Sitio Web. Usted reconoce que Viajes
      Col&oacute;n, podr&aacute; ejercer sus derechos (por ejemplo, publicar, eliminar) sobre cualquier contenido que
      env&iacute;e, sin previo aviso. Si env&iacute;a m&aacute;s de una calificaci&oacute;n sobre un mismo hotel,
      s&oacute;lo la m&aacute;s reciente ser&aacute; susceptible de publicaci&oacute;n.</p>
    <p>Las pol&iacute;ticas de PuraVidaTours, con respecto a las reclamaciones por parte de terceros por el
      contenido del Sitio Web, incluyendo el contenido de cualquier Publicaci&oacute;n, que vulneren los derechos de
      autor que sean propiedad de dichos terceros, se pueden encontrar en la secciones siguientes.</p>
    <p><strong>20. Exoneraci&oacute;n de Responsabilidad</strong></p>
    <p>La informaci&oacute;n, software, productos y servicios publicados en este sitio web pueden contener imprecisiones
      o errores tipogr&aacute;ficos. En particular, PuraVidaTours no garantiza la exactitud, y rechazan cualquier
      responsabilidad por errores en la informaci&oacute;n y descripci&oacute;n de los hoteles, vuelos, cruceros, autos
      y otros productos de viaje ofrecidos en este sitio web (incluyendo, sin limitaci&oacute;n, fotograf&iacute;as,
      caracter&iacute;sticas y servicios de los hoteles, descripciones generales de los productos, etc.), gran parte de
      esta informaci&oacute;n es proporcionado por los respectivos prestatarios finales. Toda calificaci&oacute;n de los
      hoteles incluida en este sitio web debe ser entendida como pautas generales, y PuraVidaTours no garantiza la
      exactitud de dichas clasificaciones. La informaci&oacute;n incluida en el sitio web est&aacute; sujeta a cambios
      peri&oacute;dicos. PuraVidaTours y sus filiales y/o sus respectivos prestatarios finales pueden realizar
      mejoras y/o cambios en este sitio web en cualquier momento.</p>
    <p>PuraVidaTours y/o los respectivos prestatarios finales, no garantizan la idoneidad de la
      informaci&oacute;n, software, productos y servicios incluidos en este sitio web para cualquier prop&oacute;sito y
      la inclusi&oacute;n u oferta de venta de cualquier producto o servicio en este sitio web no constituye ninguna
      aprobaci&oacute;n o recomendaci&oacute;n de dichos productos o servicios por PuraVidaTours. Viajes
      Col&oacute;n emplear&aacute; un cuidado razonable para continuar prestando los servicios incluidos bajo este sitio
      web.</p>
    <p>PuraVidaTours y/o prestatarios finales rechazan por la presente cualquier garant&iacute;a o responsabilidad
      en relaci&oacute;n con esta informaci&oacute;n, software, productos y servicios, incluyendo todas las
      garant&iacute;as impl&iacute;citas y condiciones de calidad adecuada, id&oacute;neas para un prop&oacute;sito
      particular, propiedad y no incumplimiento.</p>
    <p>Los transportistas, hoteles y otros prestatarios finales que ofrecen viajes u otros servicios para Viajes
      Col&oacute;n son contratistas independientes y no agentes o empleados de PuraVidaTours o de sus empresas
      relacionadas (Grupo Col&oacute;n), PuraVidaTours no es responsable de los actos, errores, omisiones,
      declaraciones, garant&iacute;as, incumplimientos o negligencia de ninguno de estos prestatarios finales ni de
      ning&uacute;n da&ntilde;o personal, fallecimiento, da&ntilde;os material u otros da&ntilde;os o gastos derivados
      de los mismos. PuraVidaTours no ser&aacute; responsable y no har&aacute; ning&uacute;n reembolso en caso de
      retraso, cancelaci&oacute;n, overbooking (sobre venta), huelgas, fuerza mayor o por otras causas fuera de su
      control directo, y no ser&aacute; responsable de ning&uacute;n gasto adicional, p&eacute;rdidas, retrasos, cambios
      de ruta o por actuaciones de cualquier gobierno o autoridad. En ning&uacute;n caso PuraVidaTours y/o sus
      prestatarios finales ser&aacute;n responsables por ning&uacute;n da&ntilde;o indirecto, accesorio, especial o
      emergentes derivado de o como consecuencia del uso de este sitio web o por la demora o imposibilidad de utilizar
      este sitio web, o de cualquier informaci&oacute;n, software, productos y servicios obtenidos a trav&eacute;s de
      este sitio web, o cualesquiera otros derivados del uso de este sitio web, (incluyendo, pero sin limitaci&oacute;n,
      la p&eacute;rdida de uso, datos, beneficios, ahorros u oportunidades), ya sea en base a un contrato, delito,
      responsabilidad, o cualquier otro, a&uacute;n cuando PuraVidaTours, y/o cualquiera de sus prestatarios
      finales hayan sido informados de la posibilidad de tales da&ntilde;os.</p>
    <p>Importante: estos t&eacute;rminos y condiciones y la anterior limitaci&oacute;n de responsabilidad, no afecta a
      los derechos legales obligatorios que no se puede excluir por las leyes aplicables (incluyendo sus derechos
      legales bajo cualquier legislaci&oacute;n aplicable nacional o local que desarrollen la directiva sobre viajes y
      sus posteriores modificaciones). Si usted decide comprar cualquier viaje combinado en este sitio web, los
      t&eacute;rminos y condiciones de cada servicio aplicar&aacute;n por separado.</p>
    <p><strong>21. Indemnizaci&oacute;n</strong></p>
    <p>Usted acepta indemnizar a PuraVidaTours, y/o sus respectivos prestatarios finales y a cualquiera de sus
      empleados, dirigentes y agentes por y ante cualquier reclamaci&oacute;n, acci&oacute;n, demanda, p&eacute;rdidas,
      da&ntilde;o, sanci&oacute;n, multa, penalizaciones u otros costos o gastos de cualquier tipo o naturaleza,
      incluyendo pero sin limitaci&oacute;n, los honorarios legales y contables que fuesen razonables y presentados por
      terceros como resultado de:</p>
    <p>a.&nbsp;Su incumplimiento de estas Condiciones de Uso o de los documentos a los que aqu&iacute; se hace
      menci&oacute;n; su incumplimiento de cualquier ley o de derechos de un tercero; o su uso de este Sitio Web.</p>
    <p><strong>22. Ausencia de uso ilegal o prohibido</strong></p>
    <p>Una de las condiciones para su uso de este Sitio Web, consiste en que usted le garantiza a PuraVidaTours
      que no utilizar&aacute; este Sitio Web para cualquier prop&oacute;sito ilegal o que est&eacute; prohibido por
      estas Condiciones de Uso.</p>
    <p><strong>23. Enlaces a sitios web de terceros</strong></p>
    <p>Este Sitio Web puede contener enlaces a sitios web gestionados por terceros ajenos a PuraVidaTours. Tales
      enlaces han sido incluidos &uacute;nicamente para su referencia. PuraVidaTours no tiene el control de dichos
      sitios web y no es responsable de su contenido ni de uso de los mismos. La inclusi&oacute;n por parte de Viajes
      Col&oacute;n de enlaces a estos sitios web no implica ninguna aprobaci&oacute;n del material de tales sitios web
      ni la relaci&oacute;n con terceros que los est&eacute;n administrando.</p>
    <p><strong>24. Software que est&aacute; disponible en este sitio web</strong></p>
    <p>Todo el software que est&eacute; disponible en este Sitio Web para su descarga ("Software") es obra de Viajes
      Col&oacute;n y/o nuestros respectivos prestatarios finales. El uso de dicho Software est&aacute; cubierto por las
      cl&aacute;usulas del contrato de licencia del usuario final (en adelante &lsquo;Contrato de Licencia&rsquo;), que,
      en la medida que est&eacute; presente, ha sido adjuntado al software o est&aacute; incluido en &eacute;l. Usted
      podr&aacute; &uacute;nicamente instalar o utilizar el Software sobre el cual tenga un contrato de licencia si
      acepta en primera instancia las condiciones de tal contrato. En cuanto al Software que est&eacute; disponible para
      su descarga en este Sitio Web y no tenga adjunto el contrato de licencia, PuraVidaTours, por el presente le
      otorga a Usted., el usuario, un derecho personal, no exclusivo, no transferible, con un alcance mundial y por
      tiempo indefinido y limitado para utilizar el Software a fin de visitar y de otra manera utilizar el Sitio Web
      (incluyendo, sin limitaci&oacute;n, los precios y la disponibilidad de servicios de viaje) de acuerdo con estas
      Condiciones de Uso, y no para ning&uacute;n otro prop&oacute;sito.</p>
    <p>Tenga en cuenta que todo el Software, incluyendo, sin limitaci&oacute;n, todo el c&oacute;digo HTML y controles
      Active X incluidos en este Sitio Web, es propiedad de PuraVidaTours, y/o sus respectivos prestatarios
      finales, y est&aacute; protegido por las leyes de copyright y por tratados internacionales. Cualquier
      reproducci&oacute;n o distribuci&oacute;n del Software est&aacute; expresamente prohibida, y puede acarrear graves
      condenas civiles y penales. Los infractores ser&aacute;n perseguidos en la m&aacute;xima medida posible.</p>
    <p>Salvo que se disponga lo contrario en el contrato de licencia correspondiente, el software solo es para que Usted
      pueda utilizarlo como usuario a fin de realizar copias de seguridad o archivos, y quedan prohibidas futuras copias
      o reproducciones, como as&iacute; tambi&eacute;n toda futura distribuci&oacute;n del software. Solo las
      garant&iacute;as expresamente establecidas en el contrato de licencia correspondiente se aplican al software.
      PuraVidaTours expresamente desestima toda otra garant&iacute;a de cualquier tipo, incluidas las
      garant&iacute;as relacionadas con la posibilidad de venta e idoneidad para un prop&oacute;sito determinado o una
      garant&iacute;a que el software no est&eacute; infringiendo.</p>
    <p>Sin perjuicio de lo anterior, la copia o reproducci&oacute;n del software en cualquier otro servidor o
      ubicaci&oacute;n para su posterior reproducci&oacute;n o distribuci&oacute;n est&aacute; expresamente prohibido.
      El software est&aacute; garantizado, s&oacute;lo de acuerdo con los t&eacute;rminos del contrato de licencia.</p>
    <p><strong>25. Tipos de cambios</strong></p>
    <p>Si un convertidor de moneda est&aacute; disponible en el Sitio Web, los siguientes t&eacute;rminos y condiciones
      son aplicables: Los tipos de cambio se calculan sobre la base de varias fuentes p&uacute;blicas y solo se muestran
      como referencia. Los tipos de cambio pueden no ser exactas y pueden variar. Los tipos de cambio de divisas no se
      actualizan todos los d&iacute;as. La informaci&oacute;n facilitada por este sitio web pretende ser exacta, pero
      PuraVidaTours y/o sus respectivos prestatarios finales no garantizan dicha precisi&oacute;n. Al utilizar
      esta informaci&oacute;n para cualquier prop&oacute;sito financiero, le aconsejamos que consulte a un profesional
      calificado para verificar la exactitud de los tipos de cambio. Nosotros no autorizamos el uso de esta
      informaci&oacute;n para cualquier prop&oacute;sito que no sea su uso personal y se proh&iacute;be expresamente la
      reventa, distribuci&oacute;n y uso de esta informaci&oacute;n con fines comerciales.</p>
    <p><strong>26. Comisiones bancarias y por el uso de tarjetas de cr&eacute;dito</strong></p>
    <p>Algunos bancos y tarjetas de cr&eacute;dito cobran cargos por transacciones internacionales. Si usted est&aacute;
      realizando una reserva desde fuera de Costa Rica a trav&eacute;s de una tarjeta de cr&eacute;dito emitida en Costa
      Rica, su banco puede convertir el importe de la reserva pagado a su moneda local y cobran una tasa de
      conversi&oacute;n. Esto significa que la cantidad que resulte en el extracto de su tarjeta de cr&eacute;dito o de
      su cuenta bancaria puede aparecer en su moneda local y, por tanto, puede aparecer una cifra diferente a la cifra
      que aparece en el resumen de facturaci&oacute;n de su reserva efectuada en el Sitio Web. Adem&aacute;s, una
      comisi&oacute;n por transacci&oacute;n internacional puede ser cargada si el banco emisor de su tarjeta de
      cr&eacute;dito se encuentra fuera de Costa Rica. La reserva de un viaje internacional puede ser considerada como
      una transacci&oacute;n internacional por el banco o compa&ntilde;&iacute;a de su tarjeta, ya que Viajes
      Col&oacute;n puede pasar el pago a un prestatario final de viajes internacionales. Las tasas por conversi&oacute;n
      de divisas y las tasas por transacciones internacionales las determina &uacute;nicamente su banco en el d&iacute;a
      en que ellos procesan la transacci&oacute;n. Si Usted tiene alguna inquietud acerca de estos cargos o el tipo de
      cambio aplicado a su reserva, por favor p&oacute;ngase en contacto con su banco.</p>
    <p><strong>27. Derecho de Propiedad Intelectual y Marcas Comerciales</strong></p>
    <p>Todos los contenidos de este Sitio Web pertenecen a Agencia de PuraVidaTours. Todos los derechos
      reservados, incluyendo el logotipo de PuraVidaTours.</p>
    <p>Si Usted tiene conocimiento de una infracci&oacute;n de nuestra marca, por favor h&aacute;ganoslo saber
      envi&aacute;ndonos un correo electr&oacute;nico a derechosdeautor@viajes colon.com. S&oacute;lo atenderemos a
      mensajes relativos a infracciones de marcas en esta direcci&oacute;n de correo electr&oacute;nico.</p>
    <p><strong>28. Contra notificaci&oacute;n por reclamaci&oacute;n de derechos de autor</strong></p>
    <p>PuraVidaTours respeta los derechos de autor de terceros. Si usted cree de buena fe que los materiales
      incluidos por nosotros infringen sus derechos de autor, usted puede enviarnos una notificaci&oacute;n por escrito
      que incluya la siguiente informaci&oacute;n. Por favor, t&eacute;ngase en cuenta que no vamos a procesar su
      reclamaci&oacute;n si no &eacute;sta no se realiza correctamente o de forma completa:</p>
    <p>Se debe identificar claramente los derechos de autor que Usted reclama que han sido infringidos.</p>
    <p>Se debe identificar claramente el contenido o material que considera que infringe los derechos de autor
      protegidos, y la informaci&oacute;n que nos permita localizar ese contenido en el Sitio Web, como por ejemplo un
      enlace al contenido infractor.</p>
    <p>Debe aportarse sus datos de contacto para que podamos dar respuesta a su reclamaci&oacute;n, preferiblemente
      incluyendo una direcci&oacute;n de correo electr&oacute;nico y un n&uacute;mero de tel&eacute;fono.</p>
    <p>Debe incluirse una declaraci&oacute;n de que Usted "entiende de buena fe que el contenido o informaci&oacute;n
      que se reclama por infracci&oacute;n de los derechos de autor no est&aacute; autorizado para ello por el
      propietario de dichos derechos, por su agente o por la ley."</p>
    <p>Debe incluirse una declaraci&oacute;n de que "la informaci&oacute;n incluida en esta notificaci&oacute;n es
      exacta, y bajo pena de perjurio, la parte reclamante est&aacute; autorizada a actuar en nombre del propietario del
      derecho exclusivo que presuntamente se ha infringido."</p>
    <p>La notificaci&oacute;n debe ser firmada por la persona autorizada para actuar en nombre del propietario del
      derecho exclusivo que presuntamente se ha infringido.</p>
    <p>Las notificaciones relacionadas con este Sitio Web deben ser enviadas a nosotros por correo electr&oacute;nico a
      derechosdeautor@puravidatours.com, para su r&aacute;pida resoluci&oacute;n.</p>
    <p>Revisaremos y atenderemos todas las notificaciones que cumplan con los requisitos anteriores. Si se elimina o
      deshabilita el acceso en respuesta a una reclamaci&oacute;n de este tipo, es posible que notifiquemos al
      propietario o administrador del contenido o del sitio web afectado de modo que &eacute;l o ella puedan remitir una
      contra notificaci&oacute;n.</p>
    <p>Para cualquier pregunta adicional con respecto a este proceso, por favor env&iacute;enos un correo
      electr&oacute;nico a: derechosdeautor@puravidatours.com.</p>
    <p><strong>29. Cancelaci&oacute;n de la cuenta</strong></p>
    <p>PuraVidaTours ha adoptado una pol&iacute;tica de cancelaci&oacute;n, en circunstancias apropiadas y cuando
      existan pruebas razonables, los suscriptores o titulares de cuenta que tengan la consideraci&oacute;n de
      infractores reincidentes. PuraVidaTours tambi&eacute;n podr&aacute;, bajo pruebas razonables, limitar el
      acceso al Sitio Web y/o cancelar las cuentas de los usuarios que infrinjan los derechos de propiedad intelectual
      de otros, tanto si existe como si no una infracci&oacute;n reiterada. Si Usted cree que un suscriptor o titular de
      cuenta es un infractor reincidente, por favor rem&iacute;tanos una notificaci&oacute;n en la que se incluya
      informaci&oacute;n suficiente para que podamos verificar que el suscriptor o titular de la cuenta es un infractor
      reincidente. Comunicarse a derechosdeautor@puravidatours.com.</p>
    <p><strong>30. Contra notificaci&oacute;n por eliminaci&oacute;n de informaci&oacute;n del usuario</strong></p>
    <p>PuraVidaTours no tolera falsas reclamaciones por infracciones de los derechos de autor. Si usted cree que
      el contenido que usted envi&oacute; a nuestro Sitio Web fue eliminado por error debido a una falsa
      reclamaci&oacute;n por infracci&oacute;n de los derechos de autor, puede presentar una Contra Notificaci&oacute;n.
      Cuando recibamos una contra notificaci&oacute;n debidamente completada, se la enviaremos al propietario de los
      derechos reclamados.</p>
    <p>Para remitirnos una contra notificaci&oacute;n, Usted debe proporcionarnos una comunicaci&oacute;n escrita por
      fax (506) 2547-2627 o por correo postal (986-1007 Centro Col&oacute;n, San Jos&eacute;-Costa Rica, que incluya
      todos los elementos que se especifican a continuaci&oacute;n. Por favor, tenga en cuenta que usted ser&aacute;
      responsable de los da&ntilde;os (incluidos los costos y honorarios de abogados) si Usted afirma falsamente que el
      contenido no est&aacute; infringiendo los derechos de autor de otros. Si Usted no est&aacute; seguro de si un
      determinado contenido o informaci&oacute;n infringe los derechos de autor de otros, le sugerimos que primero
      busque asesor&iacute;a legal.</p>
    <p>Para agilizar el procesamiento de su notificaci&oacute;n, por favor env&iacute;enos su notificaci&oacute;n con el
      siguiente formato:</p>
    <p>Debe identificarse el contenido o informaci&oacute;n espec&iacute;fica que fue eliminada o inhabilitado por
      error. Indique d&oacute;nde aparec&iacute;a en el Sitio Web de PuraVidaTours. Indique la direcci&oacute;n
      URL si es posible.</p>
    <p>Proporcione su nombre, direcci&oacute;n postal, n&uacute;mero de tel&eacute;fono, direcci&oacute;n de correo
      electr&oacute;nico, y una declaraci&oacute;n en la que consienta a la jurisdicci&oacute;n de los tribunales en los
      que se encuentra su domicilio, o si su domicilio est&aacute; fuera de Costa Rica, por cualquier tribunal en el que
      PuraVidaTours, pueda ser requerido, y que usted acepta, por la parte que reclam&oacute; contra su contenido
      o por su agente.</p>
    <p>Debe incluir la siguiente declaraci&oacute;n: "Juro, bajo pena de perjurio, que creo de buena fe que se
      retir&oacute; o inhabilit&oacute; el contenido identificado anteriormente como consecuencia de un error o
      confusi&oacute;n. "</p>
    <p>Debe firmar dicha notificaci&oacute;n.</p>
    <p>Debe enviar dicha comunicaci&oacute;n escrita a la siguiente direcci&oacute;n:</p>
    <p>PuraVidaTours, derechosdeautor@puravidatours.com.</p>
    <p>Para cualquier pregunta adicional con respecto a este proceso por parte de PuraVidaTours, por favor
      env&iacute;enos un email a derechosdeautor@puravidatours.com.</p>
    <p><strong>31. Modificaci&oacute;n de estas condiciones de uso</strong></p>
    <p>PuraVidaTours se reserva el derecho, previa notificaci&oacute;n, a modificar estas Condiciones de Uso en
      base a las cuales se ofrece este Sitio Web. El uso continuado de este Sitio Web est&aacute; condicionado a la
      aceptaci&oacute;n de las Condiciones de Uso actualizadas.</p>
    <p><strong>32. Generalidades</strong></p>
    <p>Este acuerdo se rige por las leyes de la Rep&uacute;blica de Costa Rica. El usuario se somete a la
      jurisdicci&oacute;n exclusiva de los tribunales costarricenses en todas las disputas que surjan o est&eacute;n
      relacionadas con el uso de este Sitio Web. El uso de este Sitio Web no est&aacute; autorizado en jurisdicciones
      que no haga efectivas todas las provisiones de estas Condiciones de Uso incluyendo, sin limitaci&oacute;n, este
      p&aacute;rrafo.</p>
    <p>Usted acuerda y consiente expresamente conceder a PuraVidaTours el derecho a ceder, transferir,
      subcontratar o delegar los derechos, deberes u obligaciones bajo este acuerdo.</p>
    <p>Usted acepta y consiente que no existe ninguna uni&oacute;n de empresas, asociaciones, relaci&oacute;n laboral o
      relaci&oacute;n de agencia entre Usted y PuraVidaTours como resultado de este acuerdo o del uso del Sitio
      Web.</p>
    <p>El cumplimiento de PuraVidaTours del presente acuerdo est&aacute; sujeto a las leyes y procedimientos
      legales actuales, y nada de lo contenido en el presente acuerdo deroga los derechos de PuraVidaTours a
      cumplir con los requerimientos o requisitos relativos al uso del Sitio Web o de la informaci&oacute;n suministrada
      o recogida por PuraVidaTours con respecto a dicho uso.</p>
    <p>Si cualquier contenido del presente acuerdo es considerado inv&aacute;lido o no aplicable de conformidad con las
      leyes aplicables incluyendo, pero sin limitaci&oacute;n, la limitaci&oacute;n de garant&iacute;as y
      exenci&oacute;n de responsabilidad establecidas anteriormente, en ese caso se considerar&aacute; que las
      provisiones inv&aacute;lidas o no exigibles ser&aacute;n sustituidas por una provisi&oacute;n v&aacute;lida y
      exigible que se acerque lo m&aacute;s posible a la intenci&oacute;n de las partes incluida en la
      disposici&oacute;n original y el resto del acuerdo seguir&aacute; siendo v&aacute;lido.</p>
    <p>Este acuerdo constituye el acuerdo completo entre, Usted, el cliente y PuraVidaTours en relaci&oacute;n con
      este Sitio Web y reemplaza a todas las comunicaciones y propuestas anteriores o contempor&aacute;neas, tanto de
      manera electr&oacute;nica, oral o escrita, entre el cliente y PuraVidaTours, en relaci&oacute;n con este
      Sitio Web. Una versi&oacute;n impresa de este acuerdo y de cualquier notificaci&oacute;n enviada de forma
      electr&oacute;nica ser&aacute; admisible en procedimientos judiciales o administrativos basados ​​en o
      relacionados con este acuerdo en la misma medida y sujeto a las mismas condiciones que otros documentos y archivos
      generados y mantenidos originalmente en forma impresa.</p>
    <p>Los nombres ficticios de sociedades, productos, personas, caracter&iacute;sticas y/o datos mencionados en este
      acuerdo no pretenden representar a ninguna persona, compa&ntilde;&iacute;a, producto o evento.</p>
    <p>Todos los derechos no concedidos expresamente aqu&iacute; son reservados.</p>
    <p>Todos los derechos reservados. puravidatours.com, Agencia de PuraVidaTours. San Jos&eacute;, Costa Rica,
      Paseo Col&oacute;n, apartado postal 986-1007 Centro Col&oacute;n.</p>
    <p><strong>33. Precios</strong></p>
    <p>Los precios que aparecen en nuestro sitio web son muy competitivos. Todos los precios del Sitio Web de
      puravidatours.com son por persona y estancia completa (al mostrarse el precio total, incluye la cantidad de personas
      por Usted elegida), y se muestran con todos los impuestos incluidos (sujetos a cambio de dichos impuestos), a no
      ser que se indique de otra forma en nuestro sitio web o en el correo electr&oacute;nico de confirmaci&oacute;n.
    </p>
    <p>En ocasiones, en nuestro Sitio Web hay una tarifa m&aacute;s barata que otra para una estancia espec&iacute;fica
      en un alojamiento. Estas tarifas creadas por los alojamientos pueden comportar restricciones y condiciones
      especiales, por ejemplo, relativas a la cancelaci&oacute;n y al reembolso. Consulta los datos de la
      habitaci&oacute;n y la tarifa minuciosamente para conocer las condiciones antes de realizar la reserva.</p>
    <div>Los precios mostrados en este sitio son para compra inmediata finalizando su transacci&oacute;n en el sitio,
      este precio puede sufrir variaciones si se presenta en una de nuestras Tiendas f&iacute;sicas y/o por medio de un
      agente autorizado.</div>
    <p><strong>34. Cancelaci&oacute;n</strong></p>
    <p>Al realizar una reserva en un establecimiento, Usted acepta sus condiciones de cancelaci&oacute;n y no show (si
      Usted no se presenta), as&iacute; como otros t&eacute;rminos y condiciones adicionales (entrega) del
      establecimiento que puedan afectar a su reserva o a su estancia. Aqu&iacute; se incluyen los servicios y/o
      productos ofertados por el establecimiento (debe consultar los t&eacute;rminos y condiciones de entrega
      directamente en dicho establecimiento). Las condiciones generales de cancelaci&oacute;n y no show (si Usted no se
      presenta) de cada establecimiento est&aacute;n a su disposici&oacute;n en nuestro Sitio Web, tanto en las
      p&aacute;ginas de informaci&oacute;n del establecimiento como durante el proceso de reserva y en el correo
      electr&oacute;nico de confirmaci&oacute;n. Tenga en cuenta que algunas tarifas u ofertas especiales no permiten
      cambios ni cancelaciones. Consulte los datos de cada habitaci&oacute;n para ver las condiciones antes de realizar
      la reserva. Tenga en cuenta que una reserva que requiera el pago de un dep&oacute;sito o el pago por adelantado
      (total o parcial) puede ser cancelada (sin necesidad de aviso previo) en el momento en el que (el resto de) las
      cantidades pendientes de pago no puedan ser cobradas en su totalidad en la fecha pertinente, de acuerdo con las
      condiciones de pago del establecimiento y las condiciones de la reserva. Los retrasos en el pago, los datos
      bancarios err&oacute;neos, los datos de las tarjetas de cr&eacute;dito o d&eacute;bito, las tarjetas de
      cr&eacute;dito o d&eacute;bito no v&aacute;lidas o con saldo insuficiente son de su responsabilidad y
      podr&iacute;a no beneficiarse de la devoluci&oacute;n o reembolso del pago por adelantado (en alojamientos no
      reembolsables) si se diera alguno de estos casos, a menos que el establecimiento as&iacute; lo acepte o permita en
      sus condiciones de cancelaci&oacute;n y pago por adelantado.</p>
    <p>Si desea revisar, modificar o cancelar su reserva, consulta el correo electr&oacute;nico de confirmaci&oacute;n y
      siga las instrucciones indicadas. Tenga en cuenta que se podr&aacute;n aplicar suplementos por cancelaci&oacute;n
      conforme a las condiciones de cancelaci&oacute;n, pago (por adelantado) y no show (si Usted no se presenta) del
      establecimiento o que podr&iacute;a no beneficiarse de la devoluci&oacute;n de la cantidad pagada (por
      adelantado). Le recomendamos que lea dichas condiciones con detenimiento antes de realizar la reserva y que
      recuerde hacer los pagos posteriores a tiempo ya que pueden ser necesarios para la reserva.</p>
    <p><strong>35. Pago</strong></p>
    <p>Ser&aacute; necesario el pago inmediato total de su reserva en el momento de realizar la misma. Cuando solo abone
      un dep&oacute;sito, deber&aacute; pagar el resto en la fecha de vencimiento que le sea notificada. Si no se ha
      recibido el resto del pago en la fecha de vencimiento, notificaremos al Prestatario final de viajes que puede
      cancelar su reserva y realizar los costos de cancelaci&oacute;n estipulados en sus T&eacute;rminos y Condiciones.
    </p>
    <p>Es importante que comprenda que el pago realizado en el momento en que lleva a cabo la reserva no implica, por
      s&iacute; mismo, que su reserva est&eacute; confirmada. Su reserva solo estar&aacute; confirmada cuando reciba
      nuestro correo electr&oacute;nico de confirmaci&oacute;n de la reserva. Puesto que realizamos reservas en tiempo
      real con prestatarios finales de viajes, tenemos que tener la seguridad de que disponemos de su pago
      correspondiente y, por ello, debe realizarnos un pago inicial como autorizaci&oacute;n para que confirmemos su
      reserva con el prestatario final de viajes. Si, inesperadamente, en el breve plazo de tiempo que transcurre entre
      su pago y nuestro intento de confirmaci&oacute;n de la reserva con el prestatario final de viajes, el producto ya
      no est&aacute; disponible y no podemos conseguir una alternativa que le resulte aceptable, por supuesto le
      devolveremos todo el dinero que nos haya abonado por dicho producto. Tambi&eacute;n debe entender que esta
      devoluci&oacute;n solo se aplicar&aacute; al producto que no est&aacute; disponible y que no se ver&aacute;
      afectada ninguna otra reserva, es decir, seguir&aacute; comprometido con cualquier otro producto que haya
      reservado para viajar al mismo tiempo.</p>
    <p><strong>36. Pasaportes, visado y salud</strong></p>
    <p>Podemos proporcionarle informaci&oacute;n general acerca de los requerimientos para pasaportes y visados
      necesarios para su viaje. Los requerimientos espec&iacute;ficos para su pasaporte y visado, as&iacute; como otras
      exigencias de inmigraci&oacute;n, son responsabilidad suya y Usted debe confirmarlos con las embajadas y/o
      consulados correspondientes. Ni nosotros, ni los Prestatarios Finales de viajes aceptaremos ning&uacute;n tipo de
      responsabilidad si no puede viajar debido a que no haya satisfecho alg&uacute;n requerimiento relacionado con el
      pasaporte, vacunaci&oacute;n, el visado o inmigraci&oacute;n. La mayor&iacute;a de los pa&iacute;ses exigen
      actualmente que los pasaportes tengan un per&iacute;odo de validez m&iacute;nimo de 6 (seis) meses posterior a su
      salida de viaje.</p>
    <p>Tenga en cuenta especialmente que, para casi todos los desplazamientos a&eacute;reos las l&iacute;neas
      a&eacute;reas exigen una identificaci&oacute;n fotogr&aacute;fica. Aseg&uacute;rese de estar al corriente de la
      normativa establecida por cada aerol&iacute;nea o contacte con nosotros para m&aacute;s detalles.</p>
    <p>Podemos proporcionarle informaci&oacute;n general acerca de todas las formalidades sanitarias exigidas para su
      viaje, pero Usted debe verificar con su m&eacute;dico sus circunstancias espec&iacute;ficas.</p>
    <p><strong>37. Disposiciones finales para el viaje</strong></p>
    <p>Compruebe que todos los documentos para el viaje, el pasaporte, la vacunaci&oacute;n, el visado y los seguros
      sean correctos y que llega al aeropuerto con el tiempo suficiente, requerido por la aerol&iacute;nea y/o
      autoridades aeroportuarias o portuarias.</p>
    <p><strong>38. Modificaciones realizadas por el Prestatario Final de viajes</strong></p>
    <p><strong>38.1 Vuelos</strong></p>
    <p>En ocasiones, los operadores a&eacute;reos cambian los horarios de los vuelos y, por esta raz&oacute;n, es
      importante que los confirme dos d&iacute;as antes de la salida.</p>
    <p>Para los vuelos de regreso, puede resultar necesario reconfirmarlo con la l&iacute;nea a&eacute;rea. Debe anotar
      el n&uacute;mero de referencia o el nombre de contacto a la hora de reconfirmarlo. Si no logra reconfirmarlo,
      puede que se le niegue el permiso de embarque y es poco probable que reciba alg&uacute;n reembolso.</p>
    <p>No asumimos ning&uacute;n tipo de responsabilidad por la p&eacute;rdida de un vuelo si Usted no confirma el
      horario de vuelo del modo descrito previamente.</p>
    <p>Las aerol&iacute;neas no permiten realizar cambios de nombres una vez que los boletos a&eacute;reos est&aacute;n
      emitidos, los nombres en las reservaciones de vuelo deben ser iguales a los consignados en el pasaporte, errores
      en los mismos ser&aacute;n responsabilidad de pasajero, quien para poder viajar deber&aacute; adquirir un nuevo
      boleto a&eacute;reo.</p>
    <p><strong>38.2 General</strong></p>
    <p>No asumimos ning&uacute;n tipo de responsabilidad en relaci&oacute;n con gastos o costos contra&iacute;dos como
      resultado del cambio y no aceptamos ning&uacute;n tipo de responsabilidad por cambios o cancelaciones que sean
      debidos a circunstancias inusuales o imprevisibles que escapan a nuestro control. Entre estas se pueden incluir
      guerras o amenazas de guerra, disturbios, des&oacute;rdenes civiles, actividad terrorista, desastres naturales o
      nucleares, incendios, condiciones atmosf&eacute;ricas adversas, acciones gubernamentales o interrupci&oacute;n de
      la disponibilidad del alojamiento.</p>
    <p><strong>39. Precisi&oacute;n de la p&aacute;gina web</strong></p>
    <p>Nos esforzamos para garantizar que los datos de todos los productos (incluidos los precios) indicados en nuestras
      p&aacute;ginas web son precisos. Sin embargo, dado el elevado volumen de vuelos, hoteles y otros productos
      ofertados, resulta inevitable que, en casos excepcionales, se produzcan errores. No asumiremos ning&uacute;n tipo
      de responsabilidad por estos errores. Esto se debe a que la informaci&oacute;n que aparece es transmitida
      directamente por el sistema inform&aacute;tico del prestatario final de viajes correspondiente.</p>
    <p>A pesar de lo anteriormente expuesto, en los casos en los que los datos (salvo el precio) sean sustancialmente
      incorrectos, le ofreceremos la posibilidad de continuar con su reserva o cancelarla con la devoluci&oacute;n
      &iacute;ntegra del dinero abonado &uacute;nicamente para dicha reserva.</p>
    <p>Cuando aparezcan imprecisiones relativas a la descripci&oacute;n del precio de un producto espec&iacute;fico, se
      le ofrecer&aacute; la devoluci&oacute;n &iacute;ntegra del dinero abonado &uacute;nicamente para dicha reserva o
      la posibilidad de mantener dicha reserva tras la recepci&oacute;n del pago adicional que sea necesario.</p>
    <p><strong>40. Limitaci&oacute;n de la responsabilidad</strong></p>
    <p>Para evitar dudas, su reserva se realiza directamente con el Prestatario Final de viajes. En la medida que no
      existan negligencias en la provisi&oacute;n de nuestros servicios; PuraVidaTours no acepta ning&uacute;n
      tipo de responsabilidad ante reclamaciones, p&eacute;rdidas, da&ntilde;os, gastos, u otros perjuicios en
      relaci&oacute;n con cualquier elemento de su reserva o preparativo de viaje.</p>
    <p>Espec&iacute;ficamente, no nos responsabilizaremos de ning&uacute;n acto u omisi&oacute;n de cualquier persona
      que no haya sido contratada directamente por nosotros y, aunque seleccionamos detenidamente a nuestros
      Prestatarios Finales de viajes, no tenemos control sobre ellos, por lo que no se nos puede responsabilizar de
      ninguna acci&oacute;n u omisi&oacute;n de nuestros Prestatarios Finales de viajes, ni de sus empleados, agentes o
      trabajadores.</p>
    <p>Adem&aacute;s, no se nos puede responsabilizar de ninguna p&eacute;rdida, da&ntilde;o o gastos sufridos por Usted
      como consecuencia de huelgas, des&oacute;rdenes civiles, incendios, guerras, amenazas de guerra, actividades
      terroristas, desastres nacionales o nucleares, condiciones clim&aacute;ticas adversas u otros factores que
      est&eacute;n razonablemente fuera de nuestro control, o actos de fuerza mayor que puedan influir en los servicios
      o productos de los Prestatarios Finales de viajes o de PuraVidaTours por cualquier raz&oacute;n.</p>
    <p>En ninguna circunstancia nos responsabilizaremos por p&eacute;rdidas econ&oacute;micas, p&eacute;rdidas de
      ingresos, p&eacute;rdidas de ganancias o dividendos, da&ntilde;os empresariales o p&eacute;rdida de oportunidades
      de negocio, p&eacute;rdida de buena voluntad, p&eacute;rdida de reputaci&oacute;n, p&eacute;rdida de ahorros
      anticipados que surjan por el fallo o el retraso en la ejecuci&oacute;n de los servicios descritos en estas
      condiciones comerciales, o de otro tipo en relaci&oacute;n a estas condiciones comerciales; o por cualquier
      p&eacute;rdida o da&ntilde;o consecuencial, directa o indirecta. (Independientemente de la raz&oacute;n causante).
    </p>
    <p>En todos los casos, la responsabilidad absoluta m&aacute;xima de PuraVidaTours, sujeto o en relaci&oacute;n
      a estas condiciones comerciales, estar&aacute; limitado al precio total abonado por el cliente para las reservas
      espec&iacute;ficas asociadas con una reclamaci&oacute;n espec&iacute;fica.</p>
    <p><strong>41. T&eacute;rminos y Condiciones Generales para el uso del sitio puravidatours.com</strong></p>
    <p><strong>&Uacute;ltima actualizaci&oacute;n: 01 julio 2015</strong></p>
    <p><strong>Acuerdo entre el cliente y puravidatours.com.</strong></p>
    <p>Este Sitio Web le es ofrecido a Usted, el cliente, por puravidatours.com., condicionado a su aceptaci&oacute;n sin
      excepciones de los t&eacute;rminos y condiciones generales aqu&iacute; contenidos (las "<strong>Condiciones de
        Uso</strong>"). El uso de este Sitio Web supone su aceptaci&oacute;n de tales t&eacute;rminos y condiciones. Si
      Usted no est&aacute; de acuerdo con estas Condiciones de Uso, entonces usted no est&aacute; autorizado a utilizar
      este Sitio Web.</p>
    <p>PuraVidaTours podr&aacute; en cualquier momento modificar estas Condiciones de Uso y el uso continuado de
      este Sitio Web por su parte est&aacute; condicionado a su aceptaci&oacute;n de las versiones actualizadas de estas
      Condiciones de Uso.</p>

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