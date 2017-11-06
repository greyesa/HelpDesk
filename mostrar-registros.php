<?php
/*
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
*/

/** conexion ***************************/
// conectamos a la base de datos
$link = mysql_connect(’localhost’, ‘root’, ”);
if(!$link) {
die(”Error al intentar conectar: “.mysql_error());
}

// seleccionamos la base de datos
$db_link = mysql_select_db(’helpdesk’, $link);
if(!$db_link) {
die(”Error al intentar seleccionar la base de datos”. mysql_error());
}
/** fin conexion ************************/

// hacemos una consulta
// para mostrar los registros
$sql = mysql_query(”SELECT * FROM registros”, $link) or die(mysql_error());

// mostramos los registros
while($row = mysql_fetch_array($sql)){
echo $row['Id_registro'].” - “.$row['status_orden'].” - <a href=’eliminar.php?id=$row[Id_registro]‘>Eliminar</a> | <a href=’actualizar.php?id=$row[Id_registro]‘>Actualizar</a>\n”;

}
?>

