<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$query = "select distinct(DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d')) as fecha from reparto order by DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') DESC;";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{
		
		while($data = mysqli_fetch_assoc($resultado)){

			echo '<option value="'.$data["fecha"].'">'.$data["fecha"].'</option>';
		}				
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
