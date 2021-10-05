<?php
$email="";
$clave="";

  if (isset($_POST["email"])){$email=$_POST["email"];}
  if (isset($_POST["clave"])){$clave=$_POST["clave"];}

  include("conectar.php");
  echo $email."<br>";
  echo $clave."<br>";

  $clave=md5($clave);
  echo $clave."<br>";
  $db=$mysqli;

  $resultado=validarEmail($db, $email, $clave);
  iniciarSesion($resultado, $db);

  function validarEmail($db, $email, $clave){
    $consulta="SELECT * FROM usuario where email=? AND clave=?";
    $comm= $db->prepare($consulta);
    $comm->bind_param("ss", $email, $clave);
    $comm->execute();//Ejecutar consulta
    $query=$comm->get_result();
    $resultado=$query->num_rows;
    echo "filas".$resultado;

    if ($resultado!=0) {
      $resultado=$query->fetch_assoc();
      $id_usuario=$resultado["id"];
      $resultado=$id_usuario;
    }

    return $resultado;
  }
  function iniciarSesion($resultado, $db){
    $id_usuario=$resultado;
    if ($id_usuario!=0) {
        tipoLogueado($id_usuario, $db);
    }else {
header("Location: login.php?msg=false");
    }
  }

  function tipoLogueado($id_usuario, $db){
    $consulta="SELECT id_rol FROM usuario WHERE id=".$id_usuario;
    $query=$db->query($consulta);
    $resultado=$query->fetch_assoc();
    $id_rol=$resultado["id_rol"];
    $db->close();

    //ID del usuario
    session_start();
    $_SESSION["id_usuario"]=$id_usuario;

    if ($id_rol==1) {
      header("Location: sistema.php");
    }
    else {
      header("Location: logueado.php");
    }
  }
?>
