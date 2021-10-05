<html>
<title>linkValidarRegistro.php</title>
<body>
<h4>linkValidarRegistro.php</h4>
<?php 
include("conectar.php");

$clave=$_GET["codigo_alta"];

$sql=$mysqli->prepare("SELECT * FROM  credencial WHERE codigo_alta=?");
$sql->bind_param("s",$clave);
$sql->execute();

if($mysqli->error){
	echo $mysqli->error;
}

$result = $sql->get_result();
$rows=$result->num_rows; 
if($rows>0){
 ?>

<a href="loginValidarRegistro.php?codigo_alta=<?php echo $clave;?>">Validar Registro</a>
<?php
}
else{
	
	echo "El codigo es invalido";
}

?>


</body>
<html>