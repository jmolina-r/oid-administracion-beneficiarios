/**
 * Metodos adicionales para las validaciones para los input
 * de los formularios
*/
//Input que no contiene numeros ni caracteres extraños, pero si acepta tildes
$('.onlyletters').bind('keyup blur',function(){
    var node = $(this);
    var regLetters = /((\d)+|[…„´≠”“÷¬∞¢¿·ºª"~!@#$%^&*\(\)_=`{}\[\]\|\\:;'<>,\.\/\?"\-])/g
    if(node.val().match(regLetters)) {
        node.val(node.val().replace(regLetters,'') ); }
    }
);

//Input que contiene solo numeros
$('.onlynumbers').bind('keyup blur',function(){
    var node = $(this);
    regNumbers = /[^0-9]/g
    if(node.val().match(regNumbers)) {
        node.val(node.val().replace(regNumbers,'') ); }
    }
);

//Input que contiene solo numeros, letra k y -.
$('.onlyrut').bind('keyup blur',function(){
    var node = $(this);
    regRuts = /[A-JL-Za-jl-z…„´≠”“÷¬∞¢¿·ºª"~!@#$%^&*\(\)_=`{}\[\]\|\\:;'<>,\.\/\?"]/g
    if(node.val().match(regRuts)) {
        node.val(node.val().replace(regRuts,'') ); }
    }
);
