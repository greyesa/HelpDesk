<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberaci�n 18-5-2012
mensajes.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Mensajes Privados</h2>';
if($num2 == "1"){


//Modulo para leer mensaje
if($modulo=="verfull"){
echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Lectura Mensaje Privado</B> ]</CENTER><br>';

$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);
$pegar = "SELECT * FROM mensajes where id_men='$id_men'";
$result=mysql_query("UPDATE mensajes SET ver=1 WHERE id_men='$id_men'",$con);
$cad = mysql_db_query($base,$pegar) or die (mysql_error());
while ($array=mysql_fetch_array($cad))
{
echo'<TABLE BORDER="0" WIDTH="95%">';
echo'<TR>';
echo'	<TD><b>Enviado por:</b> '.$nombre.'<br><b>Encabezado:</b> '.$array["ti_men"].'<br><b>Fecha de ingreso:</b> '.$array["fecha_men"].'<br><br><b>Mensaje:</b><br> '.$array["mens_men"].'</TD>';
echo'</TR>';
echo'</TABLE>';
echo'<center><a href="mensajes.php?modulo=responder&id_nombre='.$id_nombre.'&nombre='.$nombre.'">[ Responder este mensaje ]</a></center>';
}
$con=mysql_close($con);

}




//Modulo lectura 2
if($modulo=="lectura2"){
echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Lectura Mensaje Privado</B> ]</CENTER><br>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("select * from mensajes WHERE iden_men='$id_admin' and ver='0'", $link);
$cad=mysql_query("select * from mensajes WHERE iden_men='$id_admin'", $link);
$r=mysql_num_rows($result);
$r2=mysql_num_rows($cad);

echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT=""> <a href="mensajes.php?modulo=nuevo">Nuevo Mensaje Privado.</a><br><br>';


echo '<CENTER>Total Mensajes: ('.$r2.')</CENTER>';


$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=30; // cantidad de resultados por p�gina
$inicial = $pg * $cantidad;

$pegar = "SELECT * FROM mensajes where iden_men='$id_admin' ORDER BY fecha_men desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from mensajes where iden_men='$id_admin' and ver='0' order by fecha_men desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);

echo'<center><TABLE width="95%" border="0">';
echo'<TR>';
echo'	<TD bgcolor="#A88D3E"><font color="#ffffff"><center><b>Caracter</b></center></font</TD>';
echo'	<TD bgcolor="#A88D3E"><font color="#ffffff"><center><b>Enviado por</b></center></font></TD>';
echo'	<TD bgcolor="#A88D3E"><font color="#ffffff"><center><b>Encabezado</b></center></font></TD>';
echo'	<TD bgcolor="#A88D3E"><font color="#ffffff"><center><b>Opci&oacute;n</b></center></font></TD>';
echo'</TR>';

while ($array=mysql_fetch_array($cad))
{
$enviado_men=$array["enviado_men"];
if($array["ver"]=="1"){
$opcion="<font color='#FF0000'>Leido</font>";
}
elseif($array["ver"]=="0"){
$opcion="<font color='#FF6633'>Nuevo</font>";
}

echo'<TR>';
echo'	<TD><CENTER>'.$opcion.'</CENTER></TD>';

$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link); 
$result=mysql_query("select * from administrador where ID_adm='$enviado_men'", $link);
while ($row=mysql_fetch_array($result))
{
echo'	<TD><CENTER><B>'.$row["nombre"].'</B></CENTER></TD>';
$nombre=$row["nombre"];
$id_nombre=$row["ID_adm"];
}
mysql_free_result($result);

echo '<td><B>'.$array["ti_men"].'</B></td>';

echo'	<TD><CENTER><b><a href="mensajes.php?modulo=verfull&id_men='.$array["id_men"].'&nombre='.$nombre.'&id_nombre='.$id_nombre.'"><< Abrir mensaje</a></CENTER></TD>';
echo'</TR>';
}
$con=mysql_close($con);
echo'</TABLE></center>';


// Creando los enlaces de paginaci�n
echo "<center><p>P�ginas:<br>";
if ($pg <> 0)
{
$url = $pg - 1;
echo "<a href='mensajes.php?modulo=lectura2&pg=".$url."'>� Anterior</a> ";
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
echo "<font color=ff0000><b> $i </b></font>";
}
else {
echo "<a href='mensajes.php?modulo=lectura2&pg=".$i."'>".$i."</a> ";
}
}

if ($pg < $pages) {
$url = $pg + 1;
echo "<a href='mensajes.php?modulo=lectura2&pg=".$url."'>Siguiente �</a>";
}
else {
echo " ";
}
echo "</p></center>";

}



