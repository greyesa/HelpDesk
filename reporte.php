<?php
include 'libreria/sesion.php';

/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012.
reporte.php                     Dom/25/jul/2004
***********************************************/


echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<title>Sistema de Help Desk</title>';
 ?>
<style type="text/css">
 
/* For printview */
body  {font-family: "Trebuchet MS", Arial, Geneva, san-serif; font-size: 10px; color: #000000; background-color: #ffffff}
h1    {font-family: "Trebuchet MS", Arial, Geneva, san-serif; font-size: 10px; font-weight: bold}
table {border-width:1px; border-color:#000000; border-style:solid; border-collapse:collapse; border-spacing:0}
th    {font-family: "Trebuchet MS", Arial, Geneva, san-serif; font-size: 10px; font-weight: bold; color: #000000; background-color: #ffffff; border-width:1px; border-color:#000000; border-style:solid; padding:2px}
td    {font-family: "Trebuchet MS", Arial, Geneva, san-serif; font-size: 10px; color: #000000; background-color: #ffffff; border-width:1px; border-color:#000000; border-style:solid; padding:2px}

</style>
<?php
echo'</head>';
?>
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function printPage() {
if (window.print) {
agree = confirm('Sistema de Help Desk \n\n ¿Deseas imprimir esta pagina de reportes?');
if (agree) window.print(); 
   }
}
//  End -->
</script>
<?php
?>

<body OnLoad="printPage()" bgcolor="#ffffff">

<?php
if($num2 == "1" || $num2 == "0" || $num2 == "2"){

echo'<div id="content">';
echo'<h2 title="Content">Sistema de Help Desk </h2>';

echo ''.$version.'<br>';
echo ''.$reporte.'<br>';


	?>
<script>
	var mydate=new Date();
	var year=mydate.getYear();
	if (year < 1000)
		year+=1900;
	var day=mydate.getDay();
	var month=mydate.getMonth();
	var daym=mydate.getDate();
	if (daym<10)
		daym="0"+daym;

	var dayarray=new Array("domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes","s&aacute;bado");
	var montharray=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	document.write("Fecha de Impresi&oacute;n: "+ dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "");

</script><br>

<?php

//Modulo para imprimir por departamento
if($modulo=="departamento"){

echo 'Departamento: '.$nombre_depart.'<br>';
echo 'De la Fecha: '.$firstinput.' A la Fecha: '.$secondinput.'<br><br>';

echo '<TABLE border="0" width="100%">
<TR>
	<TH>Orden</TH>
	<TH>Fecha de Ingreso</TH>
	<TH>Fecha de Cierre</TH>
	<TH>Estado</TH>
	<TH>Prioridad</TH>
	<TH>Problema</TH>
	<TH>Solucion</TH>
	<TH>Observaciones</TH>
	<TH>Contacto</TH>
</TR>';


$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from registros where (asig_orden='$id_personal') and (fecha_orden>='$firstinput' and fecha_orden<='$secondinput') ", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>';
echo'<TD><CENTER>'.$row["id_registro"].'</CENTER></TD>
<TD><CENTER>'.$row["fecha_orden"].'</CENTER></TD>
	<TD><CENTER>'.$row["fecha_cierra"].'</CENTER></TD>';

echo'	<TD><CENTER>'.$row["status_orden"].'</CENTER></TD>
	<TD><CENTER>'.$row["prioridad"].'</CENTER></TD>
<TD>'.$row["numero_pc_orden"].'</TD>
<TD>'.$row["problema_orden"].'</TD>';

$contacto = $row["contacto_orden"];
$asig = $row["asig_orden"];


$result2=mysql_query("select * from contactos where id_contacto='$contacto'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo'	<TD><CENTER>'.$row["contact_nom"].'</CENTER></TD>';
}
mysql_free_result($result2);




}
mysql_free_result($result1);

echo'</TR>

</TABLE>';

}



//Modulo para imprimir por personal
if($modulo=="personal"){

echo 'Nombre de Personal: '.$nombre_personal.'<br>';
echo 'De la Fecha: '.$firstinput.' A la Fecha: '.$secondinput.'<br><br>';

echo '<TABLE border="0" width="100%">
<TR>
	<TH>Orden</TH>
	<TH>Fecha de Ingreso</TH>
	<TH>Fecha de Cierre</TH>
	<TH>Estado</TH>
	<TH>Prioridad</TH>
	<TH>Problema</TH>
	<TH>Solucion</TH>
	<TH>Observaciones</TH>
	<TH>Contacto</TH>

</TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from registros where (asig_orden='$id_personal') and (fecha_orden>='$firstinput' and fecha_orden<='$secondinput') ", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>';
echo'<TD><CENTER>'.$row["id_registro"].'</CENTER></TD>
<TD><CENTER>'.$row["fecha_orden"].'</CENTER></TD>
	<TD><CENTER>'.$row["fecha_cierra"].'</CENTER></TD>';

echo'	<TD><CENTER>'.$row["status_orden"].'</CENTER></TD>
	<TD><CENTER>'.$row["prioridad"].'</CENTER></TD>
<TD>'.$row["problema_orden"].'</TD>
<TD>'.$row["solucion_orden"].'</TD>
<TD>'.$row["numero_pc_orden"].'</TD>';

$contacto = $row["contacto_orden"];
$asig = $row["asig_orden"];


$result2=mysql_query("select * from contactos where id_contacto='$contacto'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo'	<TD><CENTER>'.$row["contact_nom"].'</CENTER></TD>';
}
mysql_free_result($result2);




}
mysql_free_result($result1);

echo'</TR>

</TABLE>';

}


}
echo'</div>';

echo'</body></html>';


?>
