<?php

	include("../connection.php");#incluimos la base de datos

	#hacemos la obtencion de los datos
	$comuna = $_REQUEST['comuna'];
	$pedidos_rec = $_REQUEST['pedidos_rec'];
	$pedidos_ent = $_REQUEST['pedidos_ent'];
	$data_chofer = $_REQUEST['data_chofer'];
	$fecha = $_REQUEST['fecha'];
	$status_reparto = $_REQUEST['status_reparto'];
	
	$id = time();
	$pendientes = $pedidos_rec-$pedidos_ent;

	$query1 = "insert into reparto values($id, $pedidos_rec, $pendientes, $pedidos_ent, STR_TO_DATE('$fecha', '%Y-%m-%d'), $comuna)";
	$resultado = mysqli_query($conexion, $query1);

	$query2 = "insert into reparto_chofer values($data_chofer, $id, '$status_reparto')";
	$resultado = mysqli_query($conexion, $query2);
	
	$informacion = verificar_resultado( $resultado, $conexion, $query2);
	$informacion["query1"] = $query1;
	$informacion["query2"] = $query2;

	echo json_encode($informacion);

	cerrar( $conexion );

	function verificar_resultado($resultado, $conexion, $query){

		if (!$resultado){
			$informacion["respuesta"] = "ERROR";
		}else{
			$informacion["respuesta"] ="BIEN";
		}
		return $informacion;
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>
