<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Model/productos.modelo.php";

class AjaxProductos {

    public $idProducto;
    public $traerProductos;

    public function ajaxEditarProducto(){

        if ($this->traerProductos == "ok") {
            $item = null;
            $valor = null;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);
        } else {
            $item = "id";
            $valor = $this->idProducto;
            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);
        }

    }

    public function ajaxVerProducto() {
        $item = 'id';
        $valor = $this->idProducto;
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }

}

if (isset($_POST["idProducto"])) {
    $editar = new AjaxProductos();
    $editar->idProducto = $_POST["idProducto"];
    $editar->ajaxEditarProducto();
}

if (isset($_POST["idProducto1"])) {
    $ver = new AjaxProductos();
    $ver->idProducto = $_POST["idProducto1"];
    $ver->ajaxVerProducto();
}

if (isset($_POST["traerProductos"])) {
    $traerProductos = new ajaxProductos();
    $traerProductos -> traerProductos = $_POST["traerProductos"];
    $traerProductos -> ajaxEditarProducto();
}