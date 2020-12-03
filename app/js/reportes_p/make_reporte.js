$(window).on('load', function() {

	process_report();
	
});

function process_report() {
	$("#process_reporte").on("click", function(){

	    //$('#clientes_data').DataTable().ajax.reload();	

		var chofer = $("#create_reporte #chofer").val();
		var status_reparto = $("#create_reporte #status_reparto").val();
		var fecha_init = $("#create_reporte #fecha_init").val();
		var fecha_end = $("#create_reporte #fecha_end").val();

		$.ajax({
			method: "POST",
			url: "../php/reportes_p/create_reporte.php",
			data: {
				"chofer"   : chofer,
				"status_reparto"   : status_reparto,
				"fecha_end" : fecha_end,
				"fecha_init" : fecha_init
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