<?php

	include("../connection.php");#incluimos la base de datos

	#hacemos la obtencion de los datos
	$name = $_REQUEST['name'];
	$rut = $_REQUEST['rut'];	
	$telefono = $_REQUEST['telefono'];	
	$date = $_REQUEST['date'];
	$observaciones = $_REQUEST['observaciones'];
	$idclient = $_REQUEST['idclient'];
	
	$id = time();

	$query = "insert into chofer values ($id, '$name', '$rut', STR_TO_DATE('$date', '%Y-%m-%d'), NOW(), '$telefono', 0, 0, '$observaciones', $idclient)";

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
		$informacion["query"] = $query;
		return $informacion;
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
?>
