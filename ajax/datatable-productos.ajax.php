<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Model/productos.modelo.php";

require_once "../Controllers/varios.controlador.php";
require_once "../Model/varios.modelo.php";

class TablaProductos {
    public function mostrarTablaProductos() {

        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);


        $datosJson = '{
            "data": [';

            for ($i = 0; $i < count($productos); $i++) {

                $item = "id";
                $valor = $productos[$i]["fk_bodega"];

                $bodega = ControladorVarios::ctrMostrarBodega($item, $valor);
                $botones = "<div class='btn-group'><button class='btn btn-success btnVerProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalVerProducto'><i class='fas fa-eye'></i></button><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-edit'></i></button></div>";

                if ($productos[$i]["cantidad_total"] <= 10) {
                    $stock = "<button style='width: 150px;' class='btn btn-danger disabled'>".$productos[$i]["cantidad_total"]." ".$productos[$i]["unidad_medida"]."</button>";
                }else if ($productos[$i]["cantidad_total"] > 11 && $productos[$i]["cantidad_total"] <= 15) {
                    $stock = "<button style='width: 150px;' class='btn btn-warning disabled'>".$productos[$i]["cantidad_total"]." ".$productos[$i]["unidad_medida"]."</button>";
                } else {
                    $stock = "<button style='width: 150px;' class='btn btn-success disabled'>".$productos[$i]["cantidad_total"]." ".$productos[$i]["unidad_medida"]."</button>";
                }

                $datosJson .= '[
                    "'.($i+1).'",
                    "'.$productos[$i]["codigo_producto"].'",
                    "'.$productos[$i]["nombre_producto"].'",
                    "'.$bodega["nombre"].'",
                    "'.$stock.'",
                    "'.$botones.'"
                ],';
            }
            $datosJson = substr($datosJson, 0,-1);

        $datosJson .= ']}';

        echo $datosJson;

        return;
    }
}

//Activar Tabla Productos
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();