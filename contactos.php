<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
contactos.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Contactos</h2>';

if($num2 == "1"){

//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	echo '<li><a href="contactos.php?modulo=ingresar">Ingresar Nuevo Contacto.</a></li>';
	echo '<li><a href="contactos.php?modulo=editaren">Editar Contacto.</a></li>';
	echo '<li><a href="contactos.php?modulo=eliminaren">Eliminar Contacto.</a></li>';
	echo '<li><a href="contactos.php?modulo=lectura">Lectura Contacto.</a></li>';
echo '</ul>';
}


//Modulo lectura 3
if($modulo=="lectura3"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

echo '<table border="0" width="95%">';
echo'<TR>
	<TD><B>Departamento:</B></TD>
	<TD>'.$departamento.'</TD>
</TR>';

$link1= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link1); 
$result1=mysql_query("select * from contactos where id_contacto='$id_contacto'", $link1);
while ($row=mysql_fetch_array($result1))
{
echo'<TR>
	<TD><B>Nombre de Contacto:</B></TD>
	<TD>'.$row["contact_nom"].'</TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B></TD>
	<TD>'.$row["contact_cargo"].'</TD>
</TR>';

echo'<TR>
	<TD><B>E-mail de Contacto:</B></TD>
	<TD>'.$row["contact_mail"].'</TD>
</TR>';

echo '<tr>
	<td><B>Extensi&oacute;n:</B></td>
	<td>'.$row["contact_ext"].'</td>
</tr>';

echo '<tr>
	<td><B>Fecha de Ingreso:</B></td>
	<td>'.$row["fecha_contact"].'</td>
</tr>';

echo'</TABLE>';
}
mysql_free_result($result1);

}



//modulo lectura 2
if($modulo=="lectura2"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';
echo 'Contactos del Departamento <font color="#A88D3E"><B>'.$departamento.'</B></font><BR><BR>';

echo '<TABLE border="0" width="95%">
<TR>
	<TD><B>Contactos</B></TD>
</TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from contactos,departamento where (iden_contact='$id_depart') and (id_depart='$id_depart')", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>
	<TD><a href="contactos.php?modulo=lectura3&id_depart='.$id_depart.'&id_contacto='.$row["id_contacto"].'&departamento='.$row["nombre_depart"].'">'.$row["contact_nom"].'</a></TD>';

}
mysql_free_result($result1);
echo '</TR>
</TABLE>';

}



//Modulo lectura
if($modulo=="lectura"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

echo 'Selecciona el Departamento para visualizar los contactos de este.<BR><BR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="95%">';
echo '<TR>';
	echo '<TD><B>Lectura Contacto por Departamento</B></TD>';

echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="contactos.php?modulo=lectura2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';

}



//Modulo Eliminar 4
if($modulo=="eliminar4"){
echo'<meta http-equiv="refresh" content="10;URL=contactos.php?modulo=menu">';
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';
$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Delete From contactos Where id_contacto='$id_contacto'",$link);
echo'<B>Informaci&oacute;n:</B> <br><br><B>'.$contact_nom.'</b> del Departamento <b>'.$departamento.'</B>  fue eliminado satisfactoriamente.</center>';
}





//Modulo eliminar 3
if($modulo=="eliminar3"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';
echo '<B>Confirmar:</B><br><br>¿ Esta seguro de eliminar el contacto denominado<br><B>'.$contact_nom.'</b> del Departamento <b>'.$departamento.'</B> ?<br><br> [ <a href="contactos.php?modulo=eliminar4&contact_nom='.$contact_nom.'&id_contacto='.$id_contacto.'&id_depart='.$id_depart.'&departamento='.$departamento.'">Si</a> ] [ <a href="contactos.php?modulo=eliminaren">No</a> ]';
}





//Modulo eliminar 2
if($modulo=="eliminar2"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

echo 'Contactos del Departamento <font color="#A88D3E"><B>'.$departamento.'</B></font><BR><BR>';

echo '<TABLE border="0" width="95%">
<TR>
	<TD><B>Contactos</B></TD>
</TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from contactos,departamento where (iden_contact='$id_depart') and (id_depart='$id_depart')", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>
	<TD><a href="contactos.php?modulo=eliminar3&id_depart='.$id_depart.'&id_contacto='.$row["id_contacto"].'&departamento='.$row["nombre_depart"].'&contact_nom='.$row["contact_nom"].'">'.$row["contact_nom"].'</a></TD>';

}
mysql_free_result($result1);
echo '</TR>
</TABLE>';



}


