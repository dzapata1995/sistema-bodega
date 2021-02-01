<?php

class ControladorCentroCosto {

    public static function ctrCrearCentroCosto(){
        if (isset($_POST["nuevoCodigo"])) {
            if(preg_match('/^[a-zA-Z0-9_]+$/', $_POST["nuevoCodigo"])) {
                $tabla = "centrocosto";

                $datos = array("codigo" => $_POST["nuevoCodigo"],
                                "estacion" => $_POST["nuevoEstacion"],
                                "fruta" => $_POST["nuevoFruta"]);

                $respuesta = ModeloCentroCosto::mdlIngresarCentroCostos($tabla, $datos);

                if($respuesta == 'ok') {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "!La tarea ha sido guardado Correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result){
                           if (result.value) {
                               window.location = "centrocosto";
                           } 
                        });
                        </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "!El nombre de la Tarea no puede ir vacío o llevar caracteres especiales¡",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                       if (result.value) {
                           window.location = "centrocosto";
                       } 
                    });
                </script>';
            }
        }
    }

    public static function ctrMostrarCentroCosto($item, $valor) {
        $tabla = "centrocosto";
        $respuesta = ModeloCentroCosto::mldMostrarCentroCostos($tabla, $item, $valor);

        return $respuesta;

    }

}