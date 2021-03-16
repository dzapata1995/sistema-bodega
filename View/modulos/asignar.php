<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="orden" class="text-success">Orden de Aplicación</a></li>
                        <li class="breadcrumb-item active">Asignación</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="card card-success">
                        <div class="card-header with-border">
                            <h3 class="card-title">Asignación de producto</h3>
                        </div>
                        <form class="formularioOrden" role="form" method="post" autocomplete="off">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="selectOrden">Orden de Aplicación</label>
                                            <div class="input-group-prepend select2-green">
                                                <span class="input-group-text">
                                                    <i class="fas fa-tasks"></i>
                                                </span>
                                                <select class="custom-select form-control-border disabled" name="selectOrden"style="width: 100%;" disabled>
                                                    <?php
                                                    $item = null;
                                                    $valor = null;

                                                    $tareas = ControladorOrden::ctrMostrarOrden($item, $valor);

                                                    foreach ($tareas as $key => $value) {
                                                        echo '<option value="'.$value["id"].'">'.$value["codigo_orden"].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row nuevoProductoOrden">
                                </div>

                                <input type="hidden" id="listaProductos" name="listaProductos" required>

                                <button type="button" class="btn btn-default d-lg-none btnAddProducto">Agregar Producto</button>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <button class="btn btn-outline-primary float-right" type="submit">Guardar</button>
                            </div>
                        </form>
                        <?php
                        $guardarOrden = new ControladorOrden();
                        $guardarOrden->ctrAddProduct();
                        ?>
                    </div>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <div class="card card-warning">
                        <div class="card-header with-border"></div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tablaAsignacion" width="100%">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Stock</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>