//modulo eliminar
if($modulo=="eliminaren"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

echo 'Selecciona el Departamento para visualizar los contactos de este.<BR><BR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="95%">';
echo '<TR>';
	echo '<TD><B>Eliminar Contacto por Departamento</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="contactos.php?modulo=eliminar2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}




//Modulo editar 3
if($modulo=="editar3"){
echo'<a href="contactos.php?modulo=editar2&id_depart='.$id_depart.'&departamento='.$departamento.'"><< Regresar a Men&uacute;</a><br><br>';

echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';


echo 'Ahora puede editar los datos para este Contacto.';

echo '<FORM METHOD=POST ACTION="contactos.php?modulo=editar4">';
echo '<TABLE border="0" width="95%">';
echo'<TR>
	<TD><BR><BR><B>Departamento:</B><BR><font size="2">Utilice una opci&oacute;n del menu desplegable.</font></TD>';
echo '<INPUT TYPE="hidden" name="id_contacto" value="'.$id_contacto.'">';
echo '<INPUT TYPE="hidden" name="departamento" value="'.$departamento.'">';


echo '<TD><SELECT NAME="iden_contact">';
echo '<option selected name="iden_contact" value="'.$id_depart.'">'.$departamento.'</option><option>---------------------------------------------</option>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<option name="iden_contact" value="'.$row["id_depart"].'">'.$row["nombre_depart"].'</option>';
}
mysql_free_result($result2);

echo '</SELECT></TD>';
echo'</TR>';

$link1= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link1); 
$result1=mysql_query("select * from contactos where id_contacto='$id_contacto'", $link1);
while ($row=mysql_fetch_array($result1))
{
echo'<TR>
	<TD><B>Nombre de Contacto:</B><BR><font size="2">Ejemplo: Gustavo Reyes.</font></TD>
	<TD><INPUT TYPE="text" NAME="contact_nom" value="'.$row["contact_nom"].'"></TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B><BR><font size="2">Ingrese el Cargo de este Contacto <BR>dentro del Departamento manualmente.</font></TD>';


echo'	<TD><SELECT NAME="contact_cargo"><option selected name="contact_cargo" value="'.$row["contact_cargo"].'">'.$row["contact_cargo"].'</option>';

echo '<option name="contact_cargo" value="----------">----------------</option>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from puestos", $link2);
while ($row=mysql_fetch_array($result1))
{
echo'<option name="cargo" value="'.$row["puesto"].'">'.$row["puesto"].'</option>';
}
mysql_free_result($result2);


echo'</SELECT></TD>';

echo'</TR>';

echo'<TR>
	<TD><B>E-mail de Contacto:</B><BR><font size="2">Ejemplo: contacto@dominio.com</font></TD>
	<TD><INPUT TYPE="text" NAME="contact_mail" value="'.$row["contact_mail"].'"></TD>
</TR>';

echo '<tr>
	<td><B>Extensi&oacute;n:</B><BR><font size="2">Ejemplo: 356</font></td>
	<td><INPUT TYPE="text" NAME="contact_ext" value="'.$row["contact_ext"].'"></td>
</tr>';

echo'</TABLE>';
echo '<br><br><input type="submit" value="Editar" name="editar4">';
echo '<input type="reset" value="Borrar">';
echo '</FORM>';


}
mysql_free_result($result1);
}


//Modulo para  editar 3
if($modulo=="editar4"){
echo'<meta http-equiv="refresh" content="10;URL=contactos.php?modulo=editaren">';
echo'<a href="contactos.php?modulo=editaren"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';


$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update contactos Set contact_nom='$contact_nom',contact_ext='$contact_ext',contact_mail='$contact_mail',iden_contact='$iden_contact',contact_cargo='$contact_cargo',fecha_contact=now() where id_contacto='$id_contacto'",$link);

echo '<TABLE border="0" width="95%">';
echo '<TR>
<TD><B>Departamento:</B></TD>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento where id_depart='$iden_contact'", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '	<TD>'.$row["nombre_depart"].'</TD>';
}
mysql_free_result($result2);
	
	
	echo'</TR>
<TR>
	<TD><B>Nombre de Contacto:</B></TD>
	<TD>'.$contact_nom.'</TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B></TD>
	<TD>'.$contact_cargo.'</TD>
</TR>
<TR>
	<TD><B>E-mail de Contacto:</B></TD>
	<TD>'.$contact_mail.'</TD>
</TR>
<TR>
	<TD><B>Extensi&oacute;n:</B></TD>
	<TD>'.$contact_ext.'</TD>
</TR>
</TABLE>';


}




