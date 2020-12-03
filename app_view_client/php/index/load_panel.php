<?php
	
	header("content-type: application/json");

	#incluimos la conexion a la base de datos
	include ("../connection.php");
	
	$periode = $_REQUEST['periode'];
	$client = $_REQUEST['data'];

	$responseData = [];

	#consulta para obtener la cantidad de usuarios
	$query = "select SUM(reparto.paquetes_entregados) as cantidad from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join chofer on (chofer.idchofer = reparto_chofer.chofer)";
	
	if ($periode == 1){#semana
		$query = $query." where WEEK(fecha_reparto) = WEEK(NOW()) AND chofer.client=$client";
	}elseif ($periode == 2) {
		$query = $query." where DATE_FORMAT(fecha_reparto, '%m') = DATE_FORMAT(NOW(), '%m') AND chofer.client=$client";
	}else{
		$query = $query." where chofer.client=$client";
	}

	$responseData['query1'] = $query;

	$resultado = mysqli_query($conexion, $query);

	$responseData['query1'] = $query;
	$panel1 = 0;

	if (!$resultado){
		$panel1=-1;
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			if ($data['cantidad'] == null){
				$panel1=0;
			}else{
				$panel1 = $data['cantidad'];
			}

		}
	}

	#consulta para obtener la cantidad de paises
	$query = "select DISTINCT(COUNT(*)) as cantidad from reparto_chofer join reparto on (reparto.idreparto = reparto_chofer.reparto ) join chofer on (chofer.idchofer = reparto_chofer.chofer)  where reparto_chofer.status_reparto = 'FINALIZADO'";

	if ($periode == 1){#semana
		$query = $query." AND WEEK(fecha_reparto) = WEEK(NOW()) AND chofer.client = $client";
	}elseif ($periode == 2) {
		$query = $query." AND DATE_FORMAT(fecha_reparto, '%m') = DATE_FORMAT(NOW(), '%m') AND chofer.client=$client";
	}else{
		$query = $query." AND chofer.client=$client";
	}

	$resultadoA = mysqli_query($conexion, $query);

	$responseData['query2'] = $query;
	$panel2 = 0;

	if (!$resultadoA){
		$panel2 = -1;
	}else{

		while($data = mysqli_fetch_assoc($resultadoA)){

			$panel2 = $data['cantidad'];

		}
	}

	#consulta para obtener la cantidad de instituciones
	$query = "select DISTINCT(COUNT(*)) as cantidad from reparto_chofer join reparto on (reparto.idreparto = reparto_chofer.reparto ) join chofer on (chofer.idchofer = reparto_chofer.chofer) where reparto_chofer.status_reparto ='PENDIENTE'";

	if ($periode == 1){#semana
		$query = $query." AND WEEK(fecha_reparto) = WEEK(NOW()) AND chofer.client=$client";
	}elseif ($periode == 2) {
		$query = $query." AND DATE_FORMAT(fecha_reparto, '%m') = DATE_FORMAT(NOW(), '%m') AND chofer.client = $client";
	}else{
		$query = $query." AND chofer.client=$client";
	}

	$resultadoAA = mysqli_query($conexion, $query);

	$panel3 = 0;

	$responseData['query3'] = $query;
	if (!$resultadoAA){
		$panel3 = -1;
	}else{

		while($data = mysqli_fetch_assoc($resultadoAA)){

			$panel3 = $data['cantidad'];

		}
	}

	#consulta para obtener la cantidad de jobs
	$query = "select COUNT(*) as cantidad from comuna";
	$resultadoAAA = mysqli_query($conexion, $query);

	$panel4 = 0;
	$responseData['query4'] = $query;
	if (!$resultadoAA){
		$panel4 = -1;
	}else{

		while($data = mysqli_fetch_assoc($resultadoAAA)){

			$panel4 = $data['cantidad'];

		}
	}

	
	$responseData['panel1'] = $panel1;
	$responseData['panel2'] = $panel2;
	$responseData['panel3'] = $panel3;
	$responseData['panel4'] = $panel4;

	echo json_encode($responseData);

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
