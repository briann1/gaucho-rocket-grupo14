<?php
require_once "mainModel.php";

class usuarioModelo extends mainModel
{


    /*-------- Modelo agregar usuario  -----*/

    protected static function agregar_usuario_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO usuario(
         nombre,apellido,email,id_rol,clave,codigo_alta)
         VALUES(:Nombre,:Apellido,:Email,:Rol,:Clave,:CodigoAlta)");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Email", $datos['Email']);
        $sql->bindParam(":Rol", $datos['Rol']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam("CodigoAlta",$datos['CodigoAlta']);
        $sql->execute();
        return $sql;
    }
    }


