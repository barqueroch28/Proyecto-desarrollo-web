<?php

    session_start();

    // Mensaje de error
    $error = "Correo y/o contraseña incorrectos.";
    
    unset($_SESSION['logeado']);

    $role;

    include "config.php";

    if (isset($_POST['but_login'])) {

        $correo = mysqli_real_escape_string($con, $_POST['correo']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        if ($correo != "" && $password != "") {

            $sql_query = "SELECT * from usuario where correo='" . $correo . "' and password='" . $password . "'";
            $result = mysqli_query($con, $sql_query);

            if ($result) {

                $row = mysqli_fetch_row($result);

                if ($row)
                {   
                    // Login usuario corriente
                    if ($row["9"] == 1) {
                        $_SESSION['correo'] = $correo;
                        $_SESSION['logeado'] = 1;
                        header('Location: index.php');
                    }
                    // Login administrador
                    else if ($row["9"] == 2) {
                        $_SESSION['correo'] = $correo;
                        $_SESSION['logeado'] = 1;
                        header('Location: admin/dashboard.php');
                    }
                    else {
                        $error = "Correo y/o contraseña incorrectos.";
                        $_SESSION["error"] = $error;
                        header('Location: index.php');
                        echo "<h1>Error verificando la sesión.</h1>";
                    }

                } else {
                    $error = "No se pudo validar el role de la sesión.";
                    $_SESSION["error"] = $error;
                    header('Location: index.php');
                }

            } else {
                $error = "No se pudo validar la sesión.";
                $_SESSION["error"] = $error;
                header('Location: index.php');
            }
            
        } else {
            $error = "No se pudo validar la sesión.";
            $_SESSION["error"] = $error;
            header('Location: index.php');
        }
    }
?>