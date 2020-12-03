<?php

	include("../connection.php");#incluimos la base de datos

	#hacemos la obtencion de los datos
	$comuna = $_REQUEST['comuna'];
	$pedidos = $_REQUEST['pedidos'];
	$data_chofer = $_REQUEST['data_chofer'];
	
	$id = time();

	$query = "insert into reparto values($id, $pedidos, 0, 0, NOW(), $comuna)";
	$resultado = mysqli_query($conexion, $query);

	$query = "insert into reparto_chofer values($data_chofer, $id, 'PENDIENTE')";
	$resultado = mysqli_query($conexion, $query);
		
	$informacion = verificar_resultado( $resultado, $conexion, $query);
	
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
