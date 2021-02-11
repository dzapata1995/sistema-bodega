<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Otros Registros</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item active">Otros</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-content-between">
                                <div class="col-md-10 pt-2">
                                    <h3 class="card-title">Listado de Bodegas</h3>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddBodega">
                                        Nueva Bodega
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tabla">
                                <thead>
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th style="width: 40px">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $item = null;
                                $valor = null;

                                $tareas = ControladorVarios::ctrMostrarBodega($item, $valor);

                                foreach ($tareas as $key => $value) {
                                    echo '<tr>
                                            <td>'.$value["id"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["descripcion"].'</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btnEditarBodega" idBodega="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarBodega"><i class="fas fa-edit"></i></button>
                                                    <button></button>
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

<div id="modalAddBodega" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4 class="modal-header">Agregar Bodega</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                            <input type="text" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar nombre de la bodega" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <textarea style="overflow: auto; resize: none;" class="form-control" rows="6" placeholder="Ingrese una descripcion" name="nuevoDescripcion"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45;">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                </div>
                <?php
                $crearBodega = new ControladorVarios();
                $crearBodega->ctrCrearBodega();
                ?>
            </form>
        </div>
    </div>
</div>
