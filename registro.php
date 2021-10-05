<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="./css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="./js/sweetalert2.min.js" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="./css/style.css">

<link rel="icon" type="image/png" href="imagenes/logo.png">

<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/home.css">

<link rel="stylesheet" href="css/icons/icons.css">

</head>

<body>
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
    </>  REGISTRO DE  USUARIOS
    </h3>
    <p class="text-justify">  </p>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="procesarFormulario.php" class="form-neon" method="POST" data-form="save" autocomplete="off">
        <fieldset>
            </i> &nbsp; Información personal
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="usuario_nombre_reg" id="usuario_nombre" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_apellido" class="bmd-label-floating">Apellido</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="usuario_apellido_reg" id="usuario_apellido" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="usuario_email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="usuario_email_reg" id="usuario_email" maxlength="70">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_1" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="usuario_clave_1_reg" id="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{4,8}" maxlength="100" required="" >
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_2" class="bmd-label-floating">Repetir contraseña</label>
                            <input type="password" class="form-control" name="usuario_clave_2_reg" id="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{4,8}" maxlength="100" required="" >
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"></>LIMPIAR</button>

            <button type="submit" class="btn btn-raised btn-info btn-sm"></i>Registrarme</button>
        </p>
    </form>
</div>







    

<footer class="w3-center" style="margin-top:200px">Gauchorocket.com.ar</footer>
</body>
</html>