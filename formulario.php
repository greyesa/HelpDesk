<?php
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
formulario.php                  Dom/25/jul/2004
***********************************************/
include "config.inc.php";

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>';

echo     '<META HTTP-EQUIV="Expires" CONTENT="0">';
print " \n";
echo     '<META HTTP-EQUIV="Pragma" CONTENT="no-cache">';
print " \n";
echo     '<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">';
print " \n";
echo     '<META HTTP-EQUIV="Content-Transfer-Encoding" CONTENT="8bit">';
print " \n";
echo     '<META NAME="title" content="'.$titulop.'">';
print " \n";
echo     '<meta http-equiv="Content-Language" content="es">';
print " \n";
echo     '<META NAME="robots" content="all">';
print " \n";
echo     '<META NAME="distribution" content="global">';
print " \n";
echo     '<META NAME="CHANGEDBY" CONTENT="'.$titulop.'">';
print " \n";
echo     '<meta name="author" content="Gustavo Reyes">';
print " \n";
echo     '<meta name="generator" content="Bluefish 1.0.4">';
print " \n";
echo     '<META NAME="CLASSIFICATION" CONTENT="'.$titulop.'">';
print " \n";
echo     '<META NAME="DESCRIPTION" CONTENT="'.$titulop.'">';
print " \n";
echo     '<META NAME="KEYWORDS" CONTENT="'.$titulop.'">';
print " \n";

echo'<title>'.$titulop.'</title>
<script type="text/javascript">
<!--
function MM_reloadPage(init) {  
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>';

echo'<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="libreria/CoffeeV4.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
@import url("libreria/CoffeeV5.css");
-->
</style>
</head>

<body>';
echo '<h1 title="Logo Image">'.$titulop.' </h1>';


echo'<div id="menu">';
echo '</div>';


echo'<div id="content">
<h2 title="Content">'.$titulop.'</h2>';

echo '<br><center><form method=post action="index.php">';

echo '<p>Para ingresar al sistema es necesario que usted se autentice. Por favor ingrese los datos que se requieren para dicho proceso.</p>';


echo '<p><table border="0" width="90%" >
<tr>
	<td><b>Nombre de usuario:</b></td>
	<td><b><input type=text size=12 name=nombre_adm></b></td>
</tr>
<tr>
	<td><b>Contrase&ntilde;a de usuario:</b></td>
	<td><input type=password size=12 name=contrasena_adm></td>
</tr>
</table>';


echo '<br><INPUT TYPE="submit" name="ingresar" value="Ingresar">';
echo '</form></p></center>';

if($nombre_adm){
	echo '<font color="#CE272A" size="2">Hubo un error con su nombre de usuario. Intente de nuevo o mas tarde.</font><BR>';
}
if($contraseña_adm){
	echo '<font color="#CE272A" size="2">Hubo un error con su contraseña de usuario. Intente de nuevo o mas tarde.</font>';
}

echo'</div>';

/*echo '<div id="footer">
<p><b>'.$titulop.'</b> -  parte del Grupo de Software Libre POC - <a href="http://www.poccms.com" target="_blank">www.poccms.com</a> <br><b>Todos los derechos reservados (C)2004 Gustavo Reyes</b><br>';

ob_start(); 
$despues = 212; // N&uacute;mero de bytes despu&eacute;s de echo round((( ....
echo '<font face="verdana,helvetica" color="#000000" size="1">Peso de esta p&aacute;gina: ';
echo round(((ob_get_length()+$despues)/1024)*100)/100;
echo 'kb<BR>';
ob_end_flush();

$ftime = gettimeofday();
$time = round(($ftime[sec]+$ftime[usec]/1000000)-($stime[sec]+$stime[usec]/1000000),5);
echo 'Generador: '.$titulop.' Tiempo: '.$time.' segundos.';*/


echo '</font></p>';

echo'</div>
</body>
</html>';

?>
