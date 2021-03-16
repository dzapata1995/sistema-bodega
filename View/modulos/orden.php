<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de Ordenes</h1>
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
            <div class="card-header btn-group-sm" role="group">
                <div class="float-left">
                    <button data-toggle="modal" data-target="#modalAddOrden" class="btn btn-outline-success">Crear Orden</button>
                </div>
                <div class="float-right mr-2">
                    <a class="btn btn-outline-primary" href="calendario">Ver Calendario</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered tabla projects">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Tarea</th>
                        <th>Centro Costo</th>
                        <th class="text-center">Estado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Termino</th>
                        <th style="width: 250px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $count = 0;
                        $ordenes = ControladorOrden::ctrMostrarOrden($item, $valor);

                        foreach ($ordenes as $key => $value) {
                            $count++;

                            echo '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$value["codigo_orden"].'</td>
                                    <td>'.$value["descripcion_orden"].'</td>';

                            $item = "id";
                            $valor = $value["fk_tareas"];

                            $tarea = ControladorTareas::ctrMostrarTareas($item, $valor);

                            echo '<td>'.$tarea["nombre_tarea"].'</td>';

                            $valor = $value["fk_centrocosto"];

                            $centrocosto = ControladorCentroCosto::ctrMostrarCentroCosto($item, $valor);

                            echo '<td>'.$centrocosto["codigo_cc"].'</td>
                                    <td class="project-state">
                                        <span class="badge badge-dark">'.$value["estado"].'</span>
                                    </td>
                                    <td>'.$value["fecha_inicio"].'</td>';
                            if ($value["fecha_termino"] != "") {
                                echo '<td>'.$value["fecha_termino"].'</td>';
                            } else {
                                echo '<td>No registrada</td>';
                            }
                            echo '<td class="project-actions text-right">
                                    <button idOrden="'.$value["id"].'" class="btn btn-primary btn-sm btnDetalle" data-toggle="modal" data-target="#modalDetalle">
                                        <i class="fas fa-folder"></i>
                                        Detalles
                                    </button>
                                    <button class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Borrar
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

<div class="modal fade" role="form" id="modalAddOrden" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #28A745; color: white;">
                <h4 class="modal-title">Crear Orden</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" autocomplete="off">
                <div class="modal-body container">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ingCodigo">Código</label>
                                    <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-code"></i>
                                                </span>
                                        <input type="text" id="ingCodigo" name="ingCodigo" class="form-control form-control-border" placeholder="Ingresar Código">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="selectCentro">Centro de Costo</label>
                                    <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-contao"></i>
                                                </span>
                                        <select class="custom-select form-control-border" id="selectCentro" name="selectCentro">
                                            <option hidden>Seleccionar Centro de Costo</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $centrocosto = ControladorCentroCosto::ctrMostrarCentroCosto($item, $valor);

                                            foreach ($centrocosto as $key => $value){
                                                echo '<option value="'.$value["id"].'">'.$value["codigo_cc"].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fechaInicio">Fecha de Inicio</label>
                                    <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                        <input type="text" class="form-control form-control-border datetimepicker-input" data-toggle="datetimepicker" data-target="#fechaInicio" id="fechaInicio" name="fechaInicio" placeholder="DD/MM/YYYY" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Termino (Opcional)</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-border datetimepicker-input" data-toggle="datetimepicker" data-target="#fechaFin" id="fechaFin" name="fechaFin" placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="ingDescripcion">Descripción</label>
                                    <textarea rows="4" class="form-control" style="overflow: auto; resize: none;" id="ingDescripcion" name="ingDescripcion" placeholder="Ingrese una descripcion de la orden de aplicación..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="selectTarea">Tareas</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-tasks"></i>
                                        </span>
                                        <select class="custom-select form-control-border" name="selectTarea" style="width: 100%;">
                                            <option hidden selected>Seleccione una Tarea</option>
                                            <?php
                                            $item = null;
                                            $valor = null;

                                            $tareas = ControladorTareas::ctrMostrarTareas($item, $valor);

                                            foreach ($tareas as $key => $value) {
                                                echo '<option value="'.$value["id"].'">'.$value["nombre_tarea"].' '.$value["ano"].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45; color: white;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            <?php
                $guardarOrden = new ControladorOrden();
                $guardarOrden->ctrCrearOrden();
            ?>
        </div>
    </div>
</div>

<script>
    $(function (){
        $('#fechaInicio').datetimepicker({
            locale: 'es-mx',
            format: 'L',
            useCurrent: false,
            timezone: 'America/Santiago'
        });

        $('#fechaFin').datetimepicker({
            locale: 'es-mx',
            format: 'L',
            timezone: 'America/Santiago',
            useCurrent: false
        });

        $("#fechaInicio").on("change.datetimepicker", function (e) {
            $('#fechaFin').datetimepicker('minDate', e.date);
        });

        $("#fechaFin").on("change.datetimepicker", function (e) {
            $('#fechaInicio').datetimepicker('maxDate', e.date);
        });

    });
</script>