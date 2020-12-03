<?php

	header("content-type: application/json");

	#incluimos la conexion a la base de datos
	include ("../connection.php");

	#consulta para obtener los pacientes anormales segun el criterio chileno
	$query1 = "select COUNT(*) as cantidad from reparto_chofer join reparto on (reparto.idreparto = reparto_chofer.reparto) where DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')";
	$resultado = mysqli_query($conexion, $query1);

	$cantidad_dia_OK = -1;	

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$cantidad_dia_OK=$data['cantidad'];

		}
	}

	#consulta para obtener los pacientes anormales segun el criterio chileno
	$query2 = "select COUNT(*) as cantidad from chofer where chofer.idchofer not in (select DISTINCT(reparto_chofer.chofer) from  reparto_chofer join reparto on (reparto.idreparto = reparto_chofer.reparto) where DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d'))";
	$resultado = mysqli_query($conexion, $query2);

	$cantidad_dia_NOT = -1;	

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$cantidad_dia_NOT=$data['cantidad'];

		}
	}

	$responseData["cantidad_dia_OK"] = $cantidad_dia_OK;
	$responseData["cantidad_dia_NOT"] = $cantidad_dia_NOT;

	echo json_encode($responseData);

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
