$(document).ready(function() {

	$("#inputBuscador").on('input', function() {
	    if($(this).val() == "" || $(this).val() == " ") {
	      $("#listaBeneficiario").empty();
	      return;
	    }
	    getAlumnoslikeNombre($(this).val());
    }):

	function getAlumnoslikeNombre(nombre) {
		$.ajax({
		  type: 'POST',
		  url: 'beneficiario.findLikeNombreApellidoRutJson',
		  data: {
		    nombre: nombre,
		  },
		  timeout: 10000,
		  beforeSend:function(){
		    // this is where we append a loading image
		    $('#progress').removeClass('hidden');
		  },
		  success:function(res){
		    addBeneficiarioToCard(res.alumnos)
		  },
		  complete:function(){
		    $('#progress').addClass('hidden');
		  },
		});
	}

	function addBeneficiarioToCard(alumnos) {

		if(alumnos) {
		  	$("#listaBeneficiario").empty();
		  	alumnos.forEach(function(element) {

			    var cardData = '  <!-- Card -->'+
			      '<div style="display:none" class="col-lg-3 col-sm-6 ">' +
			        '<div class="card">' +

			          '<!-- Card header -->' +
			          '<div class="card-header">' +
			            '<div class="card-photo">' +
			              '<img class="img-circle avatar" src="/images/man-3.jpg" alt="John Smith" title="John Smith">' +
			            '</div>' +
			            '<div class="card-short-description">' +
			              '<h5><span class="user-name"><a href="#/">'+element.nombreCompleto+'</a></span></h5>' +
			              '<p><span class="badge badge-primary">Agent</span></p>' +
			            '</div>' +
			          '</div>' +
			          '<!-- /card header -->' +

			          '<!-- Card content -->' +
			          '<div class="card-content">' +
			            '<p>Estudiante de la UCN.</p>' +
			            '<p>Un tipo normal.</p>' +
			            '<p>Insolente incomodo.</p>' +
			          '</div>' +
			          '<!-- /card content -->' +

			          '<!-- Card footer -->' +
			          '<div class="card-footer clearfix">' +
			            '<ul class="list-inline">' +
			              '<li><a href="#/"><i class="icon-pencil"></i></a></li>' +
			              '<li><a href="#/"><i class="icon-trash"></i></a></li>' +
			              '<li class="pull-right dropup">' +
			                '<a href="#/" data-toggle="dropdown"><i class="icon-dot-3 icon-more"></i></a>' +
			                '<ul class="dropdown-menu dropdown-menu-right">' +
			                  '<li><a href="">Change Setting</a></li>' +
			                  '<li><a href="">View Profile</a></li>' +
			                  '<li><a href="">Send Message</a></li>' +
			                '</ul>' +
			              '</li>' +
			            '</ul>' +
			          '</div>' +
			          '<!-- /card footer -->' +

			        '</div>' +

			      '</div>' +
			      '<!-- /card -->';
			    $(cardData).appendTo('#listaBeneficiario').fadeIn('normal');
			});
		}
	}

});