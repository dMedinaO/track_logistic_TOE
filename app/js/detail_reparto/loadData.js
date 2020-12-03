
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
	show_detail_data();

});


function show_detail_data(argument) {
	
	var chofer = getQuerystring('chofer');

	$.ajax({
		method:"POST",
		url: "../php/choferes/get_data_chofer.php",
		data: {
			"chofer": chofer
		}
	}).done( function( info ){
		var json_info = JSON.parse( info );				
		console.log(json_info);
		$(".name_chofer").html( json_info.nombre );

		name_fig = "../img/starts/"+json_info.estrellas+".png";
		document.getElementById("image_stars").src=name_fig;
	});
}
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
						{"data":"status_reparto"},	
						{"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#myModalEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}
					]
	    });
	    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

		obtener_id_eliminar("#repartos_data tbody", t);
		obtener_data_editar("#repartos_data tbody", t);
	}

	var obtener_id_eliminar = function(tbody, table){
		$(tbody).on("click", "button.eliminar", function(){
			let tr = $(this).parents("tr");
			if ($(tr).is('.child')){
				tr = tr.prev();
			}
			var data = table.row( tr ).data();
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
			var paquetes_inicial = $("#frmEditar #paquetes_inicial").val(data.paquetes_inicial);
			var paquetes_entregados = $("#frmEditar #paquetes_entregados").val(data.paquetes_entregados);
var date = $("#frmEditar #date").val(data.fecha_reparto);
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

			var paquetes_inicial = $("#frmEditar #paquetes_inicial").val();
			var paquetes_entregados = $("#frmEditar #paquetes_entregados").val();			
			var idreparto = $("#frmEditar #idreparto").val();
			var status_reparto = $("#frmEditar #status_reparto").val();
			var date = $("#frmEditar #date").val();
			var comuna = $("#frmEditar #comuna").val();

			$.ajax({
				method: "POST",
				url: "../php/detail_reparto/editData.php",
				data: {
					"paquetes_inicial"   : paquetes_inicial,
					"paquetes_entregados"   : paquetes_entregados,
					"idreparto" : idreparto,
					"status_reparto" : status_reparto,
					"date" : date,
					"comuna" : comuna


				}

			}).done( function( info ){

				var json_info = JSON.parse( info );
				//mostrar_mensaje( json_info );
				location.reload(true);
			});
		});
	}

	var guardar = function(){
		$("#agregar-pedido").on("click", function(){

			var comuna = $("#frmAgregar #comuna").val();
      		var pedidos_rec = $("#frmAgregar #paquetes_recogidos").val();
      		var pedidos_ent = $("#frmAgregar #paquetes_entregados").val();
      		var data_chofer = getQuerystring('chofer');
      		var fecha = $("#frmAgregar #date").val();
      		var status_reparto = $("#frmAgregar #status_reparto").val();

			$.ajax({
				method: "POST",
				url: "../php/detail_reparto/create_reparto.php",
				data: {
						"comuna"   : comuna,
						"pedidos_rec"   : pedidos_rec,
						"pedidos_ent"   : pedidos_ent,
						"data_chofer"   : data_chofer,
						"fecha"   : fecha,
						"status_reparto"   : status_reparto

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

