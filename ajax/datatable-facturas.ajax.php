<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Model/productos.modelo.php";

class TablaProductosFacturas {

    public function mostrarTablaProductosFacturas() {
        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        if (count($productos) == 0) {
            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';

            for ($i = 0; $i < count($productos); $i++) {

                $imagen = "<img src='".$productos[$i]["imagen"]."' width='50px'>";

                $botones = "<div class='project-actions text-center'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'><i class='fas fa-plus'></i></button></div>";

                if ($productos[$i]["cantidad_total"] <= 10) {
                    $stock = "<button style='width: 50px;' class='btn btn-danger disabled'>".$productos[$i]["cantidad_total"]."</button>";
                }else if ($productos[$i]["cantidad_total"] > 11 && $productos[$i]["cantidad_total"] <= 15) {
                    $stock = "<button style='width: 50px;' class='btn btn-warning disabled'>".$productos[$i]["cantidad_total"]."</button>";
                } else {
                    $stock = "<button style='width: 50px;' class='btn btn-success disabled'>".$productos[$i]["cantidad_total"]."</button>";
                }

                $datosJson .= '[
                    "'.($i+1).'",
                    "'.$productos[$i]["codigo_producto"].'",
                    "'.$productos[$i]["nombre_producto"].'",
                    "'.$imagen.'",
                    "'.$stock.'",
                    "'.$botones.'"
                ],';

            }

            $datosJson = substr($datosJson, 0, -1);

            $datosJson .= ']}';

        echo $datosJson;

        return;
    }
}

/* Activar Tabla de Productos */
$activarProductoFacturas = new TablaProductosFacturas();
$activarProductoFacturas -> mostrarTablaProductosFacturas();