<?php

class ControladorProductos {

    public static function ctrMostrarProductos($item, $valor) {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrCrearProductos() {
        if (isset($_POST["nuevoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProducto"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoCodigo"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMedida"])){

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "View/img/productos/".$_POST["nuevoCodigo"];

                    mkdir($directorio, 0755);

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                        $aletorio = mt_rand(100,999);
                        $ruta = "View/img/productos/".$_POST["nuevoCodigo"]."/".$aletorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen,0, 0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                        $aletorio = mt_rand(100,999);
                        $ruta = "View/img/productos".$_POST["nuevoCodigo"]."/".$aletorio."png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    }
                }

                $tabla = "productos";

                $datos = array("codigo" => $_POST["nuevoCodigo"],
                                "nombre" => $_POST["nuevoProducto"],
                                "descripcion" => $_POST["nuevaDescripcion"],
                                "imagen" => $ruta,
                                "unidad_medida" => $_POST["nuevaMedida"],
                                "fk_bodega" => $_POST["nuevaUbicacion"]);

                $respuesta = ModeloProductos::mdlIngresarProductos($tabla, $datos);

                if ($respuesta == 'ok') {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡El producto ha sido registrado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"    
                        }).then(function(result) {
                            if (result.value){
                                window.location = "productos";
                            }
                        });
                    </script>';
                }
            } else {

                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "¡El producto no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"    
                        }).then(function (result) {
                            if (result.value) {
                                window.location = "productos";
                            }
                        });
                    </script>';

            }
        }
    }

    public static function ctrEditarProducto() {
        if (isset($_POST["editarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProducto"])) {

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "View/img/productos/".$_POST["editarCodigo"];

                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($directorio, 0755);
                    }
                    if ($_FILES["editarFoto"]["type"] == "imagen/jpeg") {

                        $aletorio = mt_rand(100, 999);
                        $ruta = "View/img/productos/".$_POST["editarCodigo"]."/".$aletorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        $aletorio = mt_rand(100, 999);
                        $ruta = "View/img/productos/".$_POST["editarCodigo"]."/".$aletorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                }

            }
        }
    }
}