<?php

require_once "conexion.php";

class ModeloProductos {
    public static function mdlMostrarProductos($tabla, $item, $valor) {
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

    public static function mdlIngresarProductos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_producto, nombre_producto, descripcion, imagen, unidad_medida, fk_bodega) VALUES (:codigo_producto, :nombre_producto, :descripcion, :imagen, :unidad_medida, :fk_bodega)");

        $stmt->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":unidad_medida", $datos["unidad_medida"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_bodega", $datos["fk_bodega"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    public static function mdlEditarProducto($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_producto = :nombre_producto, descripcion = :descripcion,
                 imagen = :imagen, unidad_medida = :unidad_medida, fk_bodega = :fk_bodega");

        $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":unidad_medida", $datos["unidad_medida"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_bodega", $datos["fk_bodega"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    public static function mdlActualizarProducto($tabla, $item1, $valor1, $valor) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :$id");

        $stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt->null;
    }
}