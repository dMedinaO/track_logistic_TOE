<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	#get params
	$chofer = $_REQUEST['chofer'];
	$status_reparto = $_REQUEST['status_reparto'];
	$periodo_interes = $_REQUEST['periodo_interes'];


	#make query based on params
	$query_basic = "select *, DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') as fecha_trunc_reparto from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join chofer on (chofer.idchofer = reparto_chofer.chofer) join comuna on (comuna.idcomuna = reparto.comuna)";

	$add_status = "";
	$add_chofer = "";
	$add_periode = "";

	#ask by status
	if($status_reparto == 1){#pendiente

		$add_status = " reparto_chofer.status_reparto = 'PENDIENTE'";
	}elseif ($status_reparto == 2) {#finalizado
		$add_status = " reparto_chofer.status_reparto = 'FINALIZADO'";
	}

	#ask by chofer
	if ($chofer != -1){
		$add_chofer = " chofer.idchofer = $chofer";
	}

	#ask by periode
	if ($periodo_interes == 1){
		$add_periode = " WEEK(reparto.fecha_reparto) = WEEK(NOW())";
	}elseif ($periodo_interes == 2) {
		$add_periode = " DATE_FORMAT(reparto.fecha_reparto, '%m') = DATE_FORMAT(NOW(), '%m')";
	}

	#add aditional elements to query basic	
	if ($status_reparto !=3 and $periodo_interes != 3 and $chofer != -1){#todos los filtros
		$query_basic = $query_basic." where ".$add_status. " and ".$add_periode." and ".$add_chofer;
	}

	if ($status_reparto ==3 and $periodo_interes != 3 and $chofer == -1){#solo periodo
		$query_basic = $query_basic." where ".$add_periode;
	}

	if ($status_reparto !=3 and $periodo_interes == 3 and $chofer == -1){#solo status
		$query_basic = $query_basic." where ".$add_status;
	}

	if ($status_reparto ==3 and $periodo_interes == 3 and $chofer != -1){#solo chofer
		$query_basic = $query_basic." where ".$add_chofer;
	}

	if ($status_reparto ==3 and $periodo_interes != 3 and $chofer != -1){#chofer y periodo
		$query_basic = $query_basic." where ".$add_chofer." and ".$add_periode;
	}

	if ($status_reparto !=3 and $periodo_interes == 3 and $chofer != -1){#chofer y status
		$query_basic = $query_basic." where ".$add_chofer." and ".$add_status;
	}

	if ($status_reparto !=3 and $periodo_interes != 3 and $chofer == -1){#periode y status
		$query_basic = $query_basic." where ".$add_periode." and ".$add_status;
	}
	
	$response['query'] = $query_basic;	
	$resultado = mysqli_query($conexion, $query_basic);
	$response = [];
	$response['query'] = $query_basic;	
	
	if (!$resultado){
		$response['result'] = "ERROR";
	}else{
		$response['result'] = "OK";
		while($data = mysqli_fetch_assoc($resultado)){

			$response["data"][] = $data;
		}

		echo json_encode($response);
		mysqli_free_result($resultado);
	}
	mysqli_close($conexion);
?>