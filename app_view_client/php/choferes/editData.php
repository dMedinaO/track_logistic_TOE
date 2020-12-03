<?php

	include("../connection.php");#incluimos la base de datos

	$name = $_REQUEST['name'];
	$rut = $_REQUEST['rut'];
	$idchofer = $_REQUEST['idchofer'];
	$telefono = $_REQUEST['telefono'];	
	$date = $_REQUEST['date'];
	$observaciones = $_REQUEST['observaciones'];
	

	$query = "update chofer set nombre_chofer='$name', rut_chofer='$rut', chofer.telefono='$telefono', chofer.created_chofer=  STR_TO_DATE('$date', '%Y-%m-%d'), edited_chofer=NOW(), observaciones='$observaciones' where idchofer =$idchofer";
	$informacion["query1"] = $query;
	
	$resultado = mysqli_query($conexion, $query);
	
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
