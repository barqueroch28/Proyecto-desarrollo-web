<?php

// Conexión a la base de datos.
define('DB_SERVER', '35.223.204.210');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'puravidatours');
define('DB_NAME', 'tours');

// Se realiza la conexión.
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Se comprueba si se realizó la conexión.
if($con === false){
     die("ERROR:No se pudo conectar. " . mysqli_connect_error());
}
