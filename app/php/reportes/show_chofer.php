<?php

	#script para hacer la carga de informacion desde la base de datos a la tabla
	include ("../connection.php");

	$query = "select * from chofer";
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
