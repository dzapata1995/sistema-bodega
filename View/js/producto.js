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

            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarProducto").val(respuesta["nombre"]);
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

            $("#verCodigo").val(respuesta["codigo"]);
            $("#verProducto").val(respuesta["nombre"]);
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
