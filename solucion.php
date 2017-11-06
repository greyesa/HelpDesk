<?php
/*
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
*/

//Modulo de formulario de orden
if($modulo=="ingresar"){
echo'<a href="registros.php?modulo=elegir"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="registros.php?modulo=insertar">';

echo '<TABLE border="0" width="95%">';

echo '<TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento where id_depart='$id_depart'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<TD><B>Departamento:</B></TD>';
	echo '<TD><INPUT TYPE="hidden" NAME="nombre_depart" value="'.$row["id_depart"].'"><INPUT TYPE="hidden" NAME="nombre" value="'.$row["nombre_depart"].'"><B>'.$row["nombre_depart"].'</B></TD>';
}
mysql_free_result($result2);


echo '</TR>';
echo '<TR>';

	echo '<TD><B>ID:</B></TD>';
	echo '<TD><SELECT NAME="id_registro"> ';
	echo '<option selected NAME="id_registro" value="------------">---------------Selecciona-------------------</option>';

$link3= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link3); 
$result3=mysql_query("select * from id where id_registro='$id_registro'", $link3);
while ($row=mysql_fetch_array($result3))
{
	echo '<option NAME="id_registro" value="'.$row["id_registro"].'">'.$row["id_registro"].'</option>';

}
mysql_free_result($result3);


	echo "</SELECT> <a href=javascript:contacto('contacto.php?modulo=ingresar&id_depart=$id_depart') title='Nuevo Contacto'>Nuevo</a></TD>";

echo '</TR>';


echo '<TR>';

	echo '<TD><B>Categoria:</B></TD>';
	echo '<TD><SELECT NAME="categoria"> ';
	echo '<option selected NAME="categoria" value="------------">---------------Selecciona-------------------</option>';

$link3= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link3); 
$result3=mysql_query("select * from categoria_hard", $link3);
while ($row=mysql_fetch_array($result3))
{
	echo '<option NAME="categoria" value="'.$row["id_cat"].'">'.$row["nom_cat"].'</option>';

}
mysql_free_result($result3);


	echo "</SELECT></TD>";

echo '</TR>';


echo '<TR>';
	echo '<TD valign="top"><B>Estado</B></TD>';
	echo '<TD><SELECT NAME="status_orden"><option selected NAME="status_orden" value="Proceso">Proceso</option><option NAME="status_orden" value="Terminado">Terminado</option></select></TD>';
echo '</TR>';


echo '<TR>';
	echo '<TD valign="top"><B>Descripci&oacute;n del Problema:</B></TD>';
	echo '<TD><TEXTAREA NAME="problema_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';

echo '<TR>';
	echo '<TD valign="top"><B>Posible soluci&oacute;n del Problema:</B></TD>';
	echo '<TD><TEXTAREA NAME="solucion_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';


echo '<TR>';
	echo '<TD><B>Personal Asignado:</B></TD>';
	echo '<TD><SELECT NAME="asig_orden">';

echo'<option selected NAME="asig_orden" value="-----------------">---------------Selecciona-------------------</option>';


$link4= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link4); 
$result4=mysql_query("select * from personal", $link4);
while ($row=mysql_fetch_array($result4))
{
echo'<option NAME="asig_orden" value="'.$row["id_personal"].'">'.$row["nombre_personal"].'</option>';

}
mysql_free_result($result4);

echo '</SELECT></TD></TR>';
echo '<tr><td><B>Prioridad:</B> </td><td>';
echo '<SELECT NAME="prioridad"><option selected value="Alta" name="prioridad">Alta</option><option value="Media" name="prioridad">Media</option><option value="Baja" name="prioridad">Baja</option></SELECT>';

echo '</td></tr>';

echo '<TR>';
	echo '<TD valign="top"><B>Observaciones:</B></TD>';
	echo '<TD><TEXTAREA NAME="numero_pc_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';


echo '</TABLE>';

echo '<br><br><input type="button" value="Ingresar" name="insertar" onClick="return Validar1(this.form)">';
echo '<input type="reset" value="Borrar">';
echo '</FORM>';
}
?>
