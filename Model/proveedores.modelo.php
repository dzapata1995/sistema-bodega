<?php

require_once "conexion.php";

class ModeloProveedores{

    public static function mdlMostrarProveedores($tabla, $item, $valor){
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlIngresarProveedores($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, rut, rubro, n_contacto, email) VALUES (:nombre, :rut, :rubro, :n_contacto, :email)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $stmt->bindParam(":rubro", $datos["rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":n_contacto", $datos["n_contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}