<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>PuraVidaTours | Crear cuenta</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8080/Login/assets/css/login.css">

    <link rel="icon" href="img/favicon.png">

    <style>
        body {
            background-image: url(./img/fondologin.jpg);
            background-repeat: no-repeat;
            background-size: 100% auto;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: navy;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            align-items: center;
            justify-content: center;

        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 10%;
            border-radius: 20%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        .modal {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script>
        var check = function () {
            if ((document.getElementById('password').value == document.getElementById('repass').value) && document.getElementById('password').value.length > 0) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Las contraseñas coinciden.';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Verifique los datos de la contraseña.';
            }
        }
    </script>
</head>

<body class="imagen">
    <div class="container">
        <div class="card login-card" style="margin-top: 25px;">
            <div class="row no-gutters">
                <div class="col-md-7">
                    <img src="img/register.png" alt="register.png" class="login-card-img">
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <p class="login-card-description">Registro</p>
                        <div style="margin-top: -20px;">
                            <?php
                            if(isset($_SESSION["error"])) {
                                $error = $_SESSION["error"];
                                echo "  <span style='color: red; font-size: 15px;'>$error</span>";
                            }
                            ?>
                        </div>
                        <div align="center">
                            <form class="was-validated" action="insert.php" method="post" id="reg_form" oninput='repass.setCustomValidity(repass.value != password.value ? "Passwords do not match." : "")'>

                                <input required class="form-control" name="nombre" type="text" id="nombre" placeholder="Escriba su nombre" autofocus=""/>

                                <input required class="form-control" name="apellido" type="text" id="apellido" placeholder="Escriba sus apellidos"/>

                                <input required class="form-control" name="cedula" type="text" id="cedula" placeholder="Escriba su cédula"/>

                                <input required class="form-control" name="telefono" maxlength="8" type="text" id="telefono" placeholder="Escriba su teléfono"/>

                                <div align="left">
                                    <h6><label for="fechanacimiento">Fecha Nacimiento:</label></h6>
                                </div>
                                <input required class="form-control" type="date" id="fecha_nacimiento"
                                    name="fecha_nacimiento" min="1900-01-01" max="2021-12-31">

                                <input required class="form-control" name="correo" type="email" id="correo"
                                    placeholder="Escriba su correo" />

                                <input required class="form-control" type="password" name="password" id="password"
                                    placeholder="Establezca su contraseña" onkeyup='check();'>

                                <input required class="form-control" type="password" name="repass" id="repass"
                                    placeholder="Confirmar contraseña" onkeyup='check();' />
                                <br>
                                <div class="d-grid">
                                    <input type="submit" style="background-color: #198754;" value="Registrarme"
                                        placeholder="Registrarme" class="btn btn-success btn-block" name="reg_user"
                                        id="reg_user" />
                                </div>
                                <p>
                            </form>
                        </div>
                        <div align="center">
                            <a style="color: #00a516;" href="index.php">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        $(function() {
            $("input[name='telefono']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='cedula']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>

</body>

</html>

<?php
    unset($_SESSION["error"]);
?>