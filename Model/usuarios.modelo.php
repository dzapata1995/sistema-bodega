<?php

require_once "conexion.php";

class ModeloUsuarios {

     public static function mdlMostrarUsuarios($tabla, $item, $valor) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt->close();
        $stmt = null;
    }

    public static function mdlIngresarUsuario($tabla, $datos){

         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, run, password, rol) VALUES (:nombre, :run, :password, :rol)");

         $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
         $stmt->bindParam(":run", $datos["run"], PDO::PARAM_STR);
         $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
         $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);

         if ($stmt->execute()) {
             return "ok";
         } else {
             return "error";
         }

        $stmt->close();
        $stmt = null;

    }

}