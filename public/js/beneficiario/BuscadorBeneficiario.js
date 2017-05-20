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
		  url: '/beneficiario/buscar-json/',
		  data: {
		    query: query
		  },
		  beforeSend: function(){
		    // this is where we append a loading image
		    $('#progress').removeClass('hidden');
		  },
		  success: function(res){
			  console.log(res)
		    addBeneficiarioToCard(res.beneficiario)
		  },
		  complete: function(){
		    $('#progress').addClass('hidden');
		  },
		  error: function(err) {
			  console.log(err);
		  }
		});
	}

	function addBeneficiarioToCard(beneficiarios) {
		alert('Añadiendo')

		if(beneficiarios) {
		  	$("#listaBeneficiario").empty();
		  	beneficiarios.forEach(function(element) {
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
