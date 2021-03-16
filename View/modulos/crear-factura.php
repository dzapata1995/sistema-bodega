<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro de Facturas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="facturas" class="text-success">Facturas</a></li>
                        <li class="breadcrumb-item active">Creación</li>
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
                        <div class="card-header with-border"></div>
                        <form role="form" method="post" class="formularioFactura">
                            <div class="card-body">
                                <div class="form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-code"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nuevaFactura" name="nuevaFactura" placeholder="Ingrese Número de la Factura">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-users"></i>
                                            </span>
                                            <select class="form-control" name="agregarProveedor">
                                                <option hidden selected>Seleccionar al Proveedor</option>
                                                <?php
                                                $item = null;
                                                $valor = null;

                                                $proveedor = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                                                foreach ($proveedor as $key => $value) {
                                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <span class="input-group-append">
                                                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalAddProveedor" data-dismiss="modal">Agregar</button>
                                            </span>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control datetimepicker-input" id="fechaElaboracion" name="fechaElaboracion" data-toggle="datetimepicker" data-target="#fechaElaboracion">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group row nuevoProducto">
                                </div>
                                <button type="button" class="btn btn-default d-lg-none btnAgregarProducto">Agregar Producto</button>
                                <hr>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-primary float-right" type="submit">Guardar</button>
                            </div>
                        </form>
                        <?php

                        ?>
                    </div>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <div class="card card-warning">
                        <div class="card-header with-border"></div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tablaFacturas" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Stock</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<div id="modalAddProveedor" class="modal fade" data-backdrop="static" tabindex="-1" role="form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4 class="modal-title">Ingresar Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                            <input type="text" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre del Proveedor" required class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" id="nuevoRut" name="nuevoRut" class="form-control" placeholder="Ingresar Rut del Proveedor" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                            <input type="text" id="nuevoRubro" name="nuevoRubro" class="form-control" placeholder="Ingresar Rubro del Proveedor" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                            <input type="text" name="nuevoContacto" class="form-control input-lg" placeholder="Ingrese Numero de Telefono" value="" size="25">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" id="nuevoEmail" name="nuevoEmail" class="form-control input-lg" placeholder="Ingresar Email del Proveedor" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45;">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>

                <?php

                $crearProveedor = new ControladorProveedores();
                $crearProveedor->ctrCrearProveedor();

                ?>

            </form>
        </div>
    </div>
</div>

<script>
    $(function (){
        $('#fechaElaboracion').datetimepicker({
            locale: 'es-mx',
            format: 'L',
            timezone: 'America/Santiago'
        });
    });
</script>