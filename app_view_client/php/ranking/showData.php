<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$client=$_REQUEST['client'];
	$query = "select * from chofer where chofer.ranking != 0 AND chofer.client=$client order by chofer.ranking ASC";
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
