<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Model/productos.modelo.php";

class TablaProductosOrden {

    public function mostrarTablaProductosOrden() {
        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        if (count($productos) == 0) {
            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data" : [';

            for ($i = 0; $i < count($productos); $i++) {
                $imagen = "<img src='".$productos[$i]["imagen"]."' width='50px'>";

                $botones = "<div class='project-actions text-center'><button class='btn btn-primary AddProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'><i class='fas fa-plus'></i></button></div>";

                if ($productos[$i]["cantidad_total"] <= 0) {
                    $stock = "<button style='width: 50px;' class='btn btn-outline-danger disabled'>".$productos[$i]["cantidad_total"]."</button>";
                }else if ($productos[$i]["cantidad_total"] > 11 && $productos[$i]["cantidad_total"] <= 15){
                    $stock = "<button style='width: 50px;' class='btn btn-outline-warning disabled'>".$productos[$i]["cantidad_total"]."</button>";
                } else {
                    $stock = "<button style='width: 50px;' class='btn btn-outline-success disabled'>".$productos[$i]["cantidad_total"]."</button>";
                }

                $datosJson .= '[
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
$activarProductosOrden = new TablaProductosOrden();
$activarProductosOrden -> mostrarTablaProductosOrden();