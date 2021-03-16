$(".tablaAsignacion").DataTable({
    "ajax": "ajax/datatable-orden.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sSearch":         "Buscar:",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

$(".tablaAsignacion tbody").on("click", "button.AddProducto", function (){
    var idProducto = $(this).attr("idProducto");

    $(this).removeClass("btn-primary AddProducto");
    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function (respuesta) {
            var producto = respuesta["nombre_producto"];
            var stock = respuesta["cantidad_total"];
            var id = respuesta["id"];

            if (stock == 0) {
                Swal.fire({
                    title: '!El producto no tiene Stock disponible Actualmente!',
                    icon: 'error',
                    confirmButtonText: 'Cerrar'
                });

                $("button[idProducto='"+idProducto+"']").removeClass("btn-default");
                $("button[idProducto='"+idProducto+"']").addClass("btn-primary addProducto");

                return;
            }

            $(".nuevoProductoOrden").append(
                '<div class="row" style="padding: 5px 15px;">'+
                    '<div class="col-lg-1">'+
                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+
                                    '<button class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'">'+
                                        '<i class="fas fa-times"></i>'+
                                    '</button>'+
                                '</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-9">'+
                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                            '</div>'+
                                '<input type="text" class="form-control nuevoAddProducto" idProducto="'+idProducto+'" id="agregarProducto" name="agregarProducto" value="'+producto+'" readonly>'+
                                '<input type="hidden" name="productoId[]" value="'+id+'">'+
                            '</div>'+
                        '</div>'+
                    '<div class="col-lg-2">'+
                        '<div class="input-group">'+
                            '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto[]" stock="'+stock+'" nuevoStock min="1" placeholder="0" required>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            )
        }
    })
});

$(".tablaAsignacion").on("draw.qt", function() {
    if (localStorage.getItem("quitarProducto") != null) {
        var listaIdroductos = JSON.parse(localStorage.getItem("quitarProducto"));

        for (var i = 0; i < listaIdroductos.length; i++) {
            $("button.recuperarBoton[idProducto='"+listaIdroductos[i]["idProducto"]+"']").removeClass('btn-default');
            $("button.recuperarBoton[idProducto='"+listaIdroductos[i]["idProducto"]+"']").addClass("btn-primary AddProducto");
        }
    }
})

var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");

$(".formularioOrden").on("click", "button.quitarProducto", function () {
    $(this).parent().parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");

    if (localStorage.getItem("quitarProducto") == null) {
        idQuitarProducto = [];
    } else {
        idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
    }

    idQuitarProducto.push({"idProducto":idProducto});
    localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

    $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default')
    $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary AddProducto');

})

$(".formularioOrden").on("change", "input.nuevaCantidadProducto", function () {
    var nuevoStock = Number($(this).attr("stock")) - $(this).val();
    $(this).attr("nuevoStock", nuevoStock);

    if (Number($(this).val()) > Number($(this).attr("stock"))) {
        $(this).val(1);

        Swal.fire({
            title: '¡La cantidad supera el stock!',
            text: "¡Solo hay "+$(this).attr("stock")+" unidades!",
            icon: 'error',
            confirmButtonText: 'Cerrar'
        })

        return;
    }
})
$(".tablaListadoOrden").DataTable({
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "orderCellsTop": true,
        "fixedHeader": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sSearch":         "Buscar:",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });