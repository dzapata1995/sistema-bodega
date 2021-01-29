<?php

class ControladorProveedores {

    public static function ctrCrearProveedor() {
        if (isset($_POST["nuevoRut"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
                $tabla = "proveedores";

                $datos = array("nombre",
                                "rut",
                                "rubro",
                                "n_contacto",
                                "email"
                );

                $respuesta = ModeloProveedores::mdlIngresarProveedores($tabla, $datos);

                if ($respuesta == ' ok') {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "!La tarea ha sido guardado Correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result){
                           if (result.value) {
                               window.location = "tarea";
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
                           window.location = "tarea";
                       } 
                    });
                </script>';
            }
        }
    }

    public static function ctrMostrarProveedore($item, $valor) {
        $tabla = "proveedores";
        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

        return $respuesta;
    }
}