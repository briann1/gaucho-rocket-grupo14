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
    </>  VALIDAR REGISTRO
    </h3>
    
</div>

<!-- Content -->
<div class="container-fluid">




<?php 
include("conectar.php");

$muestroFormulario="SI";

if(isset($_POST["Validar"])){
$clave=$_POST["codigo_alta"];
$email=$_POST["email"];
$pass=md5($_POST["pass"]);

$sql=$mysqli->prepare("SELECT * FROM  usuario WHERE codigo_alta=? and email=?  and clave=? ");
$sql->bind_param("sss",$clave,$email,$pass);
$sql->execute();
$result = $sql->get_result();
$rows=$result->num_rows; 

if($rows>0){
	$mensaje="Se valido correctamente";
	$muestroFormulario="NO";
	$usuarioObjet=$result->fetch_assoc();
 	$id_usuario=$usuarioObjet["id"];
 	$sql=$mysqli->prepare("UPDATE usuario SET codigo_alta=null WHERE id=? ");
	$sql->bind_param("s",$id_usuario);
	$sql->execute();



}else{
$mensaje="Algun dato es incorrecto";
}


}else{ 
$mensaje="";
$clave=$_GET["codigo_alta"];
}

if($muestroFormulario=="SI"){ 

$sql=$mysqli->prepare("SELECT * FROM  usuario WHERE codigo_alta=?");
$sql->bind_param("s",$clave);
$sql->execute();

if($mysqli->error){
	echo $mysqli->error;
}

$result = $sql->get_result();
$rows=$result->num_rows; 
if($rows>0){
?> 
<p><?php echo $mensaje;?></p> 
<form method="POST" action="loginValidarRegistro.php" class="form-neon">

<input type="hidden" name="codigo_alta" value="<?php echo $clave;?>">
 
                      <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Email:</label>
							
<input type="text" name="email" placeholder="Email:" class="form-control">

</div>
            <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Password:</label>
<input type="password" name="pass" placeholder="Password:" class="form-control">
</div>

<input type="submit" value="Validar" name="Validar"  class="btn btn-raised btn-info btn-sm">
</form>
<?php
}else{
		echo "El codigo es invalido";
	
}  



} 
else{
	echo "<p>La validacion se logro correctamente.Puede ingresar al sistema haciendo clic <a href='login.php'>aquí</a>.</p>";

}

?>



</div>







    

<footer class="w3-center" style="margin-top:200px">Gauchorocket.com.ar</footer>
</body>
</html>

 