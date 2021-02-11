<?php

class ControladorUsuarios {

    public static function ctrIngresoUsuario(){

        if (isset($_POST["ingUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $item = "run";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["run"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["run"] = $respuesta["run"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["rol"] = $respuesta["rol"];

                        /* Registro de Fecha de Ultimo Login */

                        date_default_timezone_set('America/Santiago');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha.' '.$hora;

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;

                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if ($ultimoLogin == "ok") {

                            echo '<script>
                                    window.location = "inicio";
                                 </script>';

                        }

                    } else {

                        echo '<br>
                             <div class="alert alert-danger">El usuario aún no esta activado</div>';

                    }

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


                /* Validar Imagen */

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "View/img/usuarios/".$_POST["nuevoRun"];

                    mkdir($directorio, 0755);

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100,999);
                        $ruta = "View/img/usuarios/".$_POST["nuevoRun"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);

                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100,999);
                        $ruta = "View/img/usuarios/".$_POST["nuevoRun"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                                "run" => $_POST["nuevoRun"],
                                "password" => $encriptar,
                                "rol" => $_POST["nuevoRol"],
                                "foto" => $ruta,
                                "estado" => 0);
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == 'ok') {

                    echo '<script>
                        Swal.fire({
                            icon: "success",
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
                    Swal.fire({
                        icon: "error",
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

    public static function ctrMostrarUsuarios($item, $valor) {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrEditarUsuario(){

        if (isset($_POST["editarRun"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    $directorio = "View/img/usuarios/".$_POST["editarRun"];

                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        mkdir($directorio, 0755);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100,999);
                        $ruta = "View/img/usuarios/".$_POST["editarRun"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);

                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100,999);
                        $ruta = "View/img/usuarios/".$_POST["editarRun"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "usuarios";

                if ($_POST["editarPassword"] != "") {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){
                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {
                        echo '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "!La contraseña no puede ir vacía o llevar caracteres especiales¡",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = "usuarios";
                                    } 
                                });
                            </script>';
                    }

                } else {
                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array("nombre" => $_POST["editarNombre"],
                               "run" => $_POST["editarRun"],
                               "password" => $encriptar,
                               "rol" => $_POST["editarRol"],
                               "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "!El usuario ha sido editado correctamente¡",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result){
                           if (result.value) {
                               window.location = "usuarios";
                           } 
                        });
                    </script>';

                } else {
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "!El usuario no ha sido editado correctamente¡",
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
                    Swal.fire({
                        title: "!El nombre no puede ir vacío o llevar caracteres especiales¡",
                        icon: "error",
                        focusConfirm: false,
                        confirmButtonText: "Cerrar"
                    });
                </script>';

            }
        }

    }

}