<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");
	$client = $_REQUEST['client'];

	$query = "select idchofer, nombre_chofer, rut_chofer, estrellas, observaciones, DATE_FORMAT(created_chofer, '%Y-%m-%d') as created_chofer, edited_chofer, telefono, nombre_client from chofer  join client on client.idclient = chofer.client where chofer.client=$client";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = $data;
		}

		echo json_encode($arreglo);

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
