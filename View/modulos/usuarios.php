<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Usuarios</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Administrar Usuarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUsuario">
                    Agregar Usuario
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tabla">
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
    </section>
</div>

<div id="modalAddUsuario" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="nuevoNombre" placeholder="Ingresar Nombre" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="text" id="nuevoRun" name="nuevoRun" placeholder="Ingresar Rut Usuario" required class="form-control input-lg">
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="nuevoPassword" placeholder="Ingresar Contraseña" required class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoRol">
                                    <option value="">Seleccionar perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Operario">Operario</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso Máximo de la foto 2MB</p>
                            <img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>

                <?php

                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();

                ?>

            </form>
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
