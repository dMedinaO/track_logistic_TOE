<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$chofer = $_REQUEST['chofer'];

	$query = "select nombre_chofer, estrellas from chofer where idchofer=$chofer";
	$resultado = mysqli_query($conexion, $query);

	$response = [];

	if (!$resultado){
		$response['result'] = "ERROR";
	}else{

		$response['result'] = "OK";
		$data = mysqli_fetch_assoc($resultado);
		$response['nombre'] = $data['nombre_chofer'];
		$response['estrellas'] = $data['estrellas'];		
	}
	
	echo json_encode($response);
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
