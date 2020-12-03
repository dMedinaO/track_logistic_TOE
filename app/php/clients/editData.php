<?php

	include("../connection.php");#incluimos la base de datos

	$name = $_REQUEST['name'];
	$nombre_contacto = $_REQUEST['nombre_contacto'];	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];	
	$email = $_REQUEST['email'];
	$telefono = $_REQUEST['telefono'];
	$idclient = $_REQUEST['idclient'];
	$status_client = $_REQUEST['status_client'];
	

	$query = "update client set nombre_client='$name', nombre_contacto='$nombre_contacto', username_client='$username', password_client='$password', email_client='$email', phone_number_client='$telefono', modified_client= NOW(), status='$status_client' where idclient=$idclient";
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
