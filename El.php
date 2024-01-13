<?php  
	
	include('include/config.inc');
	$Cx = mysqli_connect($servidor, $usuario,$contraseña, $basededatos);
	mysqli_set_charset($Cx,"utf8");

	$ID = $_REQUEST['ID'];

	$Con = "call DelP ('$ID');";
			echo ($Con);

	$Res = mysqli_query($Cx ,$Con) or die ("No se puede eliminar el registro.");
			if ($Res) {
				
				echo "El registro fue elimininado de forma satisfactoria. <br>";
				header("Location: Mos.php");

			} else {

				echo ("Surgio un problema al momento de eliminar el registro. <br>");
				echo ("El problema es: . <br>");
				echo ("Codigo del error. <br>". mysql_errno()."<br><br>");
				echo ("Descripcion del error. <br>".mysql_error()."<br><br>");

			}	

			mysqli_close($conexion);

?>