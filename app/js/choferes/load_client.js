$(document).ready(function () {
	
	$.ajax({
		type: "POST",
		url: "../php/choferes/show_cliente.php",
		success: function(response){
			$('.selector-client select').html(response).fadeIn();
		}
	});
});

