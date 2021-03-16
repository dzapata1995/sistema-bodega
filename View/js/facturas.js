$(".tablaFacturas").DataTable({
    "ajax": "ajax/datatable-facturas.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "language" : {
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

$(".tablaFacturas tbody").on("click", "button.agregarProducto", function (){
    var idProducto = $(this).attr("idProducto");

    $(this).removeClass("btn-primary agregarProducto");

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
        success:function (respuesta){

            var producto = respuesta["nombre"];
            var stock = respuesta["cantidad_total"];

            $(".nuevoProducto").append(
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
                            '<input type="text" class="form-control jsonProducto" idProducto="'+idProducto+'" id="agregarProducto" name="agregarProducto" value="'+producto+'" readonly>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-2">'+
                        '<div class="input-group">'+
                            '<input type="number" class="form-control jsonCantidad" name="nuevaCantidadProducto" min="1" value="0" stock="'+stock+'" nuevoStock="'+stock+'" required>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            )

            listarProductos()
        }
    })
});

var idQuitarProducto = [];

$(".formularioFactura").on("click", "button.quitarProducto", function (){

    $(this).parent().parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");

    if (localStorage.getItem("quitarProducto") == null) {
        idQuitarProducto = [];
    } else {
        idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
    }

    idQuitarProducto.push({"idProducto": idProducto});
    localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

    $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');
    $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

    listarProductos()

});



var numProducto = 0;

$(".btnAgregarProducto").click(function() {

    numProducto ++;

    var datos = new FormData();
    datos.append("traerProductos", "ok");

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function (respuesta){
            $(".nuevoProducto").append(
                '<div class="row" style="padding: 5px 15px;">'+
                    '<div class="col-10">'+
                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+
                                    '<button class="btn btn-danger btn-xs quitarProducto" idProducto>'+
                                        '<i class="fas fa-times"></i>'+
                                    '</button>'+
                                '</span>'+
                            '</div>'+
                            '<select class="form-control nuevoProductoSelect" id="producto'+numProducto+'" idProducto name="nuevoProducto" required>'+
                                '<option hidden>Seleccione el producto</option>'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-2">'+
                        '<div class="input-group">'+
                            '<input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="0" stock nuevoStock required>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){

                if (item.cantidad_total != 0) {
                    $("#producto"+numProducto).append(
                        '<option idProducto="'+item.id+'" value="'+item.nombre+'">'+item.nombre+'</option>'
                    )
                }
            }

            listarProductos()
        }
    })
});

$(".formularioFactura").on("change", "select.")

function listarProductos() {
    var listarProductos = [];

    var producto = $(".jsonProducto");
    var cantidad = $(".jsonCantidad");

    for (var i = 0; i < producto.length; i++) {
        listarProductos.push({"id" : $(producto[i]).attr("idProducto"),
                            "nombre" : $(producto[i]).val(),
                            "cantidad" : $(cantidad[i]).val(),
                            "stock" : $(cantidad[i]).attr("nuevoStock")
        })
    }

    console.log("listarProductos", listarProductos);

}