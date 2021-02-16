<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro de Factura</h1>
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
                <div class="col-lg-5 col-xs-12">
                    <div class="card card-success">
                        <div class="card-header with-border"></div>
                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="card">
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            <input type="text" class="form-control" id="nuevaFactura" name="nuevaFactura" placeholder="Ingrese Número de la Factura">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            <select class="form-control" name="nuevoProveedor">
                                                <option hidden selected>Seleccionar Proveedor</option>
                                                <?php
                                                $item = null;
                                                $valor = null;

                                                $proveedor = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                                                foreach ($proveedor as $key => $value) {
                                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row nuevoProducto">

                                    </div>
                                    <input type="hidden" id="listaProductos" name="listaProductos">
                                    <button class="btn btn-default hidden-lg btnAgregarProducto" type="button">Agregar Producto</button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary float-right">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                    <div class="card card-warning">
                        <div class="card-header with-border"></div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tablaVentas">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
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
