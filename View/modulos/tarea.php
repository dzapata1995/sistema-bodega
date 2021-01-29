<div class="content-wrapper">
    <section class="content-header">
        <h1>Listado de Tareas</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Tareas</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddTarea">
                    Agregar Tarea
                </button>
            </div>
            <div class="box-body">
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

                    $tareas = ControladorTareas::ctrMostrarUsuarios($item, $valor);

                    foreach ($tareas as $key => $value) {
                        echo '<tr>
                                <td>'.$value["id"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["descripcion"].'</td>
                                <td>'.$value["ano"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
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
    </section>
</div>


<div id="modalAddTarea" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Tarea</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre de la Tarea" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <?php
                                $cont = date('Y');
                                ?>
                                <select class="form-control input-lg" name="nuevoAno">
                                    <option hidden selected>Seleccione un Año</option>
                                    <?php while ($cont >= 2020) {?>
                                        <option value="<?php echo($cont); ?>"><?php echo($cont);?></option>
                                        <?php $cont = ($cont-1);} ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control input-lg" rows="5" placeholder="Ingrese Descripción" name="nuevoDescripcion"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>

                <?php

                $crearTarea = new ControladorTareas();
                $crearTarea->ctrCrearTarea();

                ?>

            </form>
        </div>
    </div>
</div>
