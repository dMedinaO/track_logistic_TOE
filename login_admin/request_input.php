<?php 
		
	$name = $_REQUEST['name'];
	$password = $_REQUEST['password'];

	$information = [];

	if ($name == "paulo" && $password=="polo13"){
		$information["response"]="OK";
		$information["id_response"] = 1;#paulo es el 1
	}else{
		if ($name == "Matias" && $password=="adidasf50"){
			$information["response"]="OK";
			$information["id_response"] = 1;#paulo es el 1
		}else{
			$information["response"] = "ERROR";	
		}
	}

	echo json_encode($information);
?>