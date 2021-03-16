 <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Página Principal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php

                            $item = null;
                            $valor = null;
                            $count = null;

                            $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

                            foreach ($productos as $key => $value) {
                                $count++;
                            }

                            ?>
                            <h3><?= $count ?></h3>
                            <p>Productos Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="productos" class="small-box-footer">
                            Más Información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $item = null;
                            $valor = null;
                            $acum = null;
                            $div = null;

                            $ordenes = ControladorOrden::ctrDetalleOrden($item, $valor);

                            foreach ($ordenes as $key => $value) {
                                $div++;
                                $porcentaje = (($value["utilizado"]/$value["reservado"])*100);
                                $acum = $acum + $porcentaje;

                            }

                            $fin = $acum / $div;

                            ?>
                            <h3>
                                <?= round($fin, 2) ?> <sup style="font-size: 20px;">%</sup>
                            </h3>
                            <p>Progreso Total de Ordenes de Aplicación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="list-orden" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">

                            <?php
                            $item = null;
                            $valor = null;
                            $count = null;

                            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                            foreach ($usuarios as $key => $value) {
                                $count++;
                            }
                            ?>
                            <h3><?= $count ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="usuarios" class="small-box-footer">
                            Más Información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php

                            $item = null;
                            $valor = null;
                            $count = null;

                            $orden = ControladorOrden::ctrMostrarOrden($item, $valor);

                            foreach ($orden as $key => $value) {
                                $count++;
                            }
                            ?>
                            <h3><?= $count ?></h3>
                            <p>Ordenes de Aplicación Registradas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="orden" class="small-box-footer">
                            Más Información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr style="border: 2px dotted #28a745;">
        </div>
    </section>
</div>
