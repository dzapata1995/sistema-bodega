$(".nuevaFoto").change(function(){
    var imagen = this.files[0];

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }else if(imagen["size"] > 2000000){
        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }else{
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})

$(document).on("click",".btnEditarUsuario", function(){
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta){
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarRun").val(respuesta["run"]);
            $("#editarRol").html(respuesta["rol"]);
            $("#editarRol").val(respuesta["rol"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {
                $(".previsualizar").attr("src", respuesta["foto"]);
            }
        }
    });
})

$(document).on("click", ".btnActivar", function (){
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (window.matchMedia("(max-width:767px").matches) {
                swal ({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "Cerrar"
                    }).then(function (result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
            }
        }
    })

    if (estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1)
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);
    }

})

$("#nuevoRun").change(function () {

    $(".alert").remove();

    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                 $("#nuevoRun").parent().after('<div class="alert alert-warning">Usuario ya existe.</div>');
                 $("#nuevoRun").val("");
            }
        }
    })
})
