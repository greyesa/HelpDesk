<?php
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
login.php                       Dom/25/jul/2004
***********************************************/


include 'config.inc.php';
global $nombre_adm;
global $contrasena_adm;
$connection = mysql_connect("$nhost", "$nuser", "$npass")
  	or die ("No se puede tener contacto con el servidor.");
		
$db = mysql_select_db("$nbase", $connection)
	or die ("No tenemos contacto con la base de datos.");

$sql = "SELECT ID_adm FROM administrador WHERE nombre='$nombre_adm' and contrasena=MD5('$contrasena_adm')";

$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);

$sql2 = "SELECT * FROM administrador WHERE nombre='$nombre_adm' and contrasena=MD5('$contrasena_adm')";
$result2 = mysql_query($sql2);
$num2 = mysql_numrows($result2);
while ($row=mysql_fetch_array($result2))
{
$num2 = $row["nivel"];
$id_admin=$row["ID_adm"];
$nombre_adm=$row["nombre"];
}
mysql_free_result($result2);

if ($num == 1) {
$num2=$num2;
$id_admin=$id_admin;
$nombre_adm=$nombre_adm;

}
elseif  ($num == 0) {
include "formulario.php";
session_unset();
session_destroy();
exit;
}

?>
