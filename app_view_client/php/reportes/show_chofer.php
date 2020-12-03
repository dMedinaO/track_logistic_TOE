<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$client = $_REQUEST['client'];

	$query = "select * from chofer where chofer.client=$client";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado){
		die("Error");
	}else{

		$value=-1;
		$name= "TODOS";		
		while($data = mysqli_fetch_assoc($resultado)){

			echo '<option value="'.$data["idchofer"].'">'.$data["nombre_chofer"].'</option>';
		}		
		echo '<option value="'.$value.'">'.$name.'</option>';
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
