<?php

	include("../connection.php");#incluimos la base de datos

	$name = $_REQUEST['name'];
	$idcomuna = $_REQUEST['idcomuna'];	
	

	$query = "update comuna set nombre_comuna = '$name', edited_comuna=NOW() where idcomuna=$idcomuna";
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
