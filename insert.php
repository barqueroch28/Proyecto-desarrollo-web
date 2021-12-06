<?php
    session_start();

    $correo = "";

    $error = "Error desconocido.";

    include "config.php";

    // Check connection
    if ($con === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $nombre =  mysqli_real_escape_string($con, $_POST['nombre']);
        $apellido =  mysqli_real_escape_string($con, $_POST['apellido']);
        $cedula =  mysqli_real_escape_string($con, $_POST['cedula']);
        $telefono =  mysqli_real_escape_string($con, $_POST['telefono']);
        $fecha_nacimiento =  mysqli_real_escape_string($con, $_POST['fecha_nacimiento']);
        $correo =  mysqli_real_escape_string($con, $_POST['correo']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $repass =  mysqli_real_escape_string($con, $_POST['repass']);

        if ($password != $repass) {
            $error = "Contraseñas no coinciden.";
            $_SESSION["error"] = $error;
            header('Location: register.php');
            return;
        }

        // Se valida que el correo no este registrado.
        $sql_query = "SELECT correo from tours.usuario where correo='".$correo."'";
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result)==0) {
            
            // Se valida si la cedula existe o no. 
            $sql_query = "SELECT cedula from tours.usuario where cedula='".$cedula."'";
            $result = mysqli_query($con, $sql_query);
            if (mysqli_num_rows($result)==0) {
                $query = "INSERT INTO tours.usuario 
                (`nombre`, `apellido`, `correo`, `cedula`, `telefono`, `password` ,`fecha_nacimiento`, `vacunado`, `id_role`)  
                VALUES ('$nombre','$apellido','$correo','$cedula','$telefono', '$password', '$fecha_nacimiento', '2', '1')";
                mysqli_query($con, $query);
                
                header('Location: index.php');
            // --------------------------------------------------
            } else {
                $error = "Cédula ingresada ya está en el sistema.";
                $_SESSION["error"] = $error;
                header('Location: register.php');
                return;
            }
        // ------------------------------------------------------
        } else {
            $error = "El correo ingresado ya está en el sistema.";
            $_SESSION["error"] = $error;
            header('Location: register.php');
            return;
        }
    }

    if (mysqli_query($con, $sql)) {
        $type = "success";
        header('Location: index.php');
    } else {
        echo "ERROR: Hush! Sorry $sql "
            . mysqli_error($con);
    }

    mysqli_close($con);
?>