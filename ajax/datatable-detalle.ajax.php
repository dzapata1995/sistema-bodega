<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Controllers/orden.controlador.php";

require_once "../Model/productos.modelo.php";
require_once "../Model/orden.modelo.php";

class TablaDetalle {

    public function mostrarTablaDetalle(){
        $item = null;
        $valor = null;

        $detalle = ControladorOrden::ctrDetalleOrden($item, $valor);

        $datosJson = '{
            "data": [';

            for ($i = 0; $i < count($detalle); $i++) {

                $item = "id";

                $valor = $detalle[$i]["fk_producto"];
                $producto = ControladorProductos::ctrMostrarProductos($item, $valor);

                $datosJson .= '[
                    "'.($i+1).'",
                    "'.$producto["codigo_producto"].'",
                    "'.$producto["nombre_producto"].'"
                    "'.$detalle[$i]["reserva"].'",
                    "'.$detalle[$i]["utilizado"].'"
                ],';
            }
            $datosJson = substr($datosJson, 0,-1);

        $datosJson .= ']}';

        echo $datosJson;

        return;
    }
}

//Activar Tabla Detalle
$activarDetalle = new TablaDetalle();
$activarDetalle->mostrarTablaDetalle();