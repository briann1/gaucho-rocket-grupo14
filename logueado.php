<html>
<head>
<title></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/home.css">


</head>
<body>
<?php include("header.php")?>




<div class="container">

	<div class="alert alert-success" role="alert">
    <strong></strong> Estas logueado!
</div>
<br><br>
<?php
session_start();
$id_usuario="";
$nombre="";
$apellido="";
$rol_usuario="";
if (isset($_SESSION["id_usuario"])) {
		$id_usuario=$_SESSION["id_usuario"];

		include("conectar.php");
		$db=$mysqli;
	  $consulta="SELECT * FROM usuario JOIN rol_usuario ON usuario.id_rol=rol_usuario.id_rol  WHERE id=?";
	  $comm= $db->prepare($consulta);
	  $comm->bind_param("i", $id_usuario);
	  $comm->execute();//Ejecutar consulta
	  $query=$comm->get_result();
	  $resultado=$query->fetch_assoc();

		$nombre=$resultado["nombre"];
		$apellido=$resultado["apellido"];
		$rol_usuario=$resultado["descripcion"];


		/*if ($resultado["id_rol"]==1) {
      header("Location: sistema.php");
    }*/
}else {
	header("Location: login.php");
}
?>
<h3>Nombre: <?php echo $nombre;?></h3>
<h3>Apellido: <?php echo $apellido;?></h3>
<h3>Rol del usuario: <?php echo $rol_usuario;?></h3>
<br>
<a href="cerrarSesion.php"><button type="button" class="btn btn-outline-secondary">Cerrar sesión</button></a>
</div>







<?php include("footer.php")?>

<!-- Bootstrap core JS-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
