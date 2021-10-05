<?php
if ($peticionUsuario) {

    require_once "usuarioModelo.php";

} else {

    require_once "usuarioModelo.php";

}

class usuarioControlador extends usuarioModelo
{
    /*-------- Controlador agregar usuario  -----*/
    public function agregar_usuario_controlador()
    {

        $nombre = mainModel::limpiar_cadena($_POST['usuario_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['usuario_apellido_reg']);
        $email = mainModel::limpiar_cadena($_POST['usuario_email_reg']);
        $clave1 = mainModel::limpiar_cadena($_POST['usuario_clave_1_reg']);
        $clave2 = mainModel::limpiar_cadena($_POST['usuario_clave_2_reg']);

        /*===comprobar campos vacios ==*/
        if ($nombre == "" || $apellido == "" || $email == "" || $clave1 == "" || $clave2 == "") {

            echo "campos vacio verificar por favor";

            /*===Verificando integridad de los datos ==*/
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}", $nombre)) {
            echo "campo nombre invalido";

        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $apellido)) {
            echo "campo apellido invalido";

        }
        if (mainModel::verificar_datos("[a-zA-Z0-9$@.-]{4,8}", $clave1) || mainModel::verificar_datos("[a-zA-Z0-9$@.-]{4,8}", $clave2)) {
            echo "contraseñas no coinciden con el formato especificado";
        }
        /*== Comprobando email  ==*/

        if ($email != "") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = mainModel::ejecutar_consulta_simple("SELECT email FROM usuario WHERE email='$email'");

                if ($check_email->rowCount() > 0) {
                    echo "Email ya REGISTRADO";
                }
            } else {
                echo "Email invalido, revise nuevamente";
            }
        }
        /*== Comprobando claves  ==*/

        if ($clave1 != $clave2) {

            echo "Las claves que ingresadas no COINCIDEN";

        } else {
       //     $clave = mainModel::encryption($clave1);
	        $clave = md5($clave1);
            $clave_alta=md5($clave2);
      


           //$clave_alta=md5($clave2);
             $datos_usuario_reg = [
                "Nombre" => $nombre,
                "Apellido" => $apellido,
                "Email" => $email,
                "Clave" => $clave,
                "Rol" => 2,
                "CodigoAlta" => $clave_alta,
            ];

            $agregar_usuario = usuarioModelo::agregar_usuario_modelo($datos_usuario_reg);
        if ($agregar_usuario->rowCount() == 1) {

                echo "<a href='loginValidarRegistro.php?codigo_alta=$clave_alta'>Validar Registro</a>";

            } else {

                echo "No hemos podido registrar el usuario";

            }
			
			
		}
        
		
		}


} /* fin controlador */









