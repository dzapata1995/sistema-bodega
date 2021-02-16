<?php

require_once "../Controllers/varios.controlador.php";
require_once "../Model/varios.modelo.php";

class AjaxVarios {

    public $idBodega;

    public function ajaxEditarBodega() {
        $item = "id";
        $valor = $this->idBodega;

        $respuesta = ControladorVarios::ctrMostrarBodega($item, $valor);

        echo json_encode($respuesta);
    }

}

if (isset($_POST["idBodega"])) {
    $bodega = new AjaxVarios();
    $bodega -> idBodega = $_POST["idBodega"];
    $bodega -> ajaxEditarBodega();
}