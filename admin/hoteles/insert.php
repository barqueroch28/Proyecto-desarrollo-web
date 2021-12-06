<?php

  session_start();

  require_once "../../config.php";

  $error = "Ya existe un hotel con esa información.";

  // Check connection
  if($con === false){
      die("ERROR: Could not connect. " 
          . mysqli_connect_error());
  }    

  $nombre =  $_REQUEST['nombre'];
  $ubicacion =  $_REQUEST['ubicacion'];
  $desc =  $_REQUEST['desc'];
  $costo = $_REQUEST['costo'];
  $imagen = $_REQUEST['imagen'];
  $id_rol = 2;

  $sql_query = "SELECT nombre from tours.hotel where nombre='".$nombre."'";
  $result = mysqli_query($con, $sql_query);
  if (mysqli_num_rows($result)==0) {
    
    $sql = "INSERT INTO `hotel` ( `nombre`,`ubicacion`,`descripcion`, `costo`, `imagen`) 
                              VALUES ('$nombre','$ubicacion','$desc','$costo','$imagen')";
      
      if(mysqli_query($con, $sql)){
        $type = "success";
        header('Location: hoteles.php');
      } 
      else{
        $error = "Ocurrió un error al agregar el registro.";
        $_SESSION["error"] = $error;
        header('Location: hoteles.php');
      }
  } 
  else {
    $_SESSION["error"] = $error;
    header('Location: hoteles.php');
  }
  
  mysqli_close($con);
?>