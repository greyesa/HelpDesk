<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
personal.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Personal</h2>';
if($num2 == "1"){

//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	//echo '<li><a href="personal.php?modulo=ingresar">Ingresar Nuevo Nombre.</a></li>';
	//echo '<li><a href="personal.php?modulo=editar">Editar Nombre.</a></li>';
	//echo '<li><a href="personal.php?modulo=eliminar">Eliminar Nombre.</a></li>';
	echo '<li><a href="personal.php?modulo=lectura">Lectura por Nombre.</a></li>';
echo '</ul>';
}


//modulo ingresar nuevo usuario
if($modulo=="ingresar"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

echo '<FORM METHOD=POST ACTION="personal.php?modulo=ingresar2">';
echo '<TABLE border="0" width="70%"><tr>';
	echo '<TD><B>Nombre de Persona:</B><br><font size="2">Nombre completo por favor.<br>Ej. Juan P&eacute;rez</font></TD>';
	echo '<TD><INPUT TYPE="text" NAME="nombre"></TD>';
echo '</TR>';

	echo '<tr><TD><B>C&oacute;digo Personal:</B><br><font size="2">Asignale un c&oacute;digo por favor.<br>Ej. JP.</font></TD>';
	echo '<TD><INPUT TYPE="text" NAME="codigo_asig"></TD><tr>';


echo '</TABLE>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal order by id_personal DESC LIMIT 1", $link2);
$num = mysql_numrows($result2);


if($num ==0){
$codigo=0+1;
echo '<INPUT TYPE="hidden" value="T'.$codigo.'" name="codigo">';
}

while ($row=mysql_fetch_array($result2))
{
$codigo=$row["id_personal"]+1;
echo '<INPUT TYPE="hidden" value="T'.$codigo.'" name="codigo">';
}
mysql_free_result($result2);

echo '<BR><INPUT TYPE="submit" value="Ingrear" name="ingresar2">';
echo '</FORM>';
}


//Modulo para ingresar usuario
if($modulo=="ingresar2"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';


$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link); 

$sql = "SELECT nombre_personal FROM personal WHERE nombre_personal='$nombre'";
$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);
if ($num == 0) {


$result=mysql_query("INSERT into personal (nombre_personal,codigo_personal,fecha_personal,codigo_asig) values('$nombre','$codigo',now(),'$codigo_asig')",$link);

echo "<br>Fue ingresado satisfactoriamente el registro como parte del personal.<br><br>";

echo '<B>Nombre:</B>  <B>'.$nombre.'</B><br>';
echo '<B>C&oacute;digo Personal Asignado:</B>  <B>'.$codigo_asig.'</B><br>';
echo '<B>C&oacute;digo del Sistema: '.$codigo.'</B>';
}
elseif ($num == 1)  {

echo'<br>Lo sentimos, ese nombre de Personal ya existe.<br><BR>';

}
}


//Modulo editar 
if($modulo=="editar"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal order by nombre_personal", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Editar Personal</B></TD>';
	echo '<TD><CENTER><B>C&oacute;digo Personal Asignado</B></CENTER></TD>';
	echo '<TD><CENTER><B>C&oacute;digo del Sistema</B></CENTER></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="personal.php?modulo=editar2&id_personal='.$row["id_personal"].'&codigo_personal='.$row["codigo_personal"].'">'.$row["nombre_personal"].'</a></TD>';
echo '<TD><CENTER>'.$row["codigo_asig"].'</CENTER></TD>';
echo '<TD><CENTER>'.$row["codigo_personal"].'</CENTER></TD>';

echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}


//Modulo Editar 2
if($modulo=="editar2"){
echo'<a href="personal.php?modulo=editar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="personal.php?modulo=editar3">';
echo '<TABLE border="0" width="70%"><tr>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal where id_personal='$id_personal'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo '<TD><B>Nombre de Persona:</B><br><font size="2">Nombre completo por favor.<br>Ej. Juan P&eacute;rez</font></TD>';
	echo '<TD><CENTER><INPUT TYPE="text" NAME="nombre" value="'.$row["nombre_personal"].'"></CENTER></TD></tr>';
	
echo '<tr><TD><B>C&oacute;digo Personal Asignado:</B><br><font size="2">Asignale un c&oacute;digo por favor.<br> Ej. JP.</font></TD>';
	echo '<TD><CENTER><INPUT TYPE="text" NAME="codigo_asig" value="'.$row["codigo_asig"].'"></CENTER></TD></tr>';


	echo '<tr><TD><B>C&oacute;digo Personal:</B><br><font size="2">A este usuario se le fue asignado este c&oacute;digo no hay manera de ser modificado, por el mecanismo de control.</font></TD>';
	echo '<TD><CENTER><INPUT TYPE="hidden" name="id_personal" value="'.$row["id_personal"].'"><INPUT TYPE="hidden" value="'.$row["codigo_personal"].'" name="codigo_personal"><B>'.$row["codigo_personal"].'</B></CENTER></TD>';

echo '</TR>';
echo '</TABLE>';
}
mysql_free_result($result2);
echo '<BR><INPUT TYPE="submit" value="Editar" name="editar3">';
echo '</FORM>';
}


