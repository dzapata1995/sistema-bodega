<?php

require_once "conexion.php";

class ModeloTareas {

    public static function mdlMostrarTareas($tabla, $item, $valor) {
        if ($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlIngresarTarea($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_tarea, ano, descripcion) VALUES (:nombre_tarea, :ano, :descripcion)");

        $stmt->bindParam(":nombre_tarea", $datos["nombre_tarea"], PDO::PARAM_STR);
        $stmt->bindParam(":ano", $datos["ano"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt=null;

    }
}