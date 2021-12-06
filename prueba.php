<?php

    include "config.php";

    session_start();

    $correo = $_SESSION['correo'];
    $sql_query = "SELECT * from usuario where correo='" . $correo . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $id_usuario = $row['id_usuario'];
    echo "<p style='font-size:50px'>ID : "  . $id_usuario . " ── correo : "  . $correo . "</p>";
?>

<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">