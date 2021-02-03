<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
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
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddProveedor">
                                Ingresar Proveedor
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tabla">
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
                                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>
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

