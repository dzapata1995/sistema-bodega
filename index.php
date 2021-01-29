<?php

require_once "Controllers/plantilla.controlador.php";
require_once "Controllers/centrocosto.controlador.php";
require_once "Controllers/proveedores.controlador.php";
require_once "Controllers/productos.controlador.php";
require_once "Controllers/usuarios.controlador.php";
require_once "Controllers/orden.controlador.php";
require_once "Controllers/tarea.controlador.php";

require_once "Model/centrocosto.modelo.php";
require_once "Model/proveedores.modelo.php";
require_once "Model/productos.modelo.php";
require_once "Model/usuarios.modelo.php";
require_once "Model/ventas.modelo.php";
require_once "Model/tarea.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();