if($modulo=="responder2"){
echo'<meta http-equiv="refresh" content="3;URL=mensajes.php?modulo=lectura2">';

echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Responder Mensaje Privado</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

$result=mysql_query("INSERT into mensajes (iden_men,ti_men,mens_men,fecha_men,ver,enviado_men)values('$nombre','$ti_men','$mensaje',now(),'0','$id_admin')",$link);

echo 'Mensaje enviado satisfactoriamente a: <B>'.$nombre.'</B>.';
}




//modulo responder
if($modulo=="responder"){
echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Responder Mensaje Privado</B> ]</CENTER><br>';
echo '<FORM METHOD=POST ACTION="mensajes.php?modulo=responder2">';
echo '<TABLE border="0">';
echo '<TR>';
	echo '<TD><B>Para:</B> </TD>';

echo'<td> <SELECT NAME="nombre"><option selected name="nombre" value="'.$id_nombre.'">'.$nombre.'</option><option name="nombre" value="--------------">-----------------</option>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from administrador", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<option name="nombre" value="'.$row["ID_adm"].'">'.$row["nombre"].'</option>';
}
mysql_free_result($result2);


	//echo '<TD>'.$nombre.'<INPUT TYPE="hidden" name="nombre" value="'.$nombre.'"><INPUT TYPE="hidden" name="id_nombre" value="'.$id_nombre.'">';


	echo'</SELECT></TD>';
echo '</TR>';
echo '<TR>';
	echo '<TD><B>Encabezado:</B> </TD>';
	echo '<TD><INPUT TYPE="text" NAME="ti_men">';

	echo'</TD>';
echo '</TR>';
echo '<TR>';
	echo '<TD valign="top"><B>Mensaje:</B></TD>';
	echo '<TD><TEXTAREA NAME="mensaje" ROWS="10" COLS="50"></TEXTAREA></TD>';
echo '</TR>';
echo '</TABLE>';

echo '<CENTER><INPUT TYPE="submit" name="enviar" value="Enviar"></CENTER>';
echo '</FORM>';
}





// Nuevo Mensaje Privado
if($modulo=="nuevo"){
echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Nuevo Mensaje Privado</B> ]</CENTER><br>';

echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT="">  <a href="mensajes.php?modulo=responder">Mensaje para el Administrador</a><br><br>';
echo '<FORM METHOD=POST ACTION="mensajes.php?modulo=enviar">';
echo '<TABLE border="0">';
echo '<TR>';
	echo '<TD><B>Para:</B> </TD>';
	echo '<TD>';
echo '<SELECT NAME="para">';
echo '<option selected name="para" value="------Seleccione--------">------Seleccione--------</option>';	
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<option name="para" value="'.$row["id_personal"].'">'.$row["nombre_personal"].'</option>';	
}
mysql_free_result($result2);
echo '</SELECT>';
	echo'</TD>';
echo '</TR>';
echo '<TR>';
	echo '<TD><B>Encabezado:</B> </TD>';
	echo '<TD><INPUT TYPE="text" NAME="ti_men">';

	echo'</TD>';
echo '</TR>';
echo '<TR>';
	echo '<TD valign="top"><B>Mensaje:</B></TD>';
	echo '<TD><TEXTAREA NAME="mensaje" ROWS="10" COLS="50"></TEXTAREA></TD>';
echo '</TR>';
echo '</TABLE>';
echo '<CENTER><INPUT TYPE="submit" name="enviar" value="Enviar"></CENTER>';
echo '</FORM>';
}


//Ingresar mensaje para personal
if($modulo=="enviar"){
echo'<meta http-equiv="refresh" content="3;URL=mensajes.php?modulo=lectura2">';
echo'<a href="mensajes.php?modulo=lectura2"><< Regresar a Men�</a><br><br>';
echo '<CENTER>[ <B>Nuevo Mensaje Privado</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

$result=mysql_query("INSERT into mensajes_per (iden_men_per,ti_men_per,mens_men_per,fecha_men_per,ver_per,enviado_men_per)values('$para','$ti_men','$mensaje',now(),'0','$id_admin')",$link);


echo 'Mensaje enviado satisfactoriamente.';

	
}



}
else{
if($modulo=="lectura2") {
echo '<p>Lo sentimos no tienes los permisos necesarios para visualizar esta informaci�n.</p>';
if($num2 == "1")
{
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=adm') title='Acerca de la Cuenta Administrador'>Administrador</a>";
}

echo '<p><b>Tipo de Cuenta:</b><br><b>'.$cuenta.'</b></p>';

}
}




echo'</div>';

include('libreria/final.php');

?>
