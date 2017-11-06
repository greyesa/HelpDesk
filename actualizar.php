<?php
/*
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012 
*/

include "$conexion.php";

if (!isset($accion)){
  $result=mysql_query("SELECT * FROM registros WHERE id_registros=$id",
    $conexion);
  $row=mysql_fetch_row($result);
  echo"<html>
  <head><title>Actualizar datos de la base</title></head>
  <body>
  <form action="actualizar.php?accion=guardar" method="POST">
  Status:<br>
  <input type="text" value="$row[1]" name="status_orden"><br>
  Solucion:<br>
  <input type="text" value="$row[2]" name="obser_cierre"><br>
  <input type="hidden" name="id" value="$row[0]">
  <input type="submit" value="Guardar">
  </form>
  </body>
  </html>";
}elseif($accion==guardar){
  $result=mysql_query("UPDATE registros SET obser_cierre=$nombre,
    WHERE id_registros = $id",$conexion);
  echo"
  <html>
  <body>
  <h3>Los registros han sido actualizados</h3>
  </body>
  </html>";
}
include "cerrar_conexion.php";
?>
