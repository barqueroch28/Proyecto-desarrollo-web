<?php

    session_start();

    if(isset($_SESSION["logeado"])) {
        if ($_SESSION["logeado"] == 1) {
            unset($_SESSION["logeado"]);
            unset($_SESSION["correo"]);
            header('Location: index.php');
        }
    }

?>