$('.tablaProductos').DataTable({
    "ajax": "ajax/datatable-productos.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "language" : {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    "dom": "Bfrtip",
    "buttons": [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});

$(document).on("click", ".btnEditarProducto", function () {
    var idProducto = $(this).attr("idProducto");

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
        success: function (respuesta){

            var datosBodega = new FormData();
            datosBodega.append("idBodega", respuesta["fk_bodega"]);

            $.ajax({
                url: "ajax/varios.ajax.php",
                method: "POST",
                data: datosBodega,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    $("#editarUbicacion").val(respuesta["id"]);
                    $("#editarUbicacion").html(respuesta["nombre"]);
                }
            })

            $("#editarCodigo").val(respuesta["codigo_producto"]);
            $("#editarProducto").val(respuesta["nombre_producto"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarMedida").val(respuesta["unidad_medida"]);
            $("#fotoActual").val(respuesta["imagen"]);

            if (respuesta["imagen"] != "") {
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    });
})

$(document).on("click", ".btnVerProducto", function () {
    var idProducto = $(this).attr("idProducto");
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
        success: function (respuesta) {

            var datosBodega = new FormData();
            datosBodega.append("idBodega", respuesta["fk_bodega"]);

            $.ajax({
                url: "ajax/varios.ajax.php",
                method: "POST",
                data: datosBodega,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    $("#verUbicacion").val(respuesta["id"]);
                    $("#verUbicacion").html(respuesta["nombre"]);
                }
            })

            $("#verCodigo").val(respuesta["codigo_producto"]);
            $("#verProducto").val(respuesta["nombre_producto"]);
            $("#verDescripcion").val(respuesta["descripcion"]);
            $("#verStock").val(respuesta["cantidad_total"]);
            $("#verUnidad").val(respuesta["unidad_medida"]);
            $("#fotoActual").val(respuesta["imagen"]);
            if (respuesta["imagen"] != "") {
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    })
})
