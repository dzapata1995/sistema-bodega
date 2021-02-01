<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Centro de Costos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Administrar Centro Costos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddCC">
                    Agregar Centro Costo
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tabla">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Código</th>
                            <th>N° Estaciones</th>
                            <th>Fruta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $centrocosto = ControladorCentroCosto::ctrMostrarCentroCosto($item, $valor);

                        foreach ($centrocosto as $key => $value) {
                            echo '<tr>
                                    <td>'.$value["id"].'</td>
                                    <td>'.$value["codigo"].'</td>
                                    <td>'.$value["estacion"].'</td>
                                    <td>'.$value["fruta"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>  
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

<div id="modalAddCC" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Centro de Costo</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="number" name="nuevoEstacion" placeholder="Ingresar Cant. Estaciones" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" name="nuevoFruta" placeholder="Ingresar Fruta" required class="form-control input-lg">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>

                <?php

                $crearCC = new ControladorCentroCosto();
                $crearCC->ctrCrearCentroCosto();

                ?>

            </form>
        </div>

    </div>
</div>

