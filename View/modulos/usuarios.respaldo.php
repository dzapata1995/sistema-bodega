<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Usuarios</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Administrar usuarios</li>
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
                    <tr>
                        <td>1</td>
                        <td>Diego Zapata</td>
                        <td>Admin</td>
                        <td><img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs disabled">Activado</button></td>
                        <td>2021-01-22 12:01:32</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
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
                                <input type="text" name="nuevoUsuario" placeholder="Ingresar Usuario" required class="form-control input-lg">
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
                                <select class="form-control input-lg" name="nuevoPerfil">
                                    <option value="">Seleccionar perfil</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="operario">Operario</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" id="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso Máximo de la foto 200MB</p>
                            <img src="View/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
