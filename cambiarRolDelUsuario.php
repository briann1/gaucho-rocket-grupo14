<?php
$id_usuario="";
$nuevo_rol_usuario="";

  if (isset($_POST["id_usuario"])){
    if (isset($_POST["rol_usuario"])){
        $id_usuario=$_POST["id_usuario"];
        $nuevo_rol_usuario=$_POST["rol_usuario"];

        include("conectar.php");
        echo $id_usuario."<br>";
        echo $nuevo_rol_usuario."<br>";

        include("conectar.php");
        $db=$mysqli;
        $consulta="UPDATE usuario SET id_rol=".$nuevo_rol_usuario." WHERE id=".$id_usuario." AND codigo_alta IS NULL";
        $query=$db->query($consulta);
        $db->close();
        header("Location: sistema.php");
    }
  }
?>
