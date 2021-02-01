<?php

require_once "conexion.php";

class ModeloCentroCosto {
    public static function mldMostrarCentroCostos($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlIngresarCentroCostos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, estacion, fruta) VALUES (:codigo, :estacion, :fruta)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":estacion", $datos["estacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fruta", $datos["fruta"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}