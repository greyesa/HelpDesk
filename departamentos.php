<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
departamentos.php               Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Departamentos</h2>';
if($num2 == "1"){
//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	/*echo '<li><a href="departamentos.php?modulo=ingresar">Ingresar Nuevo Departamento.</a></li>';
	echo '<li><a href="departamentos.php?modulo=editar">Editar Departamento.</a></li>';
	echo '<li><a href="departamentos.php?modulo=eliminar">Eliminar Departamento.</a></li>';*/
	echo '<li><a href="departamentos.php?modulo=lectura">Lectura por Departamento.</a></li>';
echo '</ul>';
}

//modulo lectura
if($modulo=="lectura"){
echo'<a href="departamentos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Lectura Departamento</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="departamentos.php?modulo=lectura2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}

//Modulo lectura 2
if($modulo=="lectura2"){
echo'<a href="departamentos.php?modulo=lectura"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

	echo '<table border="0" width="80%">';
	echo '<tr>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from departamento where id_depart='$id_depart'", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TD><BR><font color="#A88D3E"><B>[ Departamento ]</B></font><br><br><B>Nombre Departamento:</B></TD>
	<TD><BR><BR><BR>'.$row["nombre_depart"].'</TD>
</TR>


<TR>
	<TD><BR><font color="#A88D3E"><B>[ Jefe Departamento ]</B></font><br><br><B>Nombre Jefe Departamento:</B></TD>
	<TD><BR><BR><BR>'.$row["jefe_depart"].'</TD>
</TR>

<TR>
	<TD><B>Cargo de Jefe Departamento:</B></TD>
	<TD>'.$row["cargojefe_depart"].'</TD>
</TR>

<TR>
	<TD><B>E-mail Jefe Departamento:</B></TD>
	<TD>'.$row["emailjefe_depart"].'</TD>
</TR>



<TR>
	<TD><BR><font color="#A88D3E"><B>[ Informaci&oacute;n Departamento ]</B></font><br><br><B>Tel&eacute;fono Departamento:</B></TD>
	<TD><BR><BR><BR>'.$row["contacto_tel"].' <B>Extensi&oacute;n:</B> '.$row["contacto_ext"].'</TD>
</TR>
<TR>
	<TD><B>Fax Departamento:</B></TD>
	<TD>'.$row["contacto_fax"].'</TD>
</TR>
<TR>
	<TD><B>E-mail Departamento:</B></TD>
	<TD>'.$row["contacto_mail"].'</TD>';

}
mysql_free_result($result1);

	echo '</tr>';
	echo '</table>';


}




