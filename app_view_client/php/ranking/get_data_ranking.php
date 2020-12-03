<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$client=$_REQUEST['client'];
	
	$query = "select chofer.nombre_chofer, AVG(reparto.paquetes_entregados) as entregados, AVG(reparto.paquetes_pendiente) as pendientes from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join chofer on (chofer.idchofer = reparto_chofer.chofer) where chofer.client=$client group by reparto_chofer.chofer order by entregados DESC, pendientes ASC limit 3";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		$response_data = [];

		$data1 = mysqli_fetch_assoc($resultado);
		$ranking1["nombre"] = $data1['nombre_chofer'];				
		$ranking1["entregados"] = $data1['entregados'];
		$ranking1["pendientes"] = $data1['pendientes'];

		$data2 = mysqli_fetch_assoc($resultado);
		$ranking2["nombre"] = $data2['nombre_chofer'];
		$ranking2["entregados"] = $data2['entregados'];
		$ranking2["pendientes"] = $data2['pendientes'];

		$data3 = mysqli_fetch_assoc($resultado);
		$ranking3["nombre"] = $data3['nombre_chofer'];
		$ranking3["entregados"] = $data3['entregados'];
		$ranking3["pendientes"] = $data3['pendientes'];

		$response_data["ranking1"] = $ranking1;
		$response_data["ranking2"] = $ranking2;
		$response_data["ranking3"] = $ranking3;		

		echo json_encode($response_data);

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
