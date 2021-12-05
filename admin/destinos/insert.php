<?php
  
  require_once "config.php";

  // Check connection
  if($con === false){
      die("ERROR: Could not connect. " 
          . mysqli_connect_error());
  }    

  $nombre =  $_REQUEST['nombre'];
  $ubicacion =  $_REQUEST['ubicacion'];
  $desc =  $_REQUEST['desc'];
  $costo = $_REQUEST['apellidos'];
  $id_rol = 2;

  $sql_query = "SELECT username from usuario where username='".$username."'";
  $result = mysqli_query($con, $sql_query);
  if (mysqli_num_rows($result)==0) {
    
    $sql_query = "SELECT correo from usuario where correo='".$correo."'";
    $result = mysqli_query($con, $sql_query);
    if (mysqli_num_rows($result)==0) {

      $sql = "INSERT INTO `usuario` ( `username`,`password`,`nombre`, `apellidos`, `fecha_nacimiento`,`correo`, `id_rol`)  
              VALUES ('$username','$password','$nombre','$apellidos','$fecha_nacimiento','$correo','$id_rol')";

      $sql_query = "SELECT id_usuario from usuario where username='".$username."' and password='".$password."'";
      $result = mysqli_query($con, $sql_query);
      $row = mysqli_fetch_array($result);
      $id = $row["id_usuario"];

      $saldo = 0;
      $sql_query_monedero = "INSERT INTO monedero ( `id_monedero`, `id_usuario`, `saldo`)  
      VALUES ('$id','$id','$saldo')";
      mysqli_query($con, $sql_query_monedero);
      
      if(mysqli_query($con, $sql)){
        $type = "success";
        header('Location: choferes.php');
      } 
      else{
          echo "ERROR: Un errocito :( Sorry $sql " 
              . mysqli_error($con);
      }
    } else {
      header('Location: choferes_err.php');
    }
  } else {
    header('Location: choferes_err.php');
  }
  
  mysqli_close($con);
?>