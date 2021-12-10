<?php

    session_start();

    if(isset($_SESSION["logeado"]) && isset($_SESSION["correo"])) {
        if ($_SESSION["logeado"] == 2) {
            unset($_SESSION["logeado"]);
            unset($_SESSION["correo"]);
            header('Location: ../index.php');
        }
    }

?>