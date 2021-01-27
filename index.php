<?php

require_once "Controllers/plantilla.controlador.php";
require_once "Controllers/centrocosto.controlador.php";
require_once "Controllers/clientes.controlador.php";
require_once "Controllers/productos.controlador.php";
require_once "Controllers/usuarios.controlador.php";
require_once "Controllers/ventas.controlador.php";

require_once "Model/centrocosto.modelo.php";
require_once "Model/clientes.modelo.php";
require_once "Model/productos.modelo.php";
require_once "Model/usuarios.modelo.php";
require_once "Model/ventas.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();