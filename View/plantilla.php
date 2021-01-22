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
        echo '<link rel="stylesheet" href="View/bower_components/bootstrap/dist/css/bootstrap.min.css">';
        /* Font Awesome */
        echo '<link rel="stylesheet" href="View/bower_components/font-awesome/css/font-awesome.min.css">';
        /* Ionicons */
        echo '<link rel="stylesheet" href="View/bower_components/Ionicons/css/ionicons.min.css">';
        /* Theme style */
        echo '<link rel="stylesheet" href="View/dist/css/AdminLTE.css">';
        /* AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. */
        echo '<link rel="stylesheet" href="View/dist/css/skins/_all-skins.min.css">';
        /* Google Font */
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">';
        /* DataTables */
        echo '<link rel="stylesheet" href="View/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">';
        echo '<link rel="stylesheet" href="View/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">';

        /* jQuery 3 */
        echo '<script src="View/bower_components/jquery/dist/jquery.min.js"></script>';
        /* Bootstrap 3.3.7 */
        echo '<script src="View/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>';
        /* SlimScroll */
        echo '<script src="View/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>';
        /* FastClick */
        echo '<script src="View/bower_components/fastclick/lib/fastclick.js"></script>';
        /* AdminLTE App */
        echo '<script src="View/dist/js/adminlte.min.js"></script>';
        /* DataTables */
        echo '<script src="View/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>';
        echo '<script src="View/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>';
        echo '<script src="View/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>';
        echo '<script src="View/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>';
        /* SweetAlert2 */
        echo '<script src="View/plugins/sweetalert2/sweetalert2.all.js"></script>';

    } else {

        echo '<link rel="stylesheet" href="View/bower_components/bootstrap/dist/css/bootstrap.min.css">';
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
        echo '<script src="View/dist/js/adminlte.min.js"></script>';
    }
    ?>



</head>
<body <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
            echo 'class="hold-transition skin-blue sidebar-collapse sidebar-mini"';
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
                $_GET["ruta"] == "categorias" ||
                $_GET["ruta"] == "productos" ||
                $_GET["ruta"] == "clientes" ||
                $_GET["ruta"] == "ventas" ||
                $_GET["ruta"] == "crear-venta" ||
                $_GET["ruta"] == "reportes" ||
                $_GET["ruta"] == "salir"){
                include "modulos/".$_GET["ruta"].".php";
            } else {
                include "modulos/404.php";
            }
        } else {
            include "modulos/inicio.php";
        }

        include  "modulos/footer.php";

        echo '<div class="control-sidebar-bg"></div>';

        echo '</div>';
    } else {
        include "modulos/login.php";
    }

    ?>

<script src="View/js/platilla.js"></script>

</body>
</html>
