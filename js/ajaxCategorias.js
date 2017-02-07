$(document).ready(function () {
    $("#botonCategorias").click(function () {
       $("#imagenAjax").show();
        $("#botonCategorias").attr("disabled","true");
        $("#contenedor h2").remove();
        $("#contenedor table").remove();
        $("#contenedor form").remove();
        $.get("vistaCategorias.php").done(function(datos){
            $("#contenedor").html(datos);
            $("#imagenAjax").hide();
            $("#botonCategorias").removeAttr("disabled");
        }).fail(function () {
            $("#contenedor").html("Error al cargar los datos, vuelva a recargar la página");
        });
    });
});