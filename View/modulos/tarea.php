<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Tareas</h1>
                </div>
                <div class="col-sm">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item active">Tareas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="content-header">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddTarea">
                                Agregar Tarea
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tabla">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $item = null;
                                $valor = null;

                                $tareas = ControladorTareas::ctrMostrarTareas($item, $valor);

                                foreach ($tareas as $key => $value) {
                                    echo '<tr>
                                <td>'.$value["id"].'</td>
                                <td>'.$value["nombre_tarea"].'</td>
                                <td>'.$value["descripcion"].'</td>
                                <td>'.$value["ano"].'</td>
                                <td style="width: 20px;">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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


<div id="modalAddTarea" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4 class="modal-title">Agregar Tarea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                            <input type="text" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre de la Tarea" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar"></i></span>
                            <select class="form-control" name="nuevoAno">
                                <option hidden selected>Seleccione un Año</option>
                                <?php
                                $year = date('Y');
                                for ($i = 2020; $i<=$year+1; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <textarea style="overflow: auto; resize: none;" class="form-control" rows="6" placeholder="Ingrese Descripción" name="nuevoDescripcion"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45; color: white;">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                </div>

                <?php

                $crearTarea = new ControladorTareas();
                $crearTarea->ctrCrearTarea();

                ?>

            </form>
        </div>
    </div>
</div>
