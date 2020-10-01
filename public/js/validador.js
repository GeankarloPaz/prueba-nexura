
function validar_nombre(){
    var nombre = document.getElementById('nombre').value;

    if(nombre == null || nombre.length == 0){
        alert('nombre vacio');
    }
}