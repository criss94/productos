$(document).ready(function () {
    $("#botonPeliculas").click(function () {
        $("#imagenAjax").show();
        $("#botonPeliculas").attr("disabled","true");
        $("#contenedor h2").remove();
        $("#contenedor table").remove();
        $("#contenedor form").remove();
        $.get("vistaPeliculas.php").done(function(datos){
            $("#contenedor").html(datos);
            $("#imagenAjax").hide();
            $("#botonPeliculas").removeAttr("disabled");
        }).fail(function () {
            $("#contenedor").html("Error al cargar los datos, vuelva a recargar la página");
        });
    });
});