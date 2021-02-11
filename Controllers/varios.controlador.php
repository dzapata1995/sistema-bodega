<?php

class ControladorVarios {

    public static function ctrCrearBodega(){
        if(isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoDescripcion"])) {

                $tabla = "bodega";
                $datos = array("nombre" => $_POST["nuevoNombre"],
                                "descripcion" => $_POST["nuevoDescripcion"]);

                $respuesta = ModeloVarios::mdlIngresarBodega($tabla, $datos);

                if($respuesta == 'ok') {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "!La bodega ha sido guardado correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result){
                           if (result.value) {
                               window.location = "varios";
                           } 
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "!La bodega no puede ir vacío o llevar caracteres especiales y numeros¡",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                       if (result.value) {
                           window.location = "varios";
                       } 
                    });
                </script>';
            }
        }
    }

    public static function ctrMostrarBodega($item, $valor) {
        $tabla = "bodega";
        $repuesta = ModeloVarios::mdlMostrarBodega($tabla, $item, $valor);

        return $repuesta;
    }
}