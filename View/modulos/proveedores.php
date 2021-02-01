<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Proveedores</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Administrar Proveedores</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProveedor">
                    Ingresar Proveedor
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tabla">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Rubro</th>
                        <th>N° Contacto</th>
                        <th>E-Mail Contacto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                    foreach ($proveedores as $key => $value) {
                        echo '<tr>
                                <td>'.$value["id"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["rut"].'</td>
                                <td>'.$value["rubro"].'</td>
                                <td>'.$value["n_contacto"].'</td>
                                <td>'.$value["email"].'</td>
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

<div id="modalAddProveedor" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ingresar Proveedor</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar Nombre del Proveedor" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" id="nuevoRut" name="nuevoRut" class="form-control input-lg" placeholder="Ingresar Rut del Proveedor" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" id="nuevoRubro" name="nuevoRubro" class="form-control input-lg" placeholder="Ingresar Rubro del Proveedor" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" name="nuevoContacto" class="form-control input-lg" placeholder="Ingrese Numero de Telefono" value="" size="25">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="email" id="nuevoEmail" name="nuevoEmail" class="form-control input-lg" placeholder="Ingresar Email del Proveedor" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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

