<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $nombre = $apellidos = $fecha_nacimiento = $correo =  "";
$username_err = $fecha_nacimiento_err = $nombre_err = $apellidos_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id_usuario"]) && !empty($_POST["id_usuario"])){
    // Get hidden input value
    $id_usuario = $_POST["id_usuario"];
    
    $input_username = trim($_POST["username"]);
    $username = $input_username;
    
    $input_nombre = trim($_POST["nombre"]);
    $nombre = $input_nombre;
    
    $input_apellidos = trim($_POST["apellidos"]);
    $apellidos = $input_apellidos;

    $input_fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
    $fecha_nacimiento = $input_fecha_nacimiento;

    $input_correo = trim($_POST["correo"]);
    $correo = $input_correo;
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($fecha_nacimiento_err) && empty($nombre_err) && empty($apellidos_err)){
        // Prepare an update statement
        $sql = "UPDATE usuario SET username=?, nombre=?, apellidos=?, fecha_nacimiento=?, correo=? WHERE id_usuario=?";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_username, $param_nombre, $param_apellidos, $param_fecha_nacimiento, $param_correo , $param_id);
            
            // Set parameters
            $param_username = $username;
            $param_nombre = $nombre;
            $param_apellidos = $apellidos;
            $param_fecha_nacimiento = $fecha_nacimiento;
            $param_correo = $correo;
            $param_id = $id_usuario;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: choferes.php");
                exit();
            } else{
                echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
} else{
    // Check existence of id_usuario parameter before processing further
    if(isset($_GET["id_usuario"]) && !empty(trim($_GET["id_usuario"]))){
        // Get URL parameter
        $id_usuario =  trim($_GET["id_usuario"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM usuario WHERE id_usuario = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id_usuario;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["username"];
                    $nombre = $row["nombre"];
                    $apellidos = $row["apellidos"];
                    $fecha_nacimiento = $row["fecha_nacimiento"];
                    $correo = $row["correo"];
                } else{
                    // URL doesn't contain valid id_usuario. Redirect to error page
                    header("location: choferes.php");
                    exit();
                }
                
            } else{
                echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($con);
    }  else{
        header("location: choferes.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Actualizar Chofer</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input type="text" name="username" type="text" class="form-control appointment_date <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" type="text" class="form-control appointment_date <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nombre; ?>">
                            <span class="invalid-feedback"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" name="apellidos" type="text" class="form-control<?php echo (!empty($apellidos_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $apellidos; ?>">
                            <span class="invalid-feedback"><?php echo $apellidos_err;?></span>
                        </div>
                        <div class="form-group">
                             <label>Fecha de nacimiento</label>
                            <input type="text" name="fecha_nacimiento" type="text" class="form-control" value="<?php echo $fecha_nacimiento; ?>">
                        </div>
                        <div class="form-group">
                             <label>Correo</label>
                            <input type="text" name="correo" type="text" class="form-control" value="<?php echo $correo; ?>">
                        </div>
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="choferes.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>


</body>
</html>