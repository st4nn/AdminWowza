<?php 
   include("conectar.php");

   $NombreAplicacion = $_POST['NombreAplicacion'];
   $NombreStream = $_POST['NombreStream'];
   $PuntosMontaje = $_POST['PuntosMontaje'];
   $Usuario = $_POST['Usuario'];
   $Clave = $_POST['Clave'];
   $Limite = $_POST['Limite'];

      $link=Conectarse(); 

   $sql = "
      INSERT INTO tmpCrearAplicacion
            (
               NombreAplicacion, 
               NombreStream, 
               NoPuntosMontaje,
               Usuario,
               Clave,
               LimiteConcurrencias,
               Estado
            )
         VALUES
            (
               '$NombreAplicacion',   
               '$NombreStream',
               '$PuntosMontaje',
               '$Usuario',
               '$Clave',
               '$Limite',
               'Pendiente'
            );";
            
   $result = mysql_query($sql, $link);
   echo mysql_insert_id();
?>
