
// Tables-DataTables.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(window).on('load', function() {

	listar();
	guardar();
	eliminar();
	editar();	

});


//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
    // DATA TABLES
    // =================================================================
    // Require Data Tables
    // -----------------------------------------------------------------
    // http://www.datatables.net/
    // =================================================================

    $.fn.DataTable.ext.pager.numbers_length = 5;

    //listamos los datos...
		var listar = function(){


			var id_data = getQuerystring('chofer');

	    var t = $('#repartos_data').DataTable({
	        "responsive": true,
	        "language": idioma_espanol,
	        "dom": '<"newtoolbar">frtip',

					"destroy":true,
					"ajax":{
						"method":"POST",
						"url": "../php/detail_reparto/showData.php?data="+id_data
					},

					"columns":[
						{"data":"fecha_reparto"},
						{"data":"nombre_comuna"},
						{"data":"paquetes_inicial"},												
						{"data":"paquetes_entregados"},
						{"data":"paquetes_pendiente"},						
						{"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#myModalEditar'><i class='fa fa-pencil-square-o'></i></button>"}
					]
	    });
	   	    

	    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

		obtener_id_eliminar("#repartos_data tbody", t);
		obtener_data_editar("#repartos_data tbody", t);
		check_length_data();
	}

	var check_length_data = function () {
		
		//to evaluate if show the data...
	    var id_chofer = getQuerystring('chofer');

	    //por ajax hacemos la solicitud
	    $.ajax({
				method:"POST",
				url: "../php/detail_reparto/numbers_length.php",
				data: {
						"id_chofer": id_chofer
					  }
		}).done( function( info ){			
			var json_info = JSON.parse( info );				
			console.log(json_info.response);
			if (json_info.response=="ERROR"){
				console.log("en el if");
	    		$('#view_not_data').show();
			 	$('#table_content').hide();
			}else{
				$('#view_not_data').hide();
				$('#table_content').show();
			}
		});	    		
	}

	var obtener_id_eliminar = function(tbody, table){
		$(tbody).on("click", "button.eliminar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			var idreparto = $("#frmEliminar #idreparto").val( data.idreparto );
		});
	}

	var obtener_data_editar = function(tbody, table){
		$(tbody).on("click", "button.editar", function(){

			let tr = $(this).parents("tr");
			if ($(tr).is('.child')){
				tr = tr.prev();
			}
			var data = table.row( tr ).data();			
			var paquetes_entregados = $("#frmEditar #paquetes_entregados").val(data.paquetes_entregados);
			var paquetes_inicial = $("#frmEditar #paquetes_inicial").val(data.paquetes_inicial);
			var idreparto = $("#frmEditar #idreparto").val( data.idreparto );
			
			
		});
	}

	var eliminar = function(){
		$("#eliminar-chofer").on("click", function(){
			var idreparto = $("#frmEliminar #idreparto").val();
			$.ajax({
				method:"POST",
				url: "../php/detail_reparto/removeData.php",
				data: {
						"idreparto": idreparto
					  }
			}).done( function( info ){
				var json_info = JSON.parse( info );				
				location.reload(true);
			});
		});
	}

	var editar = function(){
		$("#editar-chofer").on("click", function(){

			var paquetes_entregados = $("#frmEditar #paquetes_entregados").val();			
			var paquetes_inicial = $("#frmEditar #paquetes_inicial").val();			
			var idreparto = $("#frmEditar #idreparto").val();
			var status_reparto = "FINALIZADO";

			$.ajax({
				method: "POST",
				url: "../php/detail_reparto/editData.php",
				data: {
					"paquetes_inicial"   : paquetes_inicial,
					"paquetes_entregados"   : paquetes_entregados,
					"idreparto" : idreparto,
					"status_reparto" : status_reparto

				}

			}).done( function( info ){

				var json_info = JSON.parse( info );
				//mostrar_mensaje( json_info );
				location.reload(true);
			});
		});
	}

	var guardar = function(){
		$("#agregar-chofer").on("click", function(){

			var name = $("#frmAgregar #name").val();								

			$.ajax({
				method: "POST",
				url: "../php/comunas/addData.php",
				data: {
						"name"   : name						
					}

			}).done( function( info ){

				var json_info = JSON.parse( info );
				console.log(json_info);
				//mostrar_mensaje( json_info );
				location.reload(true);
			});
		});
	}

	var mostrar_mensaje = function( informacion ){

		var texto = "", color = "";
		if( informacion.respuesta == "BIEN" ){
			texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
			color = "#379911";
		}else if( informacion.respuesta == "ERROR"){
			texto = "<strong>Error</strong>, no se ejecutó la consulta.";
			color = "#C9302C";
		}else if( informacion.respuesta == "EXISTE" ){
			texto = "<strong>Información!</strong> el usuario ya existe.";
			color = "#5b94c5";
		}else if( informacion.respuesta == "VACIO" ){
			texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
			color = "#ddb11d";
		}else if( informacion.respuesta == "OPCION_VACIA" ){
			texto = "<strong>Advertencia!</strong> la opción no existe o esta vacia, recargar la página.";
			color = "#ddb11d";
		}

		$(".mensaje").html( texto ).css({"color": color });
		$(".mensaje").fadeOut(5000, function(){
			$(this).html("");
			$(this).fadeIn(3000);
		});
	}

	var idioma_espanol = {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Registros del _START_ al _END_  de _TOTAL_ ",
	    "sInfoEmpty":      "Sin registros",
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

