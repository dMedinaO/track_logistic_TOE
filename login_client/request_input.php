<?php 
	
	include("connection.php");#incluimos la base de datos
	
	$name = $_REQUEST['name'];
	$password = $_REQUEST['password'];

	#query para evaluar si existe un elemento con dichas caracteristicas
	$query = "select client.idclient from client where client.username_client='$name' AND client.password_client='$password' AND client.status='ACTIVO'";
	$resultado = mysqli_query($conexion, $query);
	
	$information = [];

	if (!$resultado){
		$information["response"] = "ERROR";		
	}else{
		
		#obtengo el valor del ID
		$id_client = "-1";
		while($data = mysqli_fetch_assoc($resultado)){
			
			$id_client = $data['idclient'];
			break;
		}

		if ($id_client == "-1"){
			$information["response"]="ERROR";
		}else{
			$information["response"]="OK";
			$information["id_response"] = $id_client;
		}
	}

	echo json_encode($information);
?>