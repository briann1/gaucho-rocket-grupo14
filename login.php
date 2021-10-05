<?php
session_start();
if (isset($_SESSION["id_usuario"])) {
		$id_usuario=$_SESSION["id_usuario"];


    include("conectar.php");
		$db=$mysqli;
    $consulta="SELECT id_rol FROM usuario WHERE id=".$id_usuario;
    $query=$db->query($consulta);
    $resultado=$query->fetch_assoc();
    $id_rol=$resultado["id_rol"];
    $db->close();

	if ($id_rol==1) {
      header("Location: sistema.php");
    }
		else {
			header("Location: logueado.php");
		}
}
?>
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
     
    </h3>
    <p class="text-justify">  </p>
</div>
<?php
if (isset($_GET["msg"])) {
	if ($_GET["msg"]="false") {
		echo '<div class="container"><div class="alert alert-danger" role="alert">
		  <strong></strong> El email o contraseña es incorrecto!
		</div></div>';
	}
}
?>
<!-- Content -->
<div class="container-fluid">
    <style>form{width: 500px;margin: auto;}@media(max-width:600px){form{width: 100%;}}</style>
    <form action="procesarLogin.php" class="form-neon" method="POST" data-form="save" autocomplete="off">
        <div class="container" style="text-align:center;"><h3>Login</h3></div><br>
        <fieldset>
            &nbsp;
            <div class="container-fluid">
                <div class="row">
                    
                    
                
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="usuario_email" class="bmd-label-floating">Email</label>
                            <input required type="email" class="form-control" name="email" maxlength="70">
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="usuario_clave_1" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="clave"  maxlength="100" required>
                        </div>
                    </div>
                    
                </div>
            </div>
        </fieldset>
        <br>
        <p class="text-center" style="margin-top: 40px;">
            

            <button type="submit" class="btn btn-raised btn-info btn-sm">Iniciar sesión</button>
            
        </p>
        <hr>
        <p class="text-center" style="margin-top: 40px;">
        <a href="registro.php"class="btn">Registrarme</a></p>
    </form>
</div>







    

<footer class="w3-center" style="margin-top:200px">Gauchorocket.com.ar</footer>
</body>
</html>