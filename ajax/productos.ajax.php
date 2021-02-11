<?php

require_once "../Controllers/productos.controlador.php";
require_once "../Model/productos.modelo.php";

class AjaxProductos {

    public $idProducto;

    public function ajaxEditarProducto(){
        $item = "id";
        $valor = $this->idProducto;
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
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