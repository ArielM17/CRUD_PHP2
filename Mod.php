<!DOCTYPE html>
<html>

	<head>
	
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Estilo.css">

		<title> Modificar </title>

	</head>

	<body>

		<?php  

			$ID = $_REQUEST['ID'];

			include('include/config.inc');

			$Cx = mysqli_connect($servidor, $usuario, $contraseña, $basededatos);
			mysqli_set_charset($Cx ,"utf8");

			$query = "call SelxID ('$ID');";
			$Con = $Cx->query($query);

			$row = $Con->fetch_assoc();

			mysqli_close($Cx);

		?>

		<form method="post" action="GMod.php" class="For">

			<h2 class="For_T"> Informacion Seleccionada </h2>
			
			<label class="For_L"> ID </label>
			<input type="text" name="ID" class="For_I" value="<?php echo $row['ID'];?>">
			<label class="For_L"> Nombre </label>
			<input type="text" name="N" class="For_I" value="<?php echo $row['N'];?>">
			<label class="For_L"> DUI </label>
			<input type="text" name="DUI" class="For_I" value="<?php echo $row['DUI'];?>">
			<label class="For_L"> Numero de Personas en la casa </label>
			<input type="number" name="NumP" class="For_I" value="<?php echo $row['NumP'];?>">
			<label class="For_L"> Menores de Edad </label>
			<input type="number" name="ME" class="For_I" value="<?php echo $row['ME'];?>">
			<label class="For_L"> Mayores de Edad </label>
			<input type="number" name="MaE" class="For_I" value="<?php echo $row['MaE'];?>">
			<label class="For_L"> Ingresos </label>
			<input type="text" name="Pre" class="For_I" value="<?php echo $row['Pre'];?>">

			<input type="submit" class="For_E" value="Modificar">

		</form>

	</body>

</html>