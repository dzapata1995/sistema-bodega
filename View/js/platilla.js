/* DataTable */
$(".tabla").DataTable({
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

$(document).ready(function() {
    var URLactual = window.location.pathname;

    URLactual = URLactual.split('/').pop();
    URLactual = URLactual.split('.');

    document.querySelector('.' + URLactual[0]).classList.add('active');

})

/* JS Productos */


$(document).on("click", ".btnVerProducto", function(){
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
            $("#verCodigo").val(respuesta["codigo"]);
            $("#verNombre").val(respuesta["nombre"]);
            $("#verDescripcion").val(respuesta["descripcion"]);
            $("#verImagen").val(respuesta["imagen"]);
            $("#verBodega").val(respuesta["fk_bodega"]);
            $("#verStock").val(respuesta["cantidad_total"]);

            $("#verIngreso").val(respuesta["ultimo_ingreso"]);

            if (respuesta["imagen"] != "") {
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    });
})