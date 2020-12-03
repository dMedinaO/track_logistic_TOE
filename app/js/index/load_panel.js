$(window).on('load', function() {

	cargarInfoSemanal();
	cargarInfoMensual();
	cargarInfoHistorico();

});

var cargarInfoSemanal = function(){

	var data = getQuerystring('data');
	$.ajax({
			method:"POST",
			url: "php/index/load_panel.php?data="+data+"&periode=1"

		}).done( function( info ){
			$(".panel1_semana").html( info.panel1 );
			$(".panel2_semana").html( info.panel2 );
			$(".panel3_semana").html( info.panel3 );
			$(".panel4_semana").html( info.panel4 );

		});
}

var cargarInfoMensual = function(){

	var data = getQuerystring('data');
	$.ajax({
			method:"POST",
			url: "php/index/load_panel.php?data="+data+"&periode=2"

		}).done( function( info ){
			$(".panel1_mensual").html( info.panel1 );
			$(".panel2_mensual").html( info.panel2 );
			$(".panel3_mensual").html( info.panel3 );
			$(".panel4_mensual").html( info.panel4 );

		});
}

var cargarInfoHistorico = function(){

	var data = getQuerystring('data');
	$.ajax({
			method:"POST",
			url: "php/index/load_panel.php?data="+data+"&periode=3"

		}).done( function( info ){
			$(".panel1_historico").html( info.panel1 );
			$(".panel2_historico").html( info.panel2 );
			$(".panel3_historico").html( info.panel3 );
			$(".panel4_historico").html( info.panel4 );

		});
}

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}