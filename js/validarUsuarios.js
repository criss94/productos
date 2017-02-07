function eliminar(){
    var m="Esta seguro que quiere eliminarlo?";
    if (confirm(m)){
        return true;
    }
    window.location="panelUsuarios.php";
    return false;
}