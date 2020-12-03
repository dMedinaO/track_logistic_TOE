$(window).on('load', function() {

	cargarInfo();

});

var cargarInfo = function(){

	var data = getQuerystring('chofer');
	$.ajax({
			method:"POST",
			url: "php/index/load_panel.php?data="+data

		}).done( function( info ){
			$(".panel1").html( info.panel1 );
			$(".panel2").html( info.panel2 );			

		});
}

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}