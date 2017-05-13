/**
 * Metodos adicionales para las validaciones para los input 
 * de los formularios
*/

//Input que contiene solo letras
$('.onlyletters').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z ]/g,'') ); }
);

//Input que contiene solo numeros
$('.onlynumbers').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^0-9 ]/g,'') ); }
);

