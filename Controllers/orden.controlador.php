<?php

class ControladorOrden {

    public static function ctrMostrarOrden($item, $valor) {
        $tabla = "orden";
        $respuesta = ModelOrden::mdlMostrarOrden($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrCrearOrden(){
        if (isset($_POST["ingCodigo"])){
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingCodigo"])){
                $tabla = "orden";

                $datos = array( "codigo_orden" => $_POST["ingCodigo"],
                                "descripcion_orden" => $_POST["ingDescripcion"],
                                "estado" => "Inactivo",
                                "fecha_inicio" => $_POST["fechaInicio"],
                                "fecha_termino" => $_POST["fechaFin"],
                                "fk_centrocosto" => $_POST["selectCentro"],
                                "fk_tareas" => $_POST["selectTarea"]);

                $respuesta = ModelOrden::mdlIngresarOrden($tabla, $datos);

                if ($respuesta == 'ok') {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "!La Orden fue creada con exito¡",
                            text: "A continuación asigne los productos",
                            showConfirmButton: true,
                            confirmButtonText: "Asignar"
                        }).then(function (result) {
                            if (result.value){
                                window.location = "asignar"
                            }
                        });
                    </script>';
                } else {
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "!Problemas al guardar la orden¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value){
                                window.location = "orden";
                            }
                        });
                    </script>';
                }
            }
        }
    }

    public static function ctrAddProduct(){
        if (isset($_POST["selectOrden"])){
            $tabla = "orden_producto";

            $datos = array( "fk_orden" => $_POST["selectOrden"],
                "fk_producto" => $_POST["productoId"],
                "reservado" => $_POST["nuevaCantidadProducto"]);

            $respuesta = ModelOrden::mdlAsignarProductos($tabla, $datos);

            if ($respuesta == 'ok') {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "!Productos Asignados Correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value){
                                window.location = "list-orden";
                            }
                        });
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "!Problemas al Asignar los Productos¡",
                            text: "Vuelva a registrar la orden por favor.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {
                            if (result.value){
                                window.location = "orden";
                            }
                        });
                    </script>';
            }
        }
    }

    public static function ctrDetalleOrden($item, $valor) {
        $tabla = "orden_producto";
        $respuesta = ModelOrden::mdlDetalleOrden($tabla, $item, $valor);
        return $respuesta;
    }

}