//Modulo editar3
if($modulo=="editar3"){
echo'<a href="personal.php?modulo=editar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update personal Set nombre_personal='$nombre', fecha_personal=now(), codigo_asig='$codigo_asig' where id_personal='$id_personal'",$link);

echo 'Datos actualizados satisfactoriamente.<br><br><B>Previsualizaci&oacute;n:</B><br><br>';
echo '<B>Nombre:</B>  <B>'.$nombre.'</B><br>';
echo '<B>C&oacute;digo Personal Asignado:</B>  <B>'.$codigo_asig.'</B><br>';
echo '<B>C&oacute;digo del Sistema: '.$codigo_personal.'</B>';
}


//Modulo eliminar
if($modulo=="eliminar"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal order by nombre_personal", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Eliminar Personal</B></TD>';
	echo '<TD><CENTER><B>C&oacute;digo Personal</B></CENTER></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="personal.php?modulo=eliminar2&id_personal='.$row["id_personal"].'&codigo_personal='.$row["codigo_personal"].'&nombre_personal='.$row["nombre_personal"].'">'.$row["nombre_personal"].'</a></TD>';
echo '<TD><CENTER><B>'.$row["codigo_personal"].'</B></CENTER></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}


//Modulo para eliminar usuario
if($modulo=="eliminar2"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

echo '<B>Confirmar:</B><br><br>¿ Esta seguro de eliminar el usuario denominado <B>'.$nombre_personal.'</B> ?<br><br> [ <a href="personal.php?modulo=eliminar3&id_personal='.$id_personal.'&codigo_personal='.$row["codigo_personal"].'&nombre_personal='.$nombre_personal.'">Si</a> ] [ <a href="personal.php?modulo=eliminar">No</a> ]';
}

//Modulo eliminar registro
if($modulo=="eliminar3"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Eliminar</B> ]</CENTER><br>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Delete From personal Where id_personal='$id_personal'",$link);

echo'<B>Informaci&oacute;n:</B> <br><br>El usuario denominado <B>'.$nombre_personal.'</B> fue eliminado satisfactoriamente.</center>';
}

//Modulo lectura
if($modulo=="lectura"){
echo'<a href="personal.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal order by nombre_personal", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Lectura Personal</B></TD>';
	echo '<TD><CENTER><B>C&oacute;digo Personal Asignado</B></CENTER></TD>';
	echo '<TD><CENTER><B>C&oacute;digo del Sistema</B></CENTER></TD>';

echo '</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';
	echo '<TD><a href="personal.php?modulo=lectura2&id_personal='.$row["id_personal"].'&codigo_personal='.$row["codigo_personal"].'">'.$row["nombre_personal"].'</a></TD>';
echo '<TD><CENTER>'.$row["codigo_asig"].'</CENTER></TD>';
echo '<TD><CENTER>'.$row["codigo_personal"].'</CENTER></TD>';

echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';
}

//Modulo lectura 2
if($modulo=="lectura2"){
echo'<a href="personal.php?modulo=lectura"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

echo '<table border="0" width="80%">';
	echo '<tr>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from personal where id_personal='$id_personal'", $link2);
while ($row=mysql_fetch_array($result1))
{
		echo '<td><b>Nombre de Usuario:</b></td>';
		echo '<td>'.$row["nombre_personal"].'</td>';
	echo '<tr>';
		echo '<td><b>C&oacute;digo Personal Asignado:</b></td>';
		echo '<td>'.$row["codigo_asig"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td><b>C&oacute;digo del Sistema:</b></td>';
		echo '<td>'.$row["codigo_personal"].'</td>';
	echo '</tr>';

	echo '</tr>';
	echo '<tr>';
		echo '<td><b>Fecha de Ingreso:</b></td>';
		echo '<td>'.$row["fecha_personal"].'</td>';
	
}
mysql_free_result($result1);

	echo '</tr>';
	echo '</table>';

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
