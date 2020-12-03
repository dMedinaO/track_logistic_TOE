<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$client = $_REQUEST['client'];

	$query = "select * from chofer where chofer.idchofer not in (select DISTINCT(reparto_chofer.chofer) from  reparto_chofer join reparto on (reparto.idreparto = reparto_chofer.reparto) where DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')) AND chofer.client=$client";
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
