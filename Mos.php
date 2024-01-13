<!DOCTYPE html>
<html>

	<head>

		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Estilo.css">

		<title> Mostrar </title>

	</head>

	<body>

		<h1 class="T"> Mostrar </h1>

		<?php  

			include('include/config.inc');

			$Cx = mysqli_connect($servidor, $usuario, $contraseña, $basededatos);
			mysqli_set_charset($Cx,"utf8");

			$Con = "CALL SelP();";

			$Res = mysqli_query($Cx, $Con) or die ("No se pueden mostrar los registros.");

			echo "<table>";
			echo "<tr>";
			echo "<th> ID </th> 
				<th> Nombre </th> 
				<th> DUI </th> 
				<th> Numero de Personas en la Casa </th> 
				<th> Personas menores de Edad </th> 
				<th> Personas mayores de Edad </th> 
				<th> Ingresos </th> 
				<th></th>
				<th></th>";
			echo "</tr>";

			while ($row = mysqli_fetch_array($Res)) {
				
				echo "<tr>";
				echo "<td>",$row['ID'],"</td>";
				echo "<td>",$row['N'],"</td>";
				echo "<td>",$row['DUI'],"</td>";
				echo "<td>",$row['NumP'],"</td>";
				echo "<td>",$row['ME'],"</td>";
				echo "<td>",$row['MaE'],"</td>";
				echo "<td>",$row['Pre'],"</td>";
				echo "<td>"."<a href='El.php?ID=".$row['ID']."' class='I'>Eliminar</a>"."</td>";
				echo "<td>"."<a href='Mod.php?ID=".$row['ID']."' class='I'>Modificar</a>"."</td>";				
				echo "</tr>";

			}

			echo "</table>";

			mysqli_close($Cx);

		?>

		<hr>

		<center> <a href="index.html" class="L"> Regresar al Menu </a> </center>

		<hr>

		<center> <a href="Ins.html" class="L"> Insertar Persona Beneficiada </a> </center>

	</body>

</html>