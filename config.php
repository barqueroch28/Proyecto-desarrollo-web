<?php

/* Database credentials. Assuming you are running MySQL
server with default setting */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'moi');
define('DB_PASSWORD', 'moi0210');
define('DB_NAME', 'viajes');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
     die("ERROR:No se pudo conectar. " . mysqli_connect_error());
}
