<?php

	
	header("content-type: application/json");

	#incluimos la conexion a la base de datos
	include ("../connection.php");

	$data_id = $_REQUEST['data'];
	$responseData = [];

	#consulta para obtener la cantidad de usuarios
	$query = "select count(*) as cantidad from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) where reparto_chofer.chofer = $data_id AND reparto_chofer.status_reparto = 'FINALIZADO'";
	$resultado = mysqli_query($conexion, $query);

	$responseData['query1'] = $query;
	$panel1 = 0;

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$panel1 = $data['cantidad'];

		}
	}


	#consulta para obtener la cantidad de paises
	$query = "select count(*) as cantidad from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) where reparto_chofer.chofer = $data_id AND reparto_chofer.status_reparto = 'PENDIENTE'";
	$resultadoA = mysqli_query($conexion, $query);

	$responseData['query2'] = $query;
	$panel2 = 0;

	if (!$resultadoA){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultadoA)){

			$panel2 = $data['cantidad'];

		}
	}

	$responseData['panel1'] = $panel1;
	$responseData['panel2'] = $panel2;

	echo json_encode($responseData);

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
