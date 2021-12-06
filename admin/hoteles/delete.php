<?php

session_start();

$confirm = "Se eliminó el elemento de manera exitosa.";

// Process delete operation after confirmation
if (isset($_POST["id_hotel"]) && !empty($_POST["id_hotel"])) {
    // Include config file
    require_once "../../config.php";

    // Prepare a delete statement
    $sql = "DELETE FROM tours.hotel WHERE id_hotel = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_POST["id_hotel"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $query = "ALTER TABLE tours.hotel AUTO_INCREMENT = 1";
            mysqli_query($con, $query);
            // Records deleted successfully. Redirect to landing page
            $_SESSION["confirm"] = $confirm;
            header("location: hoteles.php");
            exit();
        } else {
            echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Registro</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost:8080/Login/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost:8080/Login/assets/css/dashboard.css" rel="stylesheet">

    <style>
        .wrapper {
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
                    <h2 class="mt-5 mb-3">Borrar Chofer</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input hidden id="id_hotel" name="id_hotel" value="<?php echo trim($_GET["id_hotel"]); ?>" />
                            <p>Está seguro que quiere eliminar este registro?</p>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="hoteles.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>