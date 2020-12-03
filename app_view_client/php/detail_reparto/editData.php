<?php

	include("../connection.php");#incluimos la base de datos

	$paquetes_inicial = $_REQUEST['paquetes_inicial'];
	$paquetes_entregados = $_REQUEST['paquetes_entregados'];	
	$idreparto = $_REQUEST['idreparto'];
	$status_reparto = $_REQUEST['status_reparto'];	
	$date = $_REQUEST['date'];
	$comuna = $_REQUEST['comuna'];
	
	$pendientes = $paquetes_inicial - $paquetes_entregados;

	$query1 = "update reparto set paquetes_inicial = $paquetes_inicial, paquetes_pendiente=$pendientes, paquetes_entregados =$paquetes_entregados, fecha_reparto = '$date', comuna=$comuna where idreparto = $idreparto";
	$informacion["query1"] = $query1;
	
	$query2 = "update reparto_chofer set status_reparto = '$status_reparto' where reparto=$idreparto";
	$informacion["query2"] = $query2;

	$resultado = mysqli_query($conexion, $query1);
	$resultado = mysqli_query($conexion, $query2);
	
	$informacion["response"] = verificar_resultado( $resultado, $informacion);
	echo json_encode($informacion);
	cerrar( $conexion );

	function verificar_resultado($resultado){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else $informacion["respuesta"] ="BIEN";
		return $informacion;
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>
