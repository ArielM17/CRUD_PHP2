<?php

	include('include/config.inc');

	$Cx = mysqli_connect($servidor, $usuario, $contraseña, $basededatos);
	mysqli_set_charset($Cx,"utf8");

	$ID = $_POST["ID"];
	$N = $_POST["N"];
    $DUI = $_POST["DUI"];
	$NumP = $_POST["NumP"];
	$ME = $_POST["ME"];
	$MaE = $_POST["MaE"];
	$Pre = $_POST["Pre"];
	
	$query = "call UptP ('$ID','$N','$DUI','$NumP','$ME','$MaE','$Pre');";

	echo $query;
	$Con = $Cx->query($query);

	if ($Con){
		
		echo "Registro Actualizado.";
		header("Location: Mos.php");

	} else{

		echo "ERROR : No se pudo editar.";

	}

?>