$(window).on('load', function() {

	process_report();

});

function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}

function process_report(argument) {
	$("#process_reporte").on("click", function(){

	    //$('#clientes_data').DataTable().ajax.reload();	

		var chofer = $("#create_reporte #chofer").val();
		var status_reparto = $("#create_reporte #status_reparto").val();
		var periodo_interes = $("#create_reporte #periodo_interes").val();

		var client = getQuerystring('sag');

		$.ajax({
			method: "POST",
			url: "../php/reportes/create_reporte.php",
			data: {
				"chofer"   : chofer,
				"status_reparto"   : status_reparto,
				"periodo_interes" : periodo_interes,
				"client" : client
		}

		}).done( function( info ){

			var json_info = JSON.parse( info );
			console.log(json_info);
			
			if (json_info.result == "ERROR"){
				$('#errorResponse').show();
          		setTimeout('', 5000);
			}else{				
				$('#result_report').show();
				var t = $('#clientes_data').DataTable({
			        "responsive": true,
			        "destroy":true,
			        "language": idioma_espanol,
			        "dom": 'Bfrtip',
			        "buttons": [
			            'copyHtml5',
			            'excelHtml5',
			            'csvHtml5',
			            'pdfHtml5'
			        ],

					"destroy":true,
					"data" : json_info.data,

					"columns":[
						{"data":"nombre_chofer"},
						{"data":"rut_chofer"},
						{"data":"telefono"},
						{"data":"fecha_trunc_reparto"},						
						{"data":"nombre_comuna"},						
						{"data":"paquetes_inicial"},
						{"data":"paquetes_entregados"},						
						{"data":"paquetes_pendiente"}
						
					]
	    		});
	    		$('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));
			}
		});
	});	
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