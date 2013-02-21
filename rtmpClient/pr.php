<?php
	require "RtmpClient.class.php";

	//Create RtmpClient Object
	$client = new RtmpClient();
	//Connect to server

   $NombreAplicacion = $_POST['NombreAplicacion'];
   $NombreStream = $_POST['NombreStream'];
   $PuntosMontaje = $_POST['PuntosMontaje'];
   $Usuario = $_POST['Usuario'];
   $Clave = $_POST['Clave'];
   $Limite = $_POST['Limite'];

	$client->connect("192.168.1.160","live?
			NombreAplicacion=$NombreAplicacion
			&&
			NombreStream=$NombreStream
			&&
			PuntosMontaje=$PuntosMontaje
			&&
			Usuario=$Usuario
			&&
			Clave=$Clave
			&&
			Limite=$Limite
			");

	/*
	 your remote procedure calls
	*/
	//Closing connection
	$client->close();
	echo(")");X
?>

