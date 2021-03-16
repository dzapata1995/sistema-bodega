<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Control de Ordenes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item active">Orden de Aplicación</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered tablaListadoOrden projects">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Orden de Aplicación</th>
                        <th>Código Orden Producto</th>
                        <th>Nombre Producto</th>
                        <th>Porcentaje</th>
                        <th>Reservado</th>
                        <th>Utilizado</th>
                        <th style="width: 60px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $count = 0;
                        $ordenes = ControladorOrden::ctrDetalleOrden($item, $valor);

                        foreach ($ordenes as $key => $value) {
                            $count++;

                            echo '<tr>
                                    <td>'.$count.'</td>';

                            $item = "id";
                            $valor = $value["fk_orden"];

                            $orden = ControladorOrden::ctrMostrarOrden($item, $valor);
                            echo    '<td>'.$orden["codigo_orden"].'</td>';

                            $item = "id";
                            $valor = $value["fk_producto"];

                            $producto = ControladorProductos::ctrMostrarProductos($item, $valor);

                            $porcentaje = ($value["utilizado"]/$value["reservado"])*100;

                            echo    '<td>'.$producto["codigo_producto"].'</td>
                                    <td>'.$producto["nombre_producto"].'</td>
                                    <td>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="'.$value["utilizado"].'" aria-valuemin="0" aria-valuemax="'.$value["reservado"].'" style="width: '.$porcentaje.'%;"></div>
                                        </div>
                                        <small>'.$porcentaje.'% Completado</small>
                                    </td>
                                    <td>'.$value["reservado"].'</td>
                                    <td>'.$value["utilizado"].'</td>';

                            echo '<td class="project-actions text-right">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>