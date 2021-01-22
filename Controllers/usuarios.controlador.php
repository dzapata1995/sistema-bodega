<?php

class ControladorUsuarios {

    public static function ctrIngresoUsuario(){

        if (isset($_POST["ingUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                $tabla = "usuarios";

                $item = "run";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["run"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

                    $_SESSION["iniciarSesion"] = "ok";

                    echo '<script>
                            window.location = "inicio";
                        </script>';

                } else {

                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

                }

            }
        }

    }

    public static function ctrCrearUsuario() {

        if (isset($_POST["nuevoRun"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoRun"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                $tabla = "usuarios";
                $datos = array("nombre" => $_POST["nuevoNombre"],
                                "run" => $_POST["nuevoRun"],
                                "password" => $_POST["nuevoPassword"],
                                "rol" => $_POST["nuevoRol"]);
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == 'ok') {

                    echo '<script>
                        swal({
                            type: "success",
                            title: "!El usuario ha sido guardado correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result){
                           if (result.value) {
                               window.location = "usuarios";
                           } 
                        });
                    </script>';

                }

            } else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "!El usuario no puede ir vacío o llevar caracteres especiales¡",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                       if (result.value) {
                           window.location = "usuarios";
                       } 
                    });
                </script>';

            }
        }

    }

}