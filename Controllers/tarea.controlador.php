<?php

class ControladorTareas {

    public static function ctrCrearTarea() {
        if (isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "tareas";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                               "ano" => $_POST["nuevoAno"],
                               "descripcion" => $_POST["nuevoDescripcion"]
                    );

                $respuesta = ModeloTareas::mdlIngresarTarea($tabla, $datos);

                if ($respuesta == 'ok') {
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

    public static function ctrMostrarUsuarios($item, $valor) {
        $tabla = "tareas";
        $respuesta = ModeloTareas::mdlMostrarTareas($tabla, $item, $valor);

        return $respuesta;
    }

}