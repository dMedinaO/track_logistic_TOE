
// Tables-DataTables.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -



$(window).on('load', function() {

	listar();
	get_data_to_ranking();

});

function get_data_to_ranking(argument) {
	// body...
	$.ajax({
		method:"POST",
		url: "../php/ranking/get_data_ranking.php",
		
	}).done( function( info ){
		var json_info = JSON.parse( info );				
		
		//add data to class
		$(".user_name2").html( json_info.ranking2.nombre);
		$(".entregados_r2").html( "Paquetes entregados: "+ parseInt(json_info.ranking2.entregados) );
		$(".pendientes_r2").html( "Paquetes pendientes: " + parseInt(json_info.ranking2.pendientes) );

		$(".user_name1").html( json_info.ranking1.nombre);
		$(".entregados_r1").html( "Paquetes entregados: "+ parseInt(json_info.ranking1.entregados) );
		$(".pendientes_r1").html( "Paquetes pendientes: " + parseInt(json_info.ranking1.pendientes) );

		$(".user_name3").html( json_info.ranking3.nombre);
		$(".entregados_r3").html( "Paquetes entregados: "+ parseInt(json_info.ranking3.entregados) );
		$(".pendientes_r3").html( "Paquetes pendientes: " + parseInt(json_info.ranking3.pendientes) );


	});
}
    // DATA TABLES
    // =================================================================
    // Require Data Tables
    // -----------------------------------------------------------------
    // http://www.datatables.net/
    // =================================================================

    $.fn.DataTable.ext.pager.numbers_length = 5;

    //listamos los datos...
		var listar = function(){
	    var t = $('#clientes_data').DataTable({
	    	"order": [[ 3, "asc" ]],
	        "responsive": true,
	        "language": idioma_espanol,
	        "dom": '<"newtoolbar">frtip',

					"destroy":true,
					"ajax":{
						"method":"POST",
						"url": "../php/ranking/showData.php"
					},

					"columns":[
						{"data":"nombre_chofer"},
						{"data":"rut_chofer"},
						{"data":"telefono"},
						{"data":"ranking"},						
					]
	    });
	    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));
		
	}

	var idioma_espanol = {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	}
