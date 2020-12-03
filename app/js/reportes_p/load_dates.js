$(document).ready(function () {
	
	$.ajax({
		type: "POST",
		url: "../php/reportes_p/show_fechas.php",
		success: function(response){
			$('.selector-fecha_init select').html(response).fadeIn();
			$('.selector-fecha_end select').html(response).fadeIn();
		}
	});
});

