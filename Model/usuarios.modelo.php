<?php

require_once "conexion.php";

class ModeloUsuarios {

     public static function mdlMostrarUsuarios($tabla, $item, $valor) {

         if ($item != null) {

             $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
             $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
             $stmt -> execute();

             return $stmt -> fetch();

         } else {

             $stmt = Conexion::conectar()->prepare("SELECT * From $tabla");
             $stmt -> execute();

             return $stmt -> fetchAll();

         }

         $stmt->close();
         $stmt = null;
    }

    public static function mdlIngresarUsuario($tabla, $datos){

         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, run, password, rol, foto) VALUES (:nombre, :run, :password, :rol, :foto)");

         $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
         $stmt->bindParam(":run", $datos["run"], PDO::PARAM_STR);
         $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
         $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
         $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

         if ($stmt->execute()) {
             return "ok";
         } else {
             return "error";
         }

        $stmt->close();
        $stmt = null;

    }

    public static function mdlEditarUsuario($tabla, $datos){
         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, rol = :rol, foto = :foto WHERE run = :run");

         $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
         $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
         $stmt -> bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
         $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
         $stmt -> bindParam(":run", $datos["run"], PDO::PARAM_STR);

         if ($stmt->execute()) {
             return "ok";
         } else {
             return "error";
         }
         $stmt -> close();
         $stmt = null;
    }

    public static function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

         $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
         $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

         if ($stmt -> execute()) {
             return "ok";
         } else {
             return "error";
         }

         $stmt -> close();

         $stmt = null;

    }

}