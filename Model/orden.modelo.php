<?php

require_once "conexion.php";

class ModelOrden {

    public static function mdlMostrarOrden($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlDetalleOrden($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");
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

    public static function mdlIngresarOrden($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_orden, descripcion_orden, estado, fecha_inicio, fecha_termino, fk_centrocosto, fk_tareas) VALUES (:codigo_orden, :descripcion_orden, :estado, :fecha_inicio, :fecha_termino, :fk_centrocosto, :fk_tareas)");

        $stmt->bindParam(":codigo_orden", $datos["codigo_orden"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_orden", $datos["descripcion_orden"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_termino", $datos["fecha_termino"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_centrocosto", $datos["fk_centrocosto"], PDO::PARAM_INT);
        $stmt->bindParam(":fk_tareas", $datos["fk_tareas"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlAsignarProductos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fk_orden, fk_producto, reservado) VALUES (:fk_orden, :fk_producto, :reservado)");

        for ($i=0; $i < count($datos["fk_producto"]); $i++) {

            $stmt->bindParam(":fk_orden", $datos["fk_orden"], PDO::PARAM_INT);
            $stmt->bindParam(":fk_producto", $datos["fk_producto"][$i], PDO::PARAM_INT);
            $stmt->bindParam(":reservado", $datos["reservado"][$i], PDO::PARAM_INT);

            $stmt->execute();
        }

        return "ok";

        $stmt->close();
        $stmt = null;

    }

}