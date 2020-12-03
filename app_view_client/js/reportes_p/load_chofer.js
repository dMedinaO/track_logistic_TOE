$(document).ready(function () {
	
	var client=getQuerystring('sag');	
	$.ajax({
		type: "POST",
		url: "../php/reportes/show_chofer.php?client="+client,
		success: function(response){
			$('.selector-chofer select').html(response).fadeIn();
		}
	});
});

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}
