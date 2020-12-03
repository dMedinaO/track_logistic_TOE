$(document).ready(function () {
	
	$.ajax({
		type: "POST",
		url: "../php/reportes/show_chofer.php",
		success: function(response){
			$('.selector-chofer select').html(response).fadeIn();
		}
	});
});

