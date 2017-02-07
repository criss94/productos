$(document).ready(function () {
    $("#botonMarcas").click(function () {
        $("#imagenAjax").show();
        $("#botonMarcas").attr("disabled","true");
        $("#contenedor h2").remove();
        $("#contenedor table").remove();
        $("#contenedor form").remove();
        $.get("vistaMarcas.php").done(function(datos){
            $("#contenedor").html(datos);
            $("#imagenAjax").hide();
            $("#botonMarcas").removeAttr("disabled");
        }).fail(function () {
            $("#contenedor").html("Error al cargar los datos, vuelva a recargar la página");
        });
    });
});