<?php

	header("content-type: application/json");

	#incluimos la conexion a la base de datos
	include ("../connection.php");

	#consulta para obtener los pacientes anormales segun el criterio chileno
	$query = "select COUNT(reparto_chofer.status_reparto) as cantidad, reparto_chofer.status_reparto from reparto_chofer group by reparto_chofer.status_reparto";
	$resultado = mysqli_query($conexion, $query);

	$responseData = [];

	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$responseData[] = $data;

		}
	}

	echo json_encode($responseData);

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
