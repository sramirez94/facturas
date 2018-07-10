<?php

session_start();
include_once "conexion.php";

			$user 		= $_SESSION['rfc'];
			$password 	= $_SESSION['pass'];
			$query 		= "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$password."'";
			$sql 		= mysql_query($query,$con);

if($row = mysql_fetch_array($sql)){
	if($row['pass'] == 0){
		if($_SERVER["REQUEST_METHOD"] == "POST") {

			$password 	= $_POST["pass"];
			$rfc 		= $_POST["rfc"];
			$update 	= "UPDATE usuarios SET contrasena = '".$password."', pass = 1 WHERE usuario = '".$rfc."'";
			$res 		= mysql_query($update) or die (mysql_error());

						echo "<script languaje = 'JavaScript'>
        				alert ('Cambio de contraseña correctamente');
        				</script>";

			        	header('Location: logout.php');

			}
		
	} elseif ($row['pass'] == 1){

			header('Location: mostrar.php');
	
	}else {

		echo 'usuario o contraseña incorrectos';
}
}
?>
        
<html>
	<head>

		<link rel="icon" href="lapicero.ico"> 
		<title>Cambio de contraseña para mayor seguridad</title>
		<link rel="stylesheet" href="estilos.css">
		<meta charset="utf-8">

	</head>
	<body>
		
	<br>
        <h1 align = "center"> Cambie su contraseña para mayor seguridad</h1>

            <form class="cambio" method = "POST" action="cambiarpass.php">
           	<div><label>RFC:</label><input type='text' name="rfc"></div>
            <div><label>Nueva Contraseña:</label><input type='password' name="pass"></div>
            <div><center><input type='submit' value='Cambiar contraseña'></div></center>
			<div><a href="logout.php">No quiero cambiar la contraseña. Cerrar sesión</div>
        </form>
	</body>
</html>
