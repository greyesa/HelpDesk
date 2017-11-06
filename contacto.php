<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
contacto.php                    Dom/25/jul/2004
***********************************************/

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<title>Help Desk System</title>';

echo '<style type="text/css">';
echo 'BODY {';
echo 'text-align: justify;';
echo 'font-family: "Trebuchet MS", Arial, Geneva, san-serif;';
echo '}';

echo '#content {
	border-left: 1px solid #000033;
	
	padding: 2em 5em 2em 2em;
	background: #FFF8EF;
	border-top: 1px solid #000033;
	border-bottom: 1px solid #716F64;
}';

echo '#content a {
	color: #333300;
}
#content a:hover {
	text-decoration: none;
}
#content ul {
	padding-left: 4em;
	font-family: "Trebuchet MS", Arial, Geneva, san-serif;
	list-style: square;';

echo '</style>';
?>

<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (cuentas)
*/
function cuenta(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=500,height=290,left = 150,top = 150');");
}
</script>
<?php
echo'</head>';
?>

<body  bgcolor="#A88D3E">

<?php

echo'<div id="content">
<h2 title="Content">Modulo Contactos</h2>';

if($num2 == "1"){

//Modulo de formulario de orden
if($modulo=="ingresar"){
echo'<CENTER>[<a href="javascript:opener.location.reload(true); self.close();">Cerrar esta ventana</a>]</CENTER><br>';
echo 'Ingrese los datos correspondientes para este Contacto por favor.<BR><BR>';
echo '<FORM METHOD=POST ACTION="contacto.php?modulo=insertar">';
echo '<TABLE border="0" width="100%">';
echo '<TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento where id_depart='$id_depart'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<TD><B>Departamento:</B></TD>';
	echo '<TD><INPUT TYPE="hidden" NAME="nombre_depart" value="'.$row["nombre_depart"].'"><B>'.$row["nombre_depart"].'</B></TD>';
}
mysql_free_result($result2);


echo '</TR>';

echo '<INPUT TYPE="hidden" name="iden_contact" value="'.$id_depart.'">';

echo'<TR>
	<TD><B>Nombre de Contacto:</B><BR><font size="2">Ejemplo: Gustavo Reyes.</font></TD>
	<TD><INPUT TYPE="text" NAME="contact_nom"></TD>
</TR>
<TR>
	<TD><B>Cargo de Contacto:</B><BR><font size="2">Ejemplo: Gerente.</font></TD>';


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
echo'<CENTER>[<a href="javascript:opener.location.reload(true); self.close();">Cerrar esta ventana</a>]</CENTER><br>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link); 

$sql = "SELECT contact_nom FROM contactos WHERE contact_nom='$contact_nom'";
$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);
if ($num == 0) {

$result=mysql_query("INSERT into contactos (contact_nom,contact_ext,contact_mail,iden_contact,contact_cargo,fecha_contact) values('$contact_nom','$contact_ext','$contact_mail','$iden_contact','$contact_cargo',now())",$link);

echo 'Datos ingresados satisfactoriamente. <br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';

echo '<TABLE border="0">';
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
if($modulo=="ingresar") {
echo '<p>Lo sentimos no tienes los permisos necesarios para visualizar esta informaci&oacute;n.</p>';
if($num2 == "1")
{
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=adm') title='Acerca de la Cuenta Administrador'>Administrador</a>";
}
elseif($num2 == "2"){
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=usav') title='Acerca de la Cuenta Usuario Avanzado'>Usuario Avanzado</a>";

}
elseif($num2 == "0"){
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=us') title='Acerca de la Cuenta Usuario'>Usuario</a>";
}


echo '<p><b>Tipo de Cuenta:</b><br><b>'.$cuenta.'</b></p>';

}
}

echo'</div>';

echo'</body></html>';

?>
