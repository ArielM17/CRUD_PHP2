<?php  

	include('include/config.inc');
	$Cx = mysqli_connect($servidor, $usuario,$contraseña, $basededatos);
	mysqli_set_charset($Cx,"utf8");

	$N = $_POST["N"];
	$DUI = $_POST["DUI"];
	$NumP = $_POST["NumP"];
	$ME = $_POST["ME"];
	$MaE = $_POST["MaE"];
	$Pre = $_POST["Pre"];

	$Con = "call InsP ('$N','$DUI','$NumP','$ME','$MaE','$Pre');";

	echo($Con);
	$Res = mysqli_query($Cx, $Con) or die ("No se pudo insertar el registro.");

	if ($Res) {
				
		echo ("El registro fue insertado de forma satisfactoria");
		header("Location:Mos.php");

	}else {
				
		echo ("Surgio problema para insertar el registro.<br>");
		echo ("El problema es: .<br>");
		echo ("Codigo de error: .<b>".mysql_errno ()."</b><br>");
		echo ("Descripcion de error: <b>".mysql_error ()."</b><br>");
			
	}			

	mysqli_close($Cx);

?>