//Modulo eliminar
if($modulo=="eliminar"){
echo'<a href="departamentos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Eliminar Departamento</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="departamentos.php?modulo=eliminar2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}


//modulo eliminar 2 confirmar
if($modulo=="eliminar2"){
echo'<a href="departamentos.php?modulo=eliminar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

echo '<B>Confirmar:</B><br><br>¿ Esta seguro de eliminar el departamento denominado<br><B>'.$departamento.'</B> ?<br><br> [ <a href="departamentos.php?modulo=eliminar3&id_depart='.$id_depart.'&departamento='.$departamento.'">Si</a> ] [ <a href="departamentos.php?modulo=eliminar">No</a> ]';
}


//modulo eliminar proceso}
if($modulo=="eliminar3"){
echo'<meta http-equiv="refresh" content="10;URL=departamentos.php?modulo=menu">';
echo'<a href="departamentos.php?modulo=eliminar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Delete From departamento Where id_depart='$id_depart'",$link);

echo'<B>Informaci&oacute;n:</B> <br><br>El departamento denominado <B>'.$departamento.'</B> fue eliminado satisfactoriamente.</center>';

}


//Modulo editar
if ($modulo=="editar"){
echo'<a href="departamentos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Editar Departamento</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="departamentos.php?modulo=editar2&id_depart='.$row["id_depart"].'&departamento='.$row["nombre_depart"].'">'.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}


//Modulo editar 2
if($modulo=="editar2"){
echo'<a href="departamentos.php?modulo=editar"><< Regresar a Men&uacute;</a><br><br>';

echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

echo '<form method="post" action="departamentos.php?modulo=editar3">';
echo 'Por favor ingresa los datos que se requieren:<br><br>';
echo '<INPUT TYPE="hidden" name="id_depart" value="'.$id_depart.'">';
	echo '<table border="0" width="80%">';
	echo '<tr>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from departamento where id_depart='$id_depart'", $link2);
while ($row=mysql_fetch_array($result1))
{
		echo '<td><BR><font color="#A88D3E"><B>[  Departamento ]</B></font><br><br><b>Departamento:</b><br><font size="2">Ejemplo: Centro de Computo</font></td>';
		echo '<td><BR><BR><input type="text" name="nombre" value="'.$row["nombre_depart"].'"></td>';
	echo '</tr>';

echo '<tr>';
		echo '<td><BR><font color="#A88D3E"><B>[ Jefe Departamento ]</B></font><br><br><b>Nombre de Jefe Departamento:</b><br><font size="2">Ejemplo: Gustavo Reyes</font></td>';
		echo '<td><BR><BR><input type="text" name="jefe_depart" value="'.$row["jefe_depart"].'"></td>';
	echo '</tr>';

echo'<TR>
	<TD><B>Cargo de Jefe Departamento:</B><BR><font size="2">Seleccione una opci&oacute;n del menu desplegable.</font></TD>
	<TD><SELECT NAME="cargo"><option selected name="cargo" value="'.$row["cargojefe_depart"].'">'.$row["cargojefe_depart"].'</option><option>--------------</option>';
	

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
		echo '<td><input type="text" name="emailjefe_depart" value="'.$row["emailjefe_depart"].'"></td>';
	echo '</tr>';

echo '<tr>';
		echo '<td><BR><font color="#A88D3E"><B>[ Informaci&oacute;n Departamento ]</B></font><br><br><b>Tel&eacute;fono Departamento:</b><br><font size="2">Ejemplo: 566-56-56 ext: 523</font></td>';
		echo '<td><BR><BR><BR><input type="text" name="telefono" value="'.$row["contacto_tel"].'"> <input type="text" name="ext" size="1" value="'.$row["contacto_ext"].'"></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td><b>Fax Departamento:</b><br><font size="2">Ejemplo: 566-56-56</font></td>';
		echo '<td><input type="text" name="fax" value="'.$row["contacto_fax"].'"></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td><b>E-mail Departamento:</b><br><font size="2">Ejemplo: contaco@dominio.com</font></td>';
		echo '<td><input type="text" name="correo" value="'.$row["contacto_mail"].'"></td>';
}
mysql_free_result($result1);

	echo '</tr>';
	echo '</table>';
	
echo '<br><br><input type="submit" value="Editar" name="editar3">';
	echo '<input type="reset" value="Borrar">';
echo '</form>';

}



//modulo para editar
if($modulo=="editar3"){
echo'<meta http-equiv="refresh" content="10;URL=departamentos.php?modulo=menu">';
echo'<a href="departamentos.php?modulo=editar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update departamento Set nombre_depart='$nombre',contacto_tel='$telefono',contacto_ext='$ext',contacto_fax='$fax',contacto_mail='$correo',jefe_depart='$jefe_depart',cargojefe_depart='$cargo',emailjefe_depart='$emailjefe_depart' where id_depart='$id_depart'",$link);


echo 'Datos actualizados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';
echo '<TABLE border="0">
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



//Modulo ingreso
if($modulo=="ingresar") {
echo'<a href="departamentos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

echo '<form method="post" action="departamentos.php?modulo=insertar">';
echo 'Por favor ingresa los datos que se requieren:<br><br>';


echo '<table border="0" width="80%">';
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
echo'<meta http-equiv="refresh" content="10;URL=departamentos.php?modulo=menu">';
echo'<a href="departamentos.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

$sql = "SELECT nombre_depart FROM departamento WHERE nombre_depart='$nombre'";
$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);
if ($num == 0) {

$resto = substr ("$nombre", 0,3);    
$insert = $resto.$codigo;

$result=mysql_query("INSERT into departamento (nombre_depart,fecha_depart,contacto_tel,contacto_ext,contacto_fax,contacto_mail,codigo_depart,jefe_depart,cargojefe_depart,emailjefe_depart)values('$nombre',now(),'$telefono','$ext','$fax','$correo','$insert','$jefe_depart','$cargo','$emailjefe_depart')",$link);


echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';
echo '<TABLE border="0">
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
elseif ($num == 1)  {

echo'<br>Lo sentimos, ese departamento ya existe.<br><BR>';

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
