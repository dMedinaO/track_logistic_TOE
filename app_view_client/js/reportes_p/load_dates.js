$(document).ready(function () {
	
	var client=getQuerystring('sag');
	$.ajax({
		type: "POST",
		url: "../php/reportes_p/show_fechas.php?client="+client,
		success: function(response){
			$('.selector-fecha_init select').html(response).fadeIn();
			$('.selector-fecha_end select').html(response).fadeIn();
		}
	});
});

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}