//modulo editar 2
if($modulo=="editar2"){
echo'<a href="contactos.php?modulo=editaren"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

echo 'Contactos del Departamento <font color="#A88D3E"><B>'.$departamento.'</B></font><BR><BR>';

echo '<TABLE border="0" width="95%">
<TR>
	<TD><B>Contactos</B></TD>
</TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from contactos,departamento where (iden_contact='$id_depart') and (id_depart='$id_depart')", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>
	<TD><a href="contactos.php?modulo=editar3&id_depart='.$id_depart.'&id_contacto='.$row["id_contacto"].'&departamento='.$row["nombre_depart"].'">'.$row["contact_nom"].'</a></TD>';

}
mysql_free_result($result1);
echo '</TR>
</TABLE>';
}



//modulo para editar contacto
if($modulo=="editaren"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

echo 'Selecciona el Departamento para visualizar los contactos de este.<BR><BR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="95%">';
echo '<TR>';
	echo '<TD><B>Editar Contacto por Departamento</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="contactos.php?modulo=editar2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}




//Modulo de formulario de orden
if($modulo=="ingresar"){
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo 'Ingrese los datos correspondientes para este Contacto por favor.<BR><BR>';
echo '<FORM METHOD=POST ACTION="contactos.php?modulo=insertar">';
echo '<TABLE border="0" width="95%">';
echo'<TR>
	<TD><B>Departamento:</B><BR><font size="2">Utilice una opci&oacute;n del menu desplegable.</font></TD>';

echo '<TD><SELECT NAME="iden_contact">';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '<option name="iden_contact" value="'.$row["id_depart"].'">'.$row["nombre_depart"].'</option>';



}
mysql_free_result($result2);

echo '</SELECT></TD>';
echo'</TR>';


echo'<TR>
	<TD><B>Nombre de Contacto:</B><BR><font size="2">Ejemplo: Gustavo Reyes.</font></TD>
	<TD><INPUT TYPE="text" NAME="contact_nom"></TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B><BR><font size="2">Ingrese el Cargo de este Contacto <BR>dentro del Departamento manualmente.</font></TD>';

echo'	<TD><SELECT NAME="contact_cargo"><option selected name="contact_cargo" value="----------">-----Seleccione-----</option>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from puestos", $link2);
while ($row=mysql_fetch_array($result1))
{
echo'<option name="contact_cargo" value="'.$row["puesto"].'">'.$row["puesto"].'</option>';
}
mysql_free_result($result2);


echo'</SELECT></TD>';


	
echo'</TR>';

echo'<TR>
	<TD><B>E-mail de Contacto:</B><BR><font size="2">Ejemplo: contacto@dominio.com</font></TD>
	<TD><INPUT TYPE="text" NAME="contact_mail"></TD>
</TR>';

echo '<tr>
	<td><B>Extensi&oacute;n:</B><BR><font size="2">Ejemplo: 356</font></td>
	<td><INPUT TYPE="text" NAME="contact_ext"></td>
</tr>';

echo'</TABLE>';
echo '<br><br><input type="submit" value="Ingresar" name="insertar">';
echo '<input type="reset" value="Borrar">';
echo '</FORM>';
}

//Modulo insertar
if($modulo=="insertar"){
echo'<meta http-equiv="refresh" content="10;URL=contactos.php?modulo=menu">';
echo'<a href="contactos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link); 

$sql = "SELECT contact_nom FROM contactos WHERE contact_nom='$contact_nom'";
$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);
if ($num == 0) {

$result=mysql_query("INSERT into contactos (contact_nom,contact_ext,contact_mail,iden_contact,contact_cargo,fecha_contact) values('$contact_nom','$contact_ext','$contact_mail','$iden_contact','$contact_cargo',now())",$link);

echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';

echo '<TABLE border="0" width="95%">';
echo '<TR>
<TD><B>Departamento:</B></TD>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento where id_depart='$iden_contact'", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '	<TD>'.$row["nombre_depart"].'</TD>';
}
mysql_free_result($result2);
	
	
	echo'</TR>
<TR>
	<TD><B>Nombre de Contacto:</B></TD>
	<TD>'.$contact_nom.'</TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B></TD>
	<TD>'.$contact_cargo.'</TD>
</TR>
<TR>
	<TD><B>E-mail de Contacto:</B></TD>
	<TD>'.$contact_mail.'</TD>
</TR>
<TR>
	<TD><B>Extensi&oacute;n:</B></TD>
	<TD>'.$contact_ext.'</TD>
</TR>
</TABLE>';

}
elseif ($num == 1)  {

echo'<br>Lo sentimos, ese contacto ya existe.<br><BR>';

}
}
}
else{
if($modulo=="menu") {
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
