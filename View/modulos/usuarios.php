<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddUsuario">
                                Agregar Usuario
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped tabla">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nombre</th>
                                    <th>Run</th>
                                    <th>Foto</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Último Login</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $item = null;
                                $valor = null;

                                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                                foreach ($usuarios as $key => $value) {
                                    echo '<tr>
                                <td>'.$value["id"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["run"].'</td>';

                                    if($value["foto"] != ""){
                                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="50px"></td>';
                                    }else{
                                        echo '<td><img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail" width="50px"></td>';
                                    }

                                    echo '<td>'.$value["rol"].'</td>';

                                    if($value["estado"] != 0){
                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                                    }else{
                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                                    }
                                    echo '<td>'.$value["ultimo_login"].'</td>
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
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalAddUsuario" class="modal fade" data-backdrop="static" tabindex="-1" role="form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #17a2b8; color:white;">
                <h4 class="modal-title">Agregar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nuevoNombre" placeholder="Ingresar Nombre" class="form-control input-lg" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="nuevoRun" placeholder="Ingresar Rut" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="nuevoPassword" placeholder="Ingresar Contraseña" required class="form-control input-lg">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                            <select class="form-control" name="nuevoRol">
                                <option hidden selected>Seleccionar perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Operario">Operario</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input class="nuevaFoto swalDeafaultError" type="file" id="nuevaFoto" name="nuevaFoto">
                        <p class="help-block">Peso Máximo de la foto 2MB</p>
                        <img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                    </div>
                </form>
            </div>
                <div class="modal-footer justify-content-between" style="background: #17a2b8; color:white;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();

                ?>
        </div>

    </div>
</div>

<div id="modalEditarUsuario" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" id="editarNombre" name="editarNombre" value="" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" id="editarRun" name="editarRun" value="" readonly class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="editarPassword" placeholder="Escriba la nueva Contraseña" class="form-control input-lg">
                                <input type="hidden" id="passwordActual" name="passwordActual">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarRol">
                                    <option value="" id="editarRol"></option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Operario">Operario</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Peso Máximo de la foto 2MB</p>
                            <img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                </div>

                <?php

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();

                ?>

            </form>
        </div>

    </div>
</div>
