<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
reportes.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Reportes</h2>';


if($num2 == "1" || $num2 == "0" || $num2 == "2"){

//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	/*echo '<li><a href="reportes.php?modulo=departamento">Reporte por Departamento</a></li>';*/
	echo '<li><a href="reportes.php?modulo=personal">Reporte por Personal</a></li>';
echo '</ul>';
}
}

// Modulo para elegir 
if($modulo=="personal"){
echo'<a href="reportes.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Reporte por Personal</B> ]</CENTER><br>';


$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal order by nombre_personal", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Personal</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{
echo '<TR>';
	echo '<TD>';
	echo"<a href='reportes.php?modulo=fechas2&id_personal=".$row["id_personal"]."&nombre_personal=".$row["nombre_personal"]."'>";
	echo''.$row["nombre_personal"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';

}



//modulo elegir fechas para reportes
if($modulo=="fechas2"){
echo'<a href="reportes.php?modulo=personal"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Reporte por Personal</B> ]</CENTER><br>';

echo "<table border=0 width=80%><FORM name='sampleform' target='blank' METHOD=POST ACTION='reporte.php?modulo=personal'>";

echo '<INPUT TYPE="hidden" name="id_personal" value="'.$id_personal.'">';
echo '<INPUT TYPE="hidden" name="nombre_personal" value="'.$nombre_personal.'">';

echo "<tr><td><B>De que Fecha: </B></td><td><input type='text' name='firstinput' size='20'> <small><a href=javascript:showCal('Calendar1')>Selecciona 
fecha</a></small></td></tr>";
echo "<tr><td><B>A que Fecha:</B> </td><td><input type='text' name='secondinput' size='20'> <small><a href=javascript:showCal('Calendar2')>Selecciona 
fecha</a></small></td></tr>";

echo '</table><br><br><INPUT TYPE="submit" name="personal" value="Ver">';
echo '</FORM>';
}


//modulo elegir fechas para reportes
if($modulo=="fechas"){
echo'<a href="reportes.php?modulo=departamento"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Reporte por Departamento</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from registros where depa_orden='$id_depart' order by fecha_orden", $link2);
echo "<table border=0 width=80%><FORM name='sampleform' target='blank' METHOD=POST ACTION='reporte.php?modulo=departamento'>";
while ($row=mysql_fetch_array($result2))
{
echo '<INPUT TYPE="hidden" name="id_depart" value="'.$id_depart.'">';
echo '<INPUT TYPE="hidden" name="depart" value="'.$nombre_depart.'">';
echo '<INPUT TYPE="hidden" name="contacto_orden" value="'.$row["contacto_orden"].'">';
echo '<INPUT TYPE="hidden" name="asig_orden" value="'.$row["asig_orden"].'">';

}
mysql_free_result($result2);


echo "<tr><td><B>De que Fecha: </B></td><td><input type='text' name='firstinput' size='20'> <small><a href=javascript:showCal('Calendar1')>Selecciona 
fecha</a></small></td></tr>";
echo "<tr><td><B>A que Fecha:</B> </td><td><input type='text' name='secondinput' size='20'> <small><a href=javascript:showCal('Calendar2')>Selecciona 
fecha</a></small></td></tr>";

echo '</table><br><br><INPUT TYPE="submit" name="departamento" value="Ver">';
echo '</FORM>';
}




//modulo reporte por departamento
if($modulo=="departamento"){
echo'<a href="reportes.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Reporte por Departamento</B> ]</CENTER><br>';

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
	echo '<TD>';
	echo"<a href='reportes.php?modulo=fechas&id_depart=".$row["id_depart"]."&departamento=".$row["nombre_depart"]."'>";
	echo''.$row["nombre_depart"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';

}



echo'</div>';

include('libreria/final.php');

?>
