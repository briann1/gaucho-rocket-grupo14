<?php
session_start();
if (isset($_SESSION["id_usuario"])) {
		$id_usuario=id_usuario();


    include("conectar.php");
		$db=$mysqli;
    $consulta="SELECT id_rol FROM usuario WHERE id=".$id_usuario;
    $query=$db->query($consulta);
    $resultado=$query->fetch_assoc();
    $id_rol=$resultado["id_rol"];
    $db->close();

	if ($id_rol==2) {
      header("Location: logueado.php");
    }
}else {
  header("Location: login.php");
}
function id_usuario(){
    return $_SESSION["id_usuario"];
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="imagenes/logo.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/sidebar.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end border-right bg-light" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><a href="index.php">Home</a></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-light" href="#!">Administración Web</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-light" href="#!">Generar factura</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-light border-bottom" href="#!">Reportes de gestión </a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">




        </ul>

    <a href="cerrarSesion.php"><button class="btn btn-light" style="border:none;">
    Cerrar sesión
        <!--<i class="material-icons">logout</i>-->
  </button></a>
      </div>
    </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h3 class="mt-4">Lista de usuarios</h3><br>








  <table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Rol del usuario</th>
        <th></th>
    </tr>
  </thead>
  <tbody>

    <?php
    include("conectar.php");
		$db=$mysqli;
    $consulta="SELECT * FROM usuario JOIN rol_usuario ON usuario.id_rol=rol_usuario.id_rol ORDER BY id ASC";
      $query=$db->query($consulta);
      while($resultado=$query->fetch_assoc()){
        //echo $resultado["id"].$resultado["nombre"].$resultado["apellido"].$resultado["email"].$resultado["descripcion"]."<br>";
        echo fila($resultado["id"], $resultado["nombre"], $resultado["apellido"], $resultado["email"], $resultado["descripcion"]);
      }
      $db->close();

function fila($id, $nombre, $apellido, $email, $id_rol){
$admin="";
if($id==id_usuario()){$admin='class="text-success"';}
  $fila='<tr>
    <th scope="row" '.$admin.'>'.$id.'</th>
    <td '.$admin.'>'.$nombre.'</td>
    <td '.$admin.'>'.$apellido.'</td>
    <td '.$admin.'>'.$email.'</td>
    <td '.$admin.'>'.$id_rol.'</td>
    <td>
      <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Cambiar rol del usuario</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <form action="cambiarRolDelUsuario.php" method="post">
                <input type="hidden" name="id_usuario" value="'.$id.'">
                <button class="dropdown-item" type="submit" name="rol_usuario" value="1">Administrador</button>
                <button class="dropdown-item" type="submit" name="rol_usuario" value="2">Usuario</button>
              </form>
            </div>
      </div>
    </td>
  </tr>';
  return $fila;
}
    ?>

    

  </tbody>
</table>
                </div>
            </div>
        </div>
    <!-- Bootstrap core JS-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar.js"></script>


    </body>
</html>
