<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Barra de Navegación -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <?php
                if ($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2">';
                } else {
                    echo '<img src="View/img/usuarios/default/anonymous.png" class="user-image img-circle elevation-2">';
                }
                ?>
                <span class="d-none d-md-inline"><?= $_SESSION["nombre"] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-primary">
                    <?php
                    if ($_SESSION["foto"] != ""){
                        echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2">';
                    } else {
                        echo '<img src="View/img/usuarios/default/anonymous.png" class="img-circle elevation-2">';
                    }
                    ?>
                    <p>
                        <?= $_SESSION["nombre"] ?>
                        <small> <?= $_SESSION["rol"] ?></small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="salir" class="btn btn-default btn-flat float-right">Salir</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>