<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
departamento.php                       Dom/25/jul/2004
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
<h2 title="Content">Modulo Departamentos</h2>';
if($num2 == "1"){

//Modulo ingreso
if($modulo=="ingresar") {
echo'<CENTER>[<a href="javascript:opener.location.reload(true); self.close();">Cerrar esta ventana</a>]</CENTER><br>';


echo '<form method="post" action="departamento.php?modulo=insertar">';
echo 'Por favor ingresa los datos que se requieren:<br><br>';


echo '<table border="0" width="95%">';
	echo '<tr>';
	
		echo '<td><font color="#A88D3E"><B>[ Departamento ]</B></font><br><br><b>Departamento:</b><br><font size="2">Ejemplo: Centro de Computo</font></td>';
		echo '<td><BR><BR><input type="text" name="nombre"></td>';
	echo '</tr>';

echo '<tr>';
		echo '<td><BR><font color="#A88D3E"><B>[ Jefe Departamento ]</B></font><br><br><b>Nombre de Jefe Departamento:</b><br><font size="2">Ejemplo: Gustavo Reyes</font></td>';
		echo '<td><BR><BR><input type="text" name="jefe_depart"></td>';
	echo '</tr>';

echo'<TR>
	<TD><B>Cargo de Jefe Departamento:</B><BR><font size="2">Seleccione una opci&oacute;n del menu desplegable.</font></TD>';

echo'	<TD><SELECT NAME="cargo"><option selected name="cargo" value="----------">-----Seleccione-----</option>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from puestos", $link2);
while ($row=mysql_fetch_array($result1))
{
echo'<option name="cargo" value="'.$row["puesto"].'">'.$row["puesto"].'</option>';
}
mysql_free_result($result2);


echo'</SELECT></TD>
</TR>';

echo '<tr>';
		echo '<td><b>E-mail Jefe Departamento:</b><br><font size="2">Ejemplo: jefedepart@dominio.com</font></td>';
		echo '<td><input type="text" name="emailjefe_depart"></td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td><BR><font color="#A88D3E"><B>[ Informaci&oacute;n Departamento]</B></font><BR><BR><b>Tel&eacute;fono Departamento:</b><br><font size="2">Ejemplo: 566-56-56 ext: 523</font></td>';
		echo '<td><BR><BR><BR><input type="text" name="telefono"> <input type="text" name="ext" size="1"></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td><b>Fax Departamento:</b><br><font size="2">Ejemplo: 566-56-56</font></td>';
		echo '<td><input type="text" name="fax"></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td><b>E-mail Departamento:</b><br><font size="2">Ejemplo: contacto@dominio.com</font></td>';
		echo '<td><input type="text" name="correo"></td>';
	echo '</tr>';
	echo '</table>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by id_depart DESC LIMIT 1", $link2);
$num = mysql_numrows($result2);


if($num ==0){
$codigo=0+1;
echo '<INPUT TYPE="hidden" value="'.$codigo.'" name="codigo">';
}
while ($row=mysql_fetch_array($result2))
{
$codigo=$row["id_depart"]+1;
echo '<INPUT TYPE="hidden" value="'.$codigo.'" name="codigo">';
}
mysql_free_result($result2);

echo '<br><br><input type="submit" value="Ingresar" name="insertar">';
	echo '<input type="reset" value="Borrar">';
echo '</form>';
}


//Modulo insertar
if($modulo=="insertar"){
echo'<CENTER>[<a href="javascript:opener.location.reload(true); self.close();">Cerrar esta ventana</a>]</CENTER><br>';


$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

$resto = substr ("$nombre", 0,3);    

$insert = $resto.$codigo;

$result=mysql_query("INSERT into departamento (nombre_depart,fecha_depart,contacto_tel,contacto_ext,contacto_fax,contacto_mail,codigo_depart,jefe_depart,cargojefe_depart,emailjefe_depart)values('$nombre',now(),'$telefono','$ext','$fax','$correo','$insert','$jefe_depart','$cargo','$emailjefe_depart')",$link);


echo 'Datos ingresados satisfactoriamente.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';
echo '<TABLE border="0" width="95%">
<TR>
	<TD><BR><font color="#A88D3E"><B>[ Departamento ]</B></font><br><br><B>Nombre Departamento:</B></TD>
	<TD><BR><BR><BR>'.$nombre.'</TD>
</TR>


<TR>
	<TD><BR><font color="#A88D3E"><B>[ Jefe Departamento ]</B></font><br><br><B>Nombre Jefe Departamento:</B></TD>
	<TD><BR><BR><BR>'.$jefe_depart.'</TD>
</TR>

<TR>
	<TD><B>Cargo de Jefe Departamento:</B></TD>
	<TD>'.$cargo.'</TD>
</TR>

<TR>
	<TD><B>E-mail Jefe Departamento:</B></TD>
	<TD>'.$emailjefe_depart.'</TD>
</TR>

<TR>
	<TD><BR><font color="#A88D3E"><B>[ Informaci&oacute;n Departamento ]</B></font><br><br><B>Tel&eacute;fono Departamento:</B></TD>
	<TD><BR><BR><BR>'.$telefono.' <B>Extensi&oacute;n:</B> '.$ext.'</TD>
</TR>
<TR>
	<TD><B>Fax Departamento:</B></TD>
	<TD>'.$fax.'</TD>
</TR>
<TR>
	<TD><B>E-mail Departamento:</B></TD>
	<TD>'.$correo.'</TD>
</TR>
</TABLE>';


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
