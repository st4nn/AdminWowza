<?php 
   include("conectar.php"); 

  $User = $_GET['User'];
 
 
 	$link=Conectarse(); 
	$sql = "
		INSERT INTO Prueba 
				(Fecha, Time, Usuario)
			VALUES
				(
			'".  date("Y-m-d") ."',   
			'" . date("H:i:s") . "',
			'$User'
				);";
				
	$result = mysql_query($sql, $link); 			
	mysql_close($link); 
?> 