<?php

	include ("../connection.php");

	#obtenemos el id del formulario

	$informacion = [];

	#hacemos la consulta
	$idclient = $_REQUEST['idclient'];


	$query = "delete from client where idclient = $idclient";
	$query2 = "delete from chofer where chofer.client=$idclient";
	$resultado = mysqli_query($conexion, $query);
	$resultado = mysqli_query($conexion, $query2);

	verificar_resultado( $resultado );
	cerrar( $conexion );

	function verificar_resultado($resultado){

		if (!$resultado) $informacion["respuesta"] = "ERROR";
		else $informacion["respuesta"] ="BIEN";
		echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}

?>
