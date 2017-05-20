$(document).ready(function() {

	$("#inputBuscador").on('input', function() {
	    if($(this).val() == "" || $(this).val() == " ") {
	      $("#listaBeneficiario").empty();
	      return;
	    }
	    getBeneficiariosLikeNombre($(this).val());
    });


	function getBeneficiariosLikeNombre(query) {
		$.ajax({
		  type: 'GET',
		  url: '/beneficiario/buscar/',
		  data: {
		    q: query
		  },
		  timeout: 10000,
		  beforeSend:function(){
		    // this is where we append a loading image
		    $('#progress').removeClass('hidden');
		  },
		  success:function(res){
		    addBeneficiarioToCard(res.beneficiario)
		  },
		  complete:function(){
		    $('#progress').addClass('hidden');
		  },
		});
	}

	function addBeneficiarioToCard(beneficiarios) {

		if(beneficiarios) {
		  	$("#listaBeneficiario").empty();
		  	alumnos.forEach(function(element) {
	  		var cardData = '<div class="card col-xs-12 col-md-6 col-lg-4">' +
  							  '<img class="card-img-top" src="http://placehold.it/230x230&text=Photo" alt="Card image cap">' +
	                          '<div class="card-block">' +
	                            '<h4 class="card-title">' + element.nombreCompleto + '</h4>' +
	                            '<p class="card-text">' + element.rut +'</p>' +
	                            '<button class="btn btn-primary btn-xs" style="margin-bottom:5px">' +
	                              '<i class="fa fa-ambulance"></i>' +
	                              'Médica' +
	                            '</button>' +
	                            '<button class="btn btn-success btn-xs" style="margin-bottom:5px">' +
	                              '<i class="fa fa-users"></i>' +
	                              Social
	                            '</button>' +
	                            '<button class="btn btn-danger btn-xs" style="margin-bottom:5px">' +
	                              '<i class="fa fa-user"></i>' +
	                              'Perfil' +
	                            '</button>' +
	                          '</div>' +
	                        '</div>';		              
		    				$(cardData).appendTo('#listaBeneficiario').fadeIn('normal');
			});
		}
	}

});