<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$chofer = $_REQUEST['id_chofer'];
	$query = "select * from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join chofer on (chofer.idchofer = reparto_chofer.chofer) join comuna on (comuna.idcomuna = reparto.comuna)  where chofer.idchofer = $chofer AND reparto_chofer.status_reparto = 'PENDIENTE'";
	$resultado = mysqli_query($conexion, $query);
	$count="ERROR";
	if (!$resultado){
		die("Error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$count="OK";
			break;
		}

		$response['response'] = $count;
		echo json_encode($response);

	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
