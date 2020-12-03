<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$client = $_REQUEST['client'];

	$query = "select distinct(DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d')) as fecha from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) join
chofer on (chofer.idchofer = reparto_chofer.chofer) where chofer.client=$client  order by DATE_FORMAT(reparto.fecha_reparto, '%Y-%m-%d') DESC";
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
