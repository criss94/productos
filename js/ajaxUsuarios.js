$(document).ready(function () {
    $("#botonUsuarios").click(function () {
        $("#imagenAjax").show();
        $("#botonUsuarios").attr("disabled","true");
        $("#contenedor h2").remove();
        $("#contenedor table").remove();
        $("#contenedor form").remove();
        $.get("vistaUsuarios.php").done(function(datos){
            $("#contenedor").html(datos);
            $("#imagenAjax").hide();
            $("#botonUsuarios").removeAttr("disabled");
        }).fail(function () {
            $("#contenedor").html("Error al cargar los datos, vuelva a recargar la página");
        });
    });
});