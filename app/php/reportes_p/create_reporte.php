<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	#get params
	$chofer = $_REQUEST['chofer'];
	$status_reparto = $_REQUEST['status_reparto'];
	$fecha_end = $_REQUEST['fecha_end'];
	$fecha_init = $_REQUEST['fecha_init'];
	
	#make query based on params
	$query_basic = "select *, DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') as fecha_trunc_reparto from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join chofer on (chofer.idchofer = reparto_chofer.chofer) join comuna on (comuna.idcomuna = reparto.comuna)";

	$add_status = "";
	$add_chofer = "";

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

	$add_periode = " reparto.fecha_reparto>='$fecha_init' AND reparto.fecha_reparto<='$fecha_end'";
	
	#add aditional elements to query basic	
	if ($status_reparto !=3 and $chofer != -1){#todos los filtros
		$query_basic = $query_basic." where ".$add_status. " and ".$add_periode." and ".$add_chofer. " order by chofer.nombre_chofer DESC";
	}

	if ($status_reparto ==3 and $chofer == -1){#no filtros todos estados todos reparto
		$query_basic = $query_basic." where ".$add_periode. " order by chofer.nombre_chofer DESC";
	}

	if ($status_reparto !=3 and $chofer == -1){#filtro por estado de reparto y todos los choferes
		$query_basic = $query_basic." where ".$add_status." and ".$add_periode. " order by chofer.nombre_chofer DESC";
	}

	if ($status_reparto ==3 and $chofer != -1){#todos los estados y un chofer
		$query_basic = $query_basic." where ".$add_chofer." and ".$add_periode. " order by chofer.nombre_chofer DESC";
	}

	if ($status_reparto !=3 and $chofer != -1){#chofer y status
		$query_basic = $query_basic." where ".$add_chofer." and ".$add_status." and ".$add_periode. " order by chofer.nombre_chofer DESC";
	}

	if ($status_reparto !=3 and $chofer == -1){#periode y status
		$query_basic = $query_basic." where ".$add_periode." and ".$add_status. " order by chofer.nombre_chofer DESC";
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