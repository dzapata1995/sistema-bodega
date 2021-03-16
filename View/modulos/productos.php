<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio" class="text-success">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card card-solid">
            <div class="card-header">
                <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalAddProducto">Ingresar Producto</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped tablaProductos" width="100%">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Ubicación</th>
                        <th style="width: 160px">Stock</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" role="form" id="modalAddProducto" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4>Registrar Producto</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-code-branch"></i></span>
                                    <input type="text" name="nuevoCodigo" placeholder="Ingrese código" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-truck-loading"></i></span>
                                    <input type="text" name="nuevoProducto" placeholder="Ingrese nombre del producto" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    <select class="form-control" name="nuevaUbicacion">
                                        <option hidden selected>Seleccionar Ubicación</option>
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $bodega = ControladorVarios::ctrMostrarBodega($item,$valor);

                                        foreach ($bodega as $key => $value) {
                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <textarea style="overflow: auto; resize: none;" class="form-control" rows="9" placeholder="Ingrese una descripción" name="nuevaDescripcion"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="vl"></div>

                        <div class="col">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                    <input type="text" name="nuevaMedida" placeholder="Ingrese unidad de medida" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="panel">
                                    <label for="nuevaFoto">Subir Imagen</label>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="custom-file">
                                        <input class="nuevaFoto custom-file-input" type="file" id="nuevaFoto" name="nuevaFoto">
                                        <lable for="nuevaFoto" class="custom-file-label">Peso Máximo de la imagen 2MB</lable>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group justify-content-center">
                                    <img src="View/img/productos/default/default.png" class="img-thumbnail previsualizar" width="200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45; color: white;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                $crearProducto = new ControladorProductos();
                $crearProducto->ctrCrearProductos();
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="form" id="modalEditarProducto" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4>Registrar Producto</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-code-branch"></i></span>
                                    <input type="text" id="editarCodigo" name="editarCodigo" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-truck-loading"></i></span>
                                    <input type="text" id="editarProducto" name="editarProducto" placeholder="Ingrese nombre del producto" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    <select class="form-control" name="editarUbicacion">
                                        <option value="" id="editarUbicacion" hidden selected></option>'
                                        <?php
                                        $item = null;
                                        $valor = null;

                                        $bodega = ControladorVarios::ctrMostrarBodega($item,$valor);

                                        foreach ($bodega as $key => $value) {
                                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <textarea style="overflow: auto; resize: none;" class="form-control" rows="8" placeholder="Ingrese una descripción" id="editarDescripcion" name="editarDescripcion"></textarea>
                                </div>
                            </div>
                        </div>

                        <style>
                            .vl {
                                border-left: 6px solid #1b5e45;
                                height: auto;
                            }
                        </style>
                        <div class="vl"></div>

                        <div class="col">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                    <input type="text" id="editarMedida" name="editarMedida" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="panel">
                                    <label for="editarFoto">Subir Imagen</label>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="custom-file">
                                        <input class="nuevaFoto custom-file-input" type="file" id="editarFoto" name="editarFoto">
                                        <label for="editarFoto" class="custom-file-label">Peso Máximo de la imagen 2MB</label>
                                        <input type="hidden" name="fotoActual" id="fotoActual">
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group justify-content-center">
                                    <img src="View/img/productos/default/default.png" class="img-thumbnail previsualizar" width="200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="background: #1b5e45; color: white;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                $editarProducto = new ControladorProductos();
                $editarProducto->ctrEditarProducto();
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modalVerProducto" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #1b5e45; color: white;">
                <h4 class="modal-title">Detalles</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">Hola Mundo</h3>
                        <div class="col-12">
                            <input type="hidden" name="fotoActual" id="fotoActual" class="nuevaFoto">
                            <img src="View/img/productos/default/default.png" class="img-thumbnail previsualizar">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">
                            <input type="text" id="verProducto" name="verProducto" class="form-control" disabled></h3>
                        <p>Codigo: <input class="form-control" type="text" id="verCodigo" disabled></p>
                        <hr>
                        <p><textarea class="form-control" rows="7" id="verDescripcion" disabled></textarea></p>
                        <h4 class="mt-3">
                            Ubicación: <small><select disabled class="form-control">
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $bodega = ControladorVarios::ctrMostrarBodega($item,$valor);

                                    foreach ($bodega as $key => $value) {
                                        echo '<option value="verUbicacion" id="verUbicacion" selected>'.$value["nombre"].'</option>';
                                    }
                                    ?>
                                </select></small>
                        </h4>
                        <hr>
                        <div class="bg-gradient-green py-2 px-3 mt-4 text-center">
                            <h2 class="mb-0">
                                Stock Total:
                                    <div class="row">
                                        <div class="input-group">
                                            <input id="verStock" disabled class="form-control-lg text-center">
                                            <input id="verUnidad" disabled class="form-control-lg text-center">
                                        </div>
                                    </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
