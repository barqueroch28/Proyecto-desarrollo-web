<?php
  include "../../config.php";

  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../img/faviconadmin.png">

  <title>PuraVidaTours | Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">

  <style>
    textarea {
      resize: none;
    }
  </style>
</head>


<body>
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0" style="background-color: #202020;"> 
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="background-color: #000000;" href="../../index.php">PuraVidaTours</a>
    <ul class="navbar-nav px-3">
      <li class="nav justify-content-center">
        <a class="nav-link" style="margin-right: 20px; font-size: 16px;" href="#">Mi usuario</a>
        <a class="nav-link" style="font-size: 16px;" href="../../index.php">Cerrar sesión</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky" style="position: static; margin-top: 50px;">
          <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link" href="../dashboard.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Principal <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-file">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                  <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                Destinos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../hoteles/hoteles.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-shopping-cart">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                Hotel
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../usuarios/usuarios.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-bar-chart-2">
                  <line x1="18" y1="20" x2="18" y2="10"></line>
                  <line x1="12" y1="20" x2="12" y2="4"></line>
                  <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-layers">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                  <polyline points="2 17 12 22 22 17"></polyline>
                  <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                Integrations
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="chartjs-size-monitor"
          style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
          <div class="chartjs-size-monitor-expand"
            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
          </div>
          <div class="chartjs-size-monitor-shrink"
            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
          </div>
        </div>

        <h2>Destinos</h2><hr>

        <div class="mt-2 mb-3 clearfix">
          <a style="background-color:#003770; color: white;" id="mbtn" class="btn pull-left"><i class="fa fa-plus"></i> Nuevo Registro</a>
        </div>

        <div id="modalDialog" class="modal" style="background-color: rgba(1, 2, 4, 0.52)">
          <div class="col-lg-6" style="position:absolute;top:50%;left:50%;width:650px; height:500px; margin-left:-320px; margin-top:-300px;">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <h3 class="text-center title-2">Agregar Destino</h3>
                </div>
                <hr>
                <form method="post" action="insert.php">
                  <div class="form-group">
                    <label class="control-label mb-1">Nombre del destino</label>
                    <input required id="nombre" name="nombre" type="text" class="form-control" aria-required="true" aria-invalid="false">
                  </div>
                  <div class="form-group">
                    <label class="control-label mb-1">Ubicación</label>
                    <input required id="ubicacion" name="ubicacion" type="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label mb-1">Descripción</label>
                    <textarea required id="desc" rows="5" name="desc" class="form-control"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="control-label mb-1">Costo</label>
                        <input required id="costo" name="costo" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-6">
                      <label class="control-label mb-1">Imagen</label>
                      <div class="input-group">
                        <input required id="imagen" name="imagen" type="file" class="form-control-file">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div>
                    <button type="submit" class="btn btn-lg btn-info btn-block">
                      <span>Guardar</span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- PHP -->
        <?php
        require_once "../../config.php";

        $sql = "SELECT * FROM tours.usuario";
        if ($result = mysqli_query($con, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-hover">';
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellidos</th>";
            echo "<th>Correo</th>";
            echo "<th>Cédula</th>";
            echo "<th>Teléfono</th>";
            echo "<th>Vacunado</th>";
            echo "<th>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['id_usuario'] . "</td>";
              echo "<td>" . $row['nombre'] . "</td>";
              echo "<td>" . $row['apellido'] . "</td>";
              echo "<td>" . $row['correo'] . " </td>";
              echo "<td>" . $row['cedula'] . "</td>";
              echo "<td>" . $row['telefono'] . "</td>";
              if ($row['vacunado']==1) {
                echo "<td>Si</td>";
              } else {
                echo "<td>No</td>";
              }
              echo "<td>";
              echo '<a href="updateCHO.php?id_usuario=' . $row['id_usuario'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
              echo '<a href="deleteCHO.php?id_usuario=' . $row['id_usuario'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
              echo "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            // Free result set
            mysqli_free_result($result);
          } else {
            echo '<div class="alert alert-danger"><em>No hay choferes en el sistema.</em></div>';
          }
        } else {
          echo "<div class='alert alert-danger'><span>¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.</span></div>";
        }

        mysqli_close($con);
        ?>
        
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="../js/popper.min.js.descarga"></script>
  <script src="../js/bootstrap.min.js.descarga"></script>

  <!-- Icons -->
  <script src="../js/feather.min.js.descarga"></script>
  <script>
    feather.replace()
  </script>

  <script type="text/JavaScript">
    var modal = $("#modalDialog");
    
    var btn = $("#mbtn");
    
    var span = $(".close");
    
    $(document).ready(function(){
        btn.on("click", function() {
            modal.show();
        });
        
        span.on("click", function() {
            modal.hide();
        });
    });
    
    $("body").bind("click", function(e){
        if($(e.target).hasClass("modal")){
            modal.hide();
        }
    });
  </script>
</body>
</html>