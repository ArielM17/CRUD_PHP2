<!DOCTYPE html>
<html>

	<head>

		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Estilo.css">

		<title> Base de Datos </title>

	</head>

	<body>

		<h1> Base de Datos </h1>

		<?php  

			$usuario = "root";
			$contraseña = "";
			$servidor = "localhost";
			$basededatos = "test";

			$Cx = mysqli_connect($servidor, $usuario, $contraseña) or die ("Error al conectar con el servidor.");

			$db = mysqli_select_db($Cx, $basededatos) or die ("No se pudo conectar con la Base de Datos.");

			$Con = "CREATE DATABASE BD_P;";
			$EC = mysqli_query($Cx, $Con) or die ("Error al crear la Base de Datos.");

			if ($EC) {
				
				echo ("La Base de Datos se creo de forma satisfactoria. <br>");

			}else{

				echo ("Surgio un problema para crear la base de datos. <br>");
				echo ("El problema es: <br>");
				echo ("Codigo de error : <b>" . mysql_errno() . "</b> <br>");

			}

			$basededatos = "BD_P";

			$db = mysqli_select_db($Cx, $basededatos) or die ("Ah habido un erro al conectar con la Base de Datos.");

			$Con = "CREATE TABLE IF NOT EXISTS TBP (ID int PRIMARY KEY AUTO_INCREMENT, N varchar(20), DUI varchar(50), NumP int, ME int, MaE int, Pre varchar(10))";

			$EC = mysqli_query($Cx, $Con) or die ("Error al crear la tabla.");

			if ($EC) {
				
				echo ("La tabla fue creada. <br>");

			} else {

				echo("Surgio un problema al crear la tabla. <br>");
				echo("El problema es : <br>");
				echo("Codigo del error : <b>" . mysql_errno() . "</b> <br>");
				echo("Descripcion de error : <b>" . mysql_error() . "</b> <br>");

			}

			$Con = "CREATE PROCEDURE InsP
			(

				IN `par_N` VARCHAR(50),
				IN `par_DUI` VARCHAR(50),
				IN `par_NumP` int,
				IN `par_ME` int,
				IN `par_MaE` int,
				IN `par_Pre` VARCHAR(10)

			)

			INSERT INTO TBP (N,DUI,NumP,ME,MaE,Pre) values (par_N, par_DUI, par_NumP, par_ME, par_MaE, par_Pre);

			";	

			$EC = mysqli_query($Cx, $Con) or die ("Hubo un error al crear el procedimiento de insertar alumno.");

			if ($EC) {
			
				echo("El procedimiento fue creado de forma correcta. <br>");

			} else {

				echo("Surgio uun problema al crear el procedimiento. <br>");
				echo("El problema es : <br>");
				echo("Codigo de error : <b> " . mysql_errno() . "</b> <br>");
				echo("Descripcion : <b> " . mysql_error() . "</b><br>");

			}

			$Con = "CREATE PROCEDURE UptP 
			(

				IN par_ID int,
				IN par_N VARCHAR(50),
				IN par_DUI VARCHAR(50),
				IN par_NumP int,
				IN par_ME int,
				IN par_MaE int,
				IN par_Pre VARCHAR(10)

			)

				UPDATE TBP set N = par_N, DUI = par_DUI, NumP = par_NumP, ME = par_ME, MaE = par_MaE, Pre = par_Pre where ID = par_ID;

			";

			$EC = mysqli_query($Cx, $Con) or die ("Hubo un error al crear el procedimiento de modificar.");

			if ($EC) {
			
				echo("El procedimiento fue creado de forma correcta. <br>");

			} else {

				echo("Surgio uun problema al crear el procedimiento. <br>");
				echo("El problema es : <br>");
				echo("Codigo de error : <b> " . mysql_errno() . "</b> <br>");
				echo("Descripcion : <b> " . mysql_error() . "</b><br>");

			}

			$Con = "CREATE PROCEDURE DelP
			(

				IN par_ID int
				
			) 

			DELETE FROM TBP where ID = par_ID;

			";

			$EC = mysqli_query($Cx, $Con) or die ("Hubo un error al crear el procedimiento de eliminar alumno.");

			if ($EC) {
				
				echo("El procedimiento fue creado de forma correcta. <br>");

			} else {

				echo("Surgio uun problema al crear el procedimiento. <br>");
				echo("El problema es : <br>");
				echo("Codigo de error : <b> " . mysql_errno() . "</b> <br>");
				echo("Descripcion : <b> " . mysql_error() . "</b><br>");

			}

			$Con = "CREATE PROCEDURE SelP
			(

			)

			SELECT * FROM TBP;

			";

			$EC = mysqli_query($Cx, $Con) or die ("Hubo un error al crear el procedimiento de seleccionar alumno.");

			if ($EC) {
				
				echo("El procedimiento fue creado de forma correcta. <br>");

			} else {

				echo("Surgio uun problema al crear el procedimiento. <br>");
				echo("El problema es : <br>");
				echo("Codigo de error : <b> " . mysql_errno() . "</b> <br>");
				echo("Descripcion : <b> " . mysql_error() . "</b><br>");

			}

			$Con = "CREATE PROCEDURE SelxID
			(

				IN par_ID int

			)
			
			SELECT * FROM TBP where ID = par_ID;

			";

			$EC = mysqli_query($Cx, $Con) or die ("Hubo un error al crear el procedimiento de guardar cambios alumno.");

			if ($EC) {
				
				echo("El procedimiento fue creado de forma correcta. <br>");

			} else {

				echo("Surgio uun problema al crear el procedimiento. <br>");
				echo("El problema es : <br>");
				echo("Codigo de error : <b> " . mysql_errno() . "</b> <br>");
				echo("Descripcion : <b> " . mysql_error() . "</b><br>");

			}

		?>

		<hr>

		<center> <a href="index.html" class="L"> Regresar al Menu </a> </center>

	</body>

</html>