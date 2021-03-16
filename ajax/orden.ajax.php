<?php

require_once "../Controllers/orden.controlador.php";
require_once "../Model/orden.modelo.php";

class AjaxOrden {

    public $idOrden;

    public function ajaxVerOrden() {
        $item = 'id';
        $valor = $this->idOrden;
        $respuesta = ControladorOrden::ctrDetalleOrden($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["idOrden"])) {
    $ver = new AjaxOrden();
    $ver->idOrden = $_POST["idOrden"];
    $ver->ajaxVerOrden();
}