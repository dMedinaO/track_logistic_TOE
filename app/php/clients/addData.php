<?php

	include("../connection.php");#incluimos la base de datos

	#hacemos la obtencion de los datos
	$name = $_REQUEST['name'];
	$nombre_contacto = $_REQUEST['nombre_contacto'];	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];	
	$email = $_REQUEST['email'];
	$telefono = $_REQUEST['telefono'];	
	
	$id = time();

	$query = "insert into client values($id, '$name', '$nombre_contacto', '$username', '$password', '$email', '$telefono', NOW(), NOW(), 'ACTIVO')";

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
