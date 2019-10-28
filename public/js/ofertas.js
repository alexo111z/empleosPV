function mostrar_busqueda(){
    document.getElementById("busqueda-avanzada").style.display = 'block';
    document.getElementById("link-cancelar").style.display = 'block';
    document.getElementById("link-busqueda").style.display = 'none';
}
function ocultar_busqueda(){
    document.getElementById("busqueda-avanzada").style.display = 'none';
    document.getElementById("link-cancelar").style.display = 'none';
    document.getElementById("link-busqueda").style.display = 'block';
}