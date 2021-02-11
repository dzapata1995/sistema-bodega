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
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarProducto").val(respuesta["nombre"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarMedida").val(respuesta["unidad_medida"]);
            $("#editarUbicacion").html(respuesta["fk_bodega"]);
            $("#editarUbicacion").val(respuesta["fk_bodega"]);
            $("#fotoActual").val(respuesta["imagen"]);

            if (respuesta["imagen"] != "") {
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    });
})

$(document).on("click", ".btnVerProducto", function () {
    var idProducto1 = $(this).attr("idProducto1");
    var datos = new FormData();
    datos.append("idProducto1", idProducto1);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#verCodigo").val(respuesta["codigo"]);
            $("#verProducto").val(respuesta["nombre"]);
            $("#verDescripcion").val(respuesta["descripcion"]);
            $("#verStock").val(respuesta["cantidad_total"]);
            $("#verUnidad").val(respuesta["unidad_medida"]);
            $("#verUbicacion").val(respuesta["fk_bodega"]);
            $("#verUbicacion").html(respuesta["fk_bodega"]);
            $("#fotoActual").val(respuesta["imagen"]);
            if (respuesta["imagen"] != "") {
                $(".previsualizar").attr("src", respuesta["imagen"]);
            }
        }
    })
})

/* DataTable Dinamica JSON */
$.ajax({
    url: "ajax/datatable-productos.ajax.php",
    success: function (respuesta) {

    }
})