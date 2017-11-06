<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
registross.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Registros</h2>';
if($num2 == "1" || $num2 == "2"){

//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	echo '<li><a href="registross.php?modulo=elegir">Ingresar Nueva Orden con fecha manualmente.</a></li>';
echo '</ul>';
}

//Modulo elegir departamento.
if($modulo=="elegir"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo 'Por favor elige al departamento en el cual se realizar&aacute; la orden. Si en tal caso el departamento no existe ingresalo';
echo" <a href=javascript:depa('departamento.php?modulo=ingresar') title='Nuevo Departamento'>Pulsando aqui</a><br><br>";

echo '<b>Departamento:</b><br>';
while ($row=mysql_fetch_array($result2))
{
echo '<a href="registross.php?modulo=ingresar&id_depart='.$row["id_depart"].'">'.$row["nombre_depart"].'</a><br>';
}
mysql_free_result($result2);

}



//Modulo de formulario de orden
if($modulo=="ingresar"){
echo'<a href="registross.php?modulo=elegir"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="registross.php?modulo=insertar">';

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

	echo '<TD><B>Contacto:</B></TD>';
	echo '<TD><SELECT NAME="contacto_nom"> ';
	echo '<option selected NAME="contacto_nom" value="------------">---------------Selecciona-------------------</option>';

$link3= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link3); 
$result3=mysql_query("select * from contactos where iden_contact='$id_depart'", $link3);
while ($row=mysql_fetch_array($result3))
{
	echo '<option NAME="contacto_nom" value="'.$row["id_contacto"].'">'.$row["contact_nom"].'</option>';

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


echo '<TR>';
	echo '<TD valign="top"><B>Fecha de ingreso:<br></b><font size="2">Con este formato Ej. 2004-08-17 19:41:15</font></TD>';
	echo '<TD><INPUT TYPE="text" NAME="fechaing" value="0000-00-00 00:00:00"></TD>';
echo '</TR>';

echo '<TR>';
	echo '<TD valign="top"><B>Fecha de Cierre:<br></b><font size="2">Con este formato Ej. 2004-08-17 19:41:15</font></TD>';
	echo '<TD><INPUT TYPE="text" NAME="fechacierr" value="0000-00-00 00:00:00"></TD>';
echo '</TR>';


echo '</TABLE>';

echo '<br><br><input type="button" value="Ingresar" name="insertar" onClick="return Validar2(this.form)">';
echo '<input type="reset" value="Borrar">';
echo '</FORM>';
}


//Modulo insertar (Previsualizar)
if($modulo=="insertar"){
echo'<a href="javascript:history.back()"><< Regresar al Formulario de Orden</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

echo '<B><U>Previsualizaci&oacute;n de Orden</U></B><BR><BR>';
echo '<TABLE border="0" width="95%">
<FORM METHOD=POST ACTION="registross.php?modulo=insertar2">

<TR>
	<TD><B>Departamento:</B></TD>
	<TD><INPUT TYPE="hidden" name="nombre_depart" value="'.$nombre_depart.'">'.$nombre.'</TD>
</TR>
<TR>
	<TD><B>C&oacute;digo de Contacto:</B></TD>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from contactos where id_contacto='$contacto_nom'", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '<TD>'.$row["contact_nom"].'</TD>';

}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="contacto_nom" value="'.$contacto_nom.'">

</TR>';



echo '<TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from categoria_hard where id_cat='$categoria'", $link2);
while ($row=mysql_fetch_array($result2))
{

echo '<TD><B>Categoria:</B></TD>
	<TD><INPUT TYPE="hidden" name="categoria" value="'.$categoria.'">'.$row["nom_cat"].'</TD>';

}
mysql_free_result($result2);

echo '</TR>';




echo'<TR>
	<TD><B>Estado:</B></TD>
	<TD><INPUT TYPE="hidden" name="status_orden" value="'.$status_orden.'">'.$status_orden.'</TD>
</TR>

<TR>
	<TD><B>Descripci&oacute;n del Problema:</B></TD>
	<TD><INPUT TYPE="hidden" name="problema_orden" value="'.$problema_orden.'">'.$problema_orden.'</TD>
</TR>
<TR>
	<TD><B>Posible soluci&oacute;n del Problema:</B></TD>
	<TD><INPUT TYPE="hidden" name="solucion_orden" value="'.$solucion_orden.'">'.$solucion_orden.'</TD>
</TR>
<TR>
	<TD><B>Personal Asignado:</B></TD>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal where id_personal='$asig_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo '<TD>'.$row["nombre_personal"].'</TD>';
}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="asig_orden" value="'.$asig_orden.'">

</TR>
<TR>
	<TD><B>Prioridad:</B></TD>
	<TD><INPUT TYPE="hidden" name="prioridad" value="'.$prioridad.'">'.$prioridad.'</TD>
</TR>
<TR>
	<TD><B>Observaciones:</B></TD>
	<TD><INPUT TYPE="hidden" name="numero_pc_orden" value="'.$numero_pc_orden.'">'.$numero_pc_orden.'</TD>
</TR>


<TR>
	<TD><B>Fecha de Ingreso:</B></TD>
	<TD><INPUT TYPE="hidden" name="fechaing" value="'.$fechaing.'">'.$fechaing.'</TD>
</TR>

<TR>
	<TD><B>Fecha de Cierre:</B></TD>
	<TD><INPUT TYPE="hidden" name="fechacierr" value="'.$fechacierr.'">'.$fechacierr.'</TD>
</TR>


</TABLE><BR><BR><CENTER><a href="javascript:history.back()"><< Regresar</a> <INPUT TYPE="submit" name="insertar2" value="Ingresar"></CENTER></FORM>';
}




//Modulo insertar 2
if($modulo=="insertar2"){
echo'<meta http-equiv="refresh" content="5;URL=registros.php?modulo=tareas">';
echo'<a href="registross.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

if($status_orden == "Proceso"){
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("INSERT into registros (numero_orden,depa_orden,contacto_orden,status_orden,problema_orden,solucion_orden,asig_orden,numero_pc_orden,prioridad,fecha_orden,categoria,call)values('0','$nombre_depart','$contacto_nom','$status_orden','$problema_orden','$solucion_orden','$asig_orden','$numero_pc_orden','$prioridad','$fechaing','$categoria','$nombre_adm')",$link);
}
elseif($status_orden == "Terminado"){
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("INSERT into registros (numero_orden,depa_orden,contacto_orden,status_orden,problema_orden,solucion_orden,asig_orden,numero_pc_orden,prioridad,fecha_orden,fecha_cierra,categoria,call)values('0','$nombre_depart','$contacto_nom','$status_orden','$problema_orden','$solucion_orden','$asig_orden','$numero_pc_orden','$prioridad','$fechaing','$fechacierr','$categoria','$nombre_adm')",$link);
}




echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 5 segundos.<br><br>';


}
}
else{
if($modulo=="elegir") {
echo '<p>Lo sentimos no tienes los permisos necesarios para visualizar esta informaci&oacute;n.</p>';
if($num2 == "1")
{
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=adm') title='Acerca de la Cuenta Administrador'>Administrador</a>";
}
elseif($num2 == "0"){
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=us') title='Acerca de la Cuenta Usuario'>Usuario</a>";
}


echo '<p><b>Tipo de Cuenta:</b><br><b>'.$cuenta.'</b></p>';

}
}

echo'</div>';

include('libreria/final.php');

?>
