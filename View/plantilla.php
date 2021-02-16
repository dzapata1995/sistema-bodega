<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Bodega - San Isidro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <link rel="icon" href="View/img/plantilla/logo.png">

    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

        /* Bootstrap 3.3.7 */
        echo '<link rel="stylesheet" href="View/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css">';
        /*Estilos Propios*/
        echo '<link rel="stylesheet" href="View/css/style.css">';
        /* Font Awesome */
        echo '<link rel="stylesheet" href="View/plugins/fontawesome-free/css/all.css">';
        /* Ionicons */
        echo '<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">';
        /* Theme style */
        echo '<link rel="stylesheet" href="View/dist/css/adminlte.css">';
        /* AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. */
        echo '<link rel="stylesheet" href="View/dist/css/adminlte.css">';
        /* Google Font */
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">';
        /* DataTables */
        echo '<link rel="stylesheet" href="View/plugins/datatables-bs4/css/dataTables.bootstrap4.css">';
        echo '<link rel="stylesheet" href="View/plugins/datatables-buttons/css/buttons.bootstrap4.css">';
        echo '<link rel="stylesheet" href="View/plugins/datatables-responsive/css/responsive.bootstrap4.css">';
        /* SweetAlert2 */
        echo '<link rel="stylesheet" href="View/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">';
        /* Toastr */
        echo '<link rel="stylesheet" href="View/plugins/toastr/toastr.css">';
        /* FullCalendar */
        echo '<link rel="stylesheet" href="View/plugins/fullcalendar/main.css">';

        /* jQuery 3 */
        echo '<script src="View/plugins/jquery/jquery.js"></script>';
        /* Bootstrap 4 */
        echo '<script src="View/plugins/bootstrap/js/bootstrap.bundle.js"></script>';
        /* FastClick */
        echo '<script src="View/plugins/fastclick/fastclick.js"></script>';
        /* AdminLTE App */
        echo '<script src="View/dist/js/adminlte.js"></script>';
        echo '<script src="View/dist/js/demo.js"></script>';
        /* DataTables */
        echo '<script src="View/plugins/datatables/jquery.dataTables.js"></script>';
        echo '<script src="View/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>';
        echo '<script src="View/plugins/datatables-responsive/js/dataTables.responsive.js"></script>';
        echo '<script src="View/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>';
        echo '<script src="View/plugins/datatables-buttons/js/dataTables.buttons.js"></script>';
        echo '<script src="View/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>';
        echo '<script src="View/plugins/datatables-buttons/js/buttons.html5.js"></script>';
        echo '<script src="View/plugins/datatables-buttons/js/buttons.colVis.js"></script>';
        echo '<script src="View/plugins/datatables-buttons/js/buttons.print.js"></script>';
        /* SweetAlert2 */
        echo '<script src="View/plugins/sweetalert2/sweetalert2.all.js"></script>';
        /* Toastr */
        echo '<script src="View/plugins/toastr/toastr.min.js"></script>';
        /* Custom File Input */
        echo '<script src="View/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>';
        /* fullCalendar */
        echo '<script src="View/plugins/moment/moment.min.js"></script>';
        echo '<script src="View/plugins/fullcalendar/main.js"></script>';


    } else {

        echo '<link rel="stylesheet" href="View/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css">';
        echo '<link rel="stylesheet" href="View/components/fonts/font-awesome-4.7.0/css/font-awesome.min.css">';
        echo '<link rel="stylesheet" href="View/components/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">';
        echo '<link rel="stylesheet" href="View/components/vendor/animate/animate.css">';
        echo '<link rel="stylesheet" href="View/components/vendor/css-hamburgers/hamburgers.min.css">';
        echo '<link rel="stylesheet" href="View/components/vendor/animsition/css/animsition.min.css">';
        echo '<link rel="stylesheet" href="View/components/vendor/select2/select2.min.css">';
        echo '<link rel="stylesheet" href="View/components/vendor/daterangepicker/daterangepicker.css">';
        echo '<link rel="stylesheet" href="View/components/css/util.css">';
        echo '<link rel="stylesheet" href="View/components/css/main.css">';
        echo '<link rel="stylesheet" href="View/dist/css/AdminLTE.css">';

        echo '<script src="View/components/vendor/jquery/jquery-3.2.1.min.js"></script>';
        echo '<script src="View/components/vendor/animsition/js/animsition.min.js"></script>';

        echo '<script src="View/components/vendor/bootstrap/js/popper.js"></script>';
        echo '<script src="View/components/vendor/bootstrap/js/bootstrap.min.js"></script>';
        echo '<script src="View/components/vendor/select2/select2.min.css"></script>';
        echo '<script src="View/components/vendor/daterangepicker/moment.min.js"></script>';
        echo '<script src="View/components/vendor/daterangepicker/daterangepicker.js"></script>';
        echo '<script src="View/components/vendor/countdowntime/countdowntime.js"></script>';
        echo '<script src="View/components/js/main.js"></script>';
        echo '<script src="View/dist/js/adminlte.js"></script>';
    }
    ?>



</head>
<body <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
            echo 'class="sidebar-mini sidebar-collapse"';
        }else{
            echo 'class="hold-transition login-page"';
        }?>>

    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

        echo '<div class="wrapper">';

        include "modulos/cabezote.php";
        include "modulos/menu.php";

        if (isset($_GET["ruta"])) {
            if($_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "centrocosto" ||
                $_GET["ruta"] == "tarea" ||
                $_GET["ruta"] == "proveedores" ||
                $_GET["ruta"] == "varios" ||
                $_GET["ruta"] == "facturas" ||
                $_GET["ruta"] == "crear-factura" ||
                $_GET["ruta"] == "productos" ||
                $_GET["ruta"] == "detalle-producto" ||
                $_GET["ruta"] == "orden" ||
                $_GET["ruta"] == "progreso" ||
                $_GET["ruta"] == "calendario" ||
                $_GET["ruta"] == "reporte-sr" ||
                $_GET["ruta"] == "reporte-st" ||
                $_GET["ruta"] == "reporte-p" ||
                $_GET["ruta"] == "reporte-s" ||
                $_GET["ruta"] == "salir"){
                include "modulos/".$_GET["ruta"].".php";
            } else {
                include "modulos/404.php";
            }
        } else {
            include "modulos/inicio.php";
        }

        include  "modulos/footer.php";

        echo '</div>';
    } else {
        include "modulos/login.php";
    }

    ?>

    <script src="View/js/platilla.js"></script>
    <script src="View/js/usuarios.js"></script>
    <script src="View/js/producto.js"></script>

    <aside class="control-sidebar control"></aside>

    <script>
        $(function() {
            bsCustomFileInput.init();
        })
    </script>

</body>
</html>
