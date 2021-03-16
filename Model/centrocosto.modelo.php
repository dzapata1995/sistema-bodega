<?php

require_once "conexion.php";

class ModeloCentroCosto {
    public static function mldMostrarCentroCostos($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlIngresarCentroCostos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_cc, estacion, fruta) VALUES (:codigo_cc, :estacion, :fruta)");

        $stmt->bindParam(":codigo_cc", $datos["codigo_cc"], PDO::PARAM_STR);
        $stmt->bindParam(":estacion", $datos["estacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fruta", $datos["fruta"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}