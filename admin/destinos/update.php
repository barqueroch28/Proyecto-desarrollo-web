<?php
    // Include config file
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    require_once "../../config.php";
    
    // Define variables and initialize with empty values
    $nombre = $ubicacion = $descr = $costo = $imagen = "";
    $nombre_err = $ubicacion_err = $descr_err = $costo_err = "";
    
    // Processing form data when form is submitted
    if(isset($_POST["id_destino"]) && !empty($_POST["id_destino"])){
        // Get hidden input value
        $id_destino = $_POST["id_destino"];
        
        // Validate nombre
        $input_nombre = trim($_POST["nombre"]);
        $nombre = $input_nombre;
        
        // Validate ubicacion ubicacion
        $input_ubicacion = trim($_POST["ubicacion"]);
        $ubicacion = $input_ubicacion;
        
        // Validate descr
        $input_descr = trim($_POST["descr"]);
        $descr = $input_descr;

        $input_costo = trim($_POST["costo"]);
        $costo = $input_costo;

        $input_imagen = trim($_POST["imagen"]);
        $imagen = $input_imagen;

        
        // Check input errors before inserting in database
        if(empty($nombre_err) && empty($ubicacion_err) && empty($descr_err) && empty($costo_err)){
            // Prepare an update statement
            $sql = "UPDATE tours.destino SET nombre=?, ubicacion=?, descripcion=?, costo=?, imagen=? WHERE id_destino=?";
            
            if($stmt = mysqli_prepare($con, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssi", $param_nombre, $param_ubicacion, $param_descr, $param_costo, $param_imagen, $param_id);
                
                // Set parameters
                $param_nombre = $nombre;
                $param_ubicacion = $ubicacion;
                $param_descr = $descr;
                $param_costo = $costo;
                $param_imagen = $imagen;
                $param_id = $id_destino;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records updated successfully. Redirect to landing page
                    header("location: destinos.php");
                    exit();
                } else{
                    echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                }

            }
            
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($con);
    } else{
        // Check existence of id_destino parameter before processing further
        if(isset($_GET["id_destino"]) && !empty(trim($_GET["id_destino"]))){
            // Get URL parameter
            $id_destino =  trim($_GET["id_destino"]);
            
            // Prepare a select statement
            $sql = "SELECT * FROM tours.destino WHERE id_destino = ?";
            if($stmt = mysqli_prepare($con, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                // Set parameters
                $param_id = $id_destino;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
        
                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array. Since the result set
                        contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        // Retrieve individual field value
                        $nombre = $row["nombre"];
                        $ubicacion = $row["ubicacion"];
                        $descr = $row["descripcion"];
                        $costo = $row["costo"];
                        $imagen = $row["imagen"];
                    } else{
                        // URL doesn't contain valid id_destino. Redirect to error page
                        header("location: destinos.php");
                        exit();
                    }
                    
                } else{
                    echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                }
            }
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($con);
        }  else{
            header("location: destinos.php");
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
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Actualizar Destino</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input required type="text" name="nombre" class="form-control appointment_date <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nombre; ?>">
                            <span class="invalid-feedback"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Ubicación</label>
                            <input required name="ubicacion" type="text" class="form-control appointment_date <?php echo (!empty($ubicacion_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ubicacion; ?>">
                            <span class="invalid-feedback"><?php echo $ubicacion_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea required required rows="5" name="descr" class="form-control appointment_date <?php echo (!empty($descr_err)) ? 'is-invalid' : ''; ?>"><?php echo $descr; ?></textarea>
                            <span class="invalid-feedback"><?php echo $descr_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Costo</label>
                            <input required min="0" pattern=" 0+\.[0-9]*[1-9][0-9]*$" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="number" name="costo" class="form-control" value="<?php echo $costo; ?>">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <div class="input-group">
                                <input required id="imagen" name="imagen" type="file" class="form-control-file">
                            </div>
                        </div>
                        <input type="hidden" name="id_destino" value="<?php echo $id_destino; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="destinos.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>