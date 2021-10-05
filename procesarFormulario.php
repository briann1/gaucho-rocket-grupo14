<?php
$peticionUsuario=true;
require_once "APP.php";
if(isset($_POST['usuario_nombre_reg'])){

    /*-------- Instancia al controlador -----*/
    require_once"usuarioControlador.php";
    $ins_usuario= new usuarioControlador();

    /*-------- Agregar un usuario -----*/

    //if(isset($_POST['usuario_mail_reg'])) {
    if(isset($_POST['usuario_nombre_reg']) && isset ($_POST['usuario_apellido_reg'])) //usuario_mail_reg
    {
        echo $ins_usuario->agregar_usuario_controlador();
    } else {
    session_start(['name' => 'GAUCHOROCKET1']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "/");
    exit();


}

}