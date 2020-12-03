$(document).ready(function () {
	
	$.ajax({
		type: "POST",
		url: "../php/detail_reparto/show_comuna.php",
		success: function(response){
			$('.selector-comuna select').html(response).fadeIn();
		}
	});
});

