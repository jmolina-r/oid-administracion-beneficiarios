/**
 * Metodos adicionales para las validaciones para los input
 * de los formularios
*/
//Input que no contiene numeros ni caracteres extraños, pero si acepta tildes
$('.onlyletters').bind('keyup blur',function(){
    var node = $(this);
    node.val(node.val().replace(/((\d)+|[‚´≠”“÷¬∞¢¿·ºª"~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\-])/g,'') ); }
);

//Input que contiene solo numeros
$('.onlynumbers').bind('keyup blur',function(){
    var node = $(this);
    node.val(node.val().replace(/[^0-9 ]/g,'') ); }
);

//Input que contiene solo numeros
$('.onlyrut').bind('keyup blur',function(){
    var node = $(this);
    node.val(node.val().replace(/[A-Za-jl-z‚´≠”“÷¬∞¢¿·ºª"~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"]/g,'') ); }
);
