
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
	        "responsive": true,
	        "language": idioma_espanol,
	        "dom": '<"newtoolbar">frtip',

					"destroy":true,
					"ajax":{
						"method":"POST",
						"url": "../php/clients/showData.php"
					},

					"columns":[
						{"data":"nombre_client"},
						{"data":"nombre_contacto"},
						{"data":"phone_number_client"},
						{"data":"email_client"},
						{"data":"username_client"},
						{"data":"password_client"},						
						{"data":"status"},
						{"data":"created_client"},						
						{"data":"modified_client"},
						{"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#myModalEditar'><i class='fa fa-pencil-square-o'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}
					]
	    });
	    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

		obtener_id_eliminar("#clientes_data tbody", t);
		obtener_data_editar("#clientes_data tbody", t);
	}



	var obtener_id_eliminar = function(tbody, table){
		$(tbody).on("click", "button.eliminar", function(){

			let tr = $(this).parents("tr");
			if ($(tr).is('.child')){
				tr = tr.prev();
			}
			var data = table.row( tr ).data();
			
			var idclient = $("#frmEliminar #idclient").val( data.idclient );
		});
	}

	var obtener_data_editar = function(tbody, table){
		$(tbody).on("click", "button.editar", function(){

			let tr = $(this).parents("tr");
			if ($(tr).is('.child')){
				tr = tr.prev();
			}
			var data = table.row( tr ).data();
			
			var idclient = $("#frmEditar #idclient").val( data.idclient );
			var name = $("#frmEditar #name").val(data.nombre_client);			
			var nombre_contacto = $("#frmEditar #nombre_contacto").val(data.nombre_contacto);			
			var username = $("#frmEditar #username").val(data.username_client);			
			var password = $("#frmEditar #password").val(data.password_client);			
			var email = $("#frmEditar #email").val(data.email_client);			
			var telefono = $("#frmEditar #telefono").val(data.phone_number_client);			
			
			
		});
	}

	var eliminar = function(){
		$("#eliminar-cliente").on("click", function(){
			var idclient = $("#frmEliminar #idclient").val();
			$.ajax({
				method:"POST",
				url: "../php/clients/removeData.php",
				data: {
						"idclient": idclient
					  }
			}).done( function( info ){
				var json_info = JSON.parse( info );				
				location.reload(true);
			});
		});
	}

	var editar = function(){
		$("#editar-cliente").on("click", function(){

			var idclient = $("#frmEditar #idclient").val();
			var name = $("#frmEditar #name").val();			
			var nombre_contacto = $("#frmEditar #nombre_contacto").val();			
			var username = $("#frmEditar #username").val();			
			var password = $("#frmEditar #password").val();			
			var email = $("#frmEditar #email").val();			
			var telefono = $("#frmEditar #telefono").val();
			var status_client = $("#frmEditar #status_client").val();			

			$.ajax({
				method: "POST",
				url: "../php/clients/editData.php",
				data: {
					"name"   : name,						
					"nombre_contacto" : nombre_contacto,
					"username"   : username,						
					"password" : password,
					"email"   : email,						
					"telefono" : telefono,
					"idclient" : idclient,
					"status_client" : status_client

				}

			}).done( function( info ){

				var json_info = JSON.parse( info );				
				//mostrar_mensaje( json_info );
				location.reload(true);
			});
		});
	}

	var guardar = function(){
		$("#agregar-cliente").on("click", function(){

			var name = $("#frmAgregar #name").val();			
			var nombre_contacto = $("#frmAgregar #nombre_contacto").val();			
			var username = $("#frmAgregar #username").val();			
			var password = $("#frmAgregar #password").val();			
			var email = $("#frmAgregar #email").val();			
			var telefono = $("#frmAgregar #telefono").val();			


			$.ajax({
				method: "POST",
				url: "../php/clients/addData.php",
				data: {
						"name"   : name,						
						"nombre_contacto" : nombre_contacto,
						"username"   : username,						
						"password" : password,
						"email"   : email,						
						"telefono" : telefono						
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
