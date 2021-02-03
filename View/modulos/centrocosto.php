<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrar Centro de Costos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Centro Costos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddCC">
                                Agregar Centro Costos
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tabla">
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
                                    <td style="width: 20px">
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </div>  
                                    </td>
                            </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalAddCC" class="modal fade" data-backdrop="static" tabindex="-1" role="form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4 class="modal-title">Agregar Centro de Costo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="text" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" required class="form-control input-lg">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-flag"></i></span>
                            <input type="number" name="nuevoEstacion" placeholder="Ingresar Cant. Estaciones" required class="form-control input-lg">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-leaf"></i></span>
                            <input type="text" name="nuevoFruta" placeholder="Ingresar Fruta" required class="form-control input-lg">
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                </div>

                <?php

                $crearCC = new ControladorCentroCosto();
                $crearCC->ctrCrearCentroCosto();

                ?>

            </form>
        </div>

    </div>
</div>

