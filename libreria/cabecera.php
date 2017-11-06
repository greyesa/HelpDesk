<?php
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
cabecera.php                    Dom/25/jul/2004
***********************************************/
include "config.inc.php";

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>';

print '<link rel="shortcut icon" href="libreria/hds.ico">';
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
?>





<script LANGUAGE="JavaScript">

function Validar1(form)
{
  if (form.contacto_nom.value == "------------")
  { alert("Help Desk System:\n\n Por favor seleccione el Contacto"); form.contacto_nom.focus(); return; }

  if (form.categoria.value == "------------")
  { alert("Help Desk System:\n\n Por favor seleccione Categoria"); form.categoria.focus(); return; }

  if (form.asig_orden.value == "-----------------")
  { alert("Help Desk System:\n\n Por favor seleccione Personal Asignado"); form.asig_orden.focus(); return; }
 form.submit();
}

</script>


<script LANGUAGE="JavaScript">

function Validar2(form)
{
  if (form.contacto_nom.value == "------------")
  { alert("Help Desk System:\n\n Por favor seleccione el Contacto"); form.contacto_nom.focus(); return; }

  if (form.categoria.value == "------------")
  { alert("Help Desk System:\n\n Por favor seleccione Categoria"); form.categoria.focus(); return; }

  if (form.asig_orden.value == "-----------------")
  { alert("Help Desk System:\n\n Por favor seleccione Personal Asignado"); form.asig_orden.focus(); return; }
 

  if (form.fechaing.value == "0000-00-00 00:00:00")
  { alert("Help Desk System:\n\n Por favor ingrese una Fecha de Ingreso de Orden V&aacute;lida."); form.fechaing.focus(); return; }
 
  if (form.fechacierr.value == "0000-00-00 00:00:00")
  { alert("Help Desk System:\n\n Por favor ingrese Fecha de Cierre de Orden V&aacute;lida."); form.fechacierr.focus(); return; }


  form.submit();
}

</script>





<script language="javascript" src="libreria/cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>
<script language="javascript" src="libreria/cal_conf2.js"></script>

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


<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (reportes)
*/
function reportes(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=1,resizable=0,width=900,height=650,left = 50,top = 10');");
}
</script>


<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (calendario)
*/
function calendario(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=550,height=400,left = 150,top = 10');");
}
</script>

<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (nuevo contacto)
*/
function contacto(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=750,height=590,left = 150,top = 10');");
}
</script>

<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (departamento)
*/
function depa(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=750,height=590,left = 150,top = 10');");
}
</script>


<SCRIPT LANGUAGE="JavaScript">
/*
 Abre ventanas pop-up (ayuda,acerca de)
*/
function extra(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,directories=0,status=0,copyhistory=0,statusbar=0,menubar=0,resizable=0,width=850,height=500,left = 100,top = 10');");
}
</script>


<?php
echo'<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="libreria/CoffeeV4.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
@import url("libreria/CoffeeV5.css");
-->
</style>
</head>

<body>
<h1 title="'.$titulop.'">'.$titulop.'</h1><font size="2">&nbsp;&nbsp;<B>'.$titulo.'</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
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
	document.write("<font color='000000' face='Arial'><b>Fecha: "+ dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "</b></font>");

</script>

<?php

echo'<div id="login">
&nbsp;&nbsp;<b>Conectado: ['.$nombre_adm.']</b>';

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


echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tipo Cuenta:</b> <b>'.$cuenta.'</b>';



echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="libreria/deslogin.php"><<-- Desconectarse del Sistema</a>
</div>';



echo'</font>
<div id="menu">'; 


if($num2 == "1")
{
	echo'<ul>
<li><a href="index.php" title="P&aacute;gina de Bienvenida" accesskey="1">Bienvenida</a></li>
<li><a href="registros.php?modulo=tareas" title="Registros" accesskey="2">Registros</a></li>
<li><a href="contactos.php?modulo=menu" title="Contactos" accesskey="3">Contactos</a></li>
<li><a href="personal.php?modulo=menu" title="Personal" accesskey="4">Personal</a></li>
<li><a href="departamentos.php?modulo=menu" title="Departamentos" accesskey="5">Departamentos</a></li>
<li><a href="reportes.php?modulo=menu" title="Reportes" accesskey="6">Reportes</a></li>';
echo"<li><a href=javascript:calendario('calendario.php') title='Calendario' accesskey='7'>Calendario</a></li>";
echo'<li><a href="configuracion.php?modulo=menu" title="Configuraci&oacute;n" accesskey="8">Configuraci&oacute;n</a></li>';
echo"<li><a href=javascript:extra('ayuda.php') title='Ayuda de Help Desk System' accesskey='9'>Ayuda de...</a></li>";
echo"<li><a href=javascript:extra('controlgr.php') title='Acerca de Help Desk System' accesskey='10'>Acerca de...</a></li>";
echo'</ul>';
}
elseif($num2 == "2"){
	echo'<ul>
<li><a href="index.php" title="P&aacute;gina de Bienvenida" accesskey="1">Bienvenida</a></li>
<li><a href="registros.php?modulo=tareas" title="Registros" accesskey="2">Registros</a></li>
<li><a href="reportes.php?modulo=menu" title="Reportes" accesskey="6">Reportes</a></li>';
echo"<li><a href=javascript:calendario('calendario.php') title='Calendario' accesskey='7'>Calendario</a></li>";
echo"<li><a href=javascript:extra('ayuda.php') title='Ayuda de Help Desk System' accesskey='9'>Ayuda de...</a></li>";
echo"<li><a href=javascript:extra('controlgr.php') title='Acerca de Help Desk System' accesskey='10'>Acerca de...</a></li>";
echo'</ul>';
}

elseif($num2 == "0"){
echo'<ul>
<li><a href="index.php" title="P&aacute;gina de Bienvenida" accesskey="1">Bienvenida</a></li>
<li><a href="reportes.php?modulo=menu" title="Reportes" accesskey="6">Reportes</a></li>';
echo"<li><a href=javascript:calendario('calendario.php') title='Calendario' accesskey='7'>Calendario</a></li>";
echo"<li><a href=javascript:extra('ayuda.php') title='Ayuda de Help Desk System' accesskey='9'>Ayuda de...</a></li>";
echo"<li><a href=javascript:extra('controlgr.php') title='Acerca de Help Desk System' accesskey='10'>Acerca de...</a></li>";
echo'</ul>';
}

echo '<br>';

// C&oacute;digo escrito por Desarrollo web.

function UltimoDia($a,$m){
  if (((fmod($a,4)==0) and (fmod($a,100)!=0)) or (fmod($a,400)==0)) {
    $dias_febrero = 29;
  } else {
    $dias_febrero = 28; 
  }
  switch($m) {
    case  1: $valor = 31; break;
    case  2: $valor = $dias_febrero; break;
    case  3: $valor = 31; break;
    case  4: $valor = 30; break;
    case  5: $valor = 31; break;
    case  6: $valor = 30; break;
    case  7: $valor = 31; break;
    case  8: $valor = 31; break;
    case  9: $valor = 30; break;
    case 10: $valor = 31; break;
    case 11: $valor = 30; break;
    case 12: $valor = 31; break;
  }
  return $valor;
}

function nombre_mes($m){
  switch($m) {
    case  1: $valor = "Enero";		break;
    case  2: $valor = "Febrero";	break;
    case  3: $valor = "Marzo";		break;
    case  4: $valor = "Abril";		break;
    case  5: $valor = "Mayo";		break;
    case  6: $valor = "Junio";		break;
    case  7: $valor = "Julio";		break;
    case  8: $valor = "Agosto";		break;
    case  9: $valor = "Septiembre"; break;
    case 10: $valor = "Octubre";	break;
    case 11: $valor = "Noviembre";	break;
    case 12: $valor = "Diciembre";	break;
  }
  return $valor;
}

function numero_dia_semana($d,$m,$a){ 
  $f = getdate(mktime(0,0,0,$m,$d,$a)); 
  $d = $f["wday"];
  if ($d==0) {$d=7;}
  return $d;
} 

function nombre_dia_semana($d,$m,$a){ 
  $f = getdate(mktime(0,0,0,$m,$d,$a)); 
  switch($f["wday"]) {
    case 1: $valor = "Lunes";		break;
    case 2: $valor = "Martes";		break;
    case 3: $valor = "Mi&eacute;rcoles";	break;
    case 4: $valor = "Jueves";		break;
    case 5: $valor = "Viernes";		break;
    case 6: $valor = "S&aacute;bado";		break;
    case 0: $valor = "Domingo";		break;
  }
  return $valor;
}

$hoy = getdate();
$anhohoy = $hoy["year"];
$meshoy  = $hoy["mon"];
$diahoy  = $hoy["mday"];

$anho = $_REQUEST["anho"];
$mes  = $_REQUEST["mes"];
$dia  = 1;
if (($anho==0)||($mes==0)){
  $anho=$anhohoy;
  $mes =$meshoy;
}
$dias_mes = UltimoDia($anho,$mes);
$NombreMes = nombre_mes($mes);
$NumeroSemanas = ceil(($dias_mes+(numero_dia_semana($dia,$mes,$anho)-1))/7);
if ($mes==1) {
  $anhoant = $anho-1;
  $mesant = 12;
  $anhosig = $anho;
  $messig = $mes+1;
} else if ($mes==12) {
  $anhoant = $anho;
  $mesant = $mes-1;
  $anhosig = $anho+1;
  $messig = 1;
} else {
  $anhoant = $anho;
  $mesant = $mes-1;
  $anhosig = $anho;
  $messig = $mes+1;
}
$anhoanterior  = $anho-1;
$anhosiguiente = $anho+1;

echo "<form method='post' name='calendario' action='calendario.php'>";
echo "<table border='0' width='100%'>";
echo "<tr>";
echo "<td align='center' bgcolor='#CFBB7E' width='14%'>";
echo "<font color='#333300'><a href=".$PHP_SELF."?anho=".$anhoanterior."&mes=".$mes."><<</a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='15%'>";
echo "<font color='#333300'><a href=".$PHP_SELF."?anho=".$anhoant."&mes=".$mesant."><</a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' colspan='3' width='43%'>";
echo "<font color='#333300'><b>".$NombreMes."<br>( ".$anho." )</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='14%'>";
echo "<font color='#333300'><a href=".$PHP_SELF."?anho=".$anhosig."&mes=".$messig.">></a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='14%'>";
echo "<font color='#333300'><a href=".$PHP_SELF."?anho=".$anhosiguiente."&mes=".$mes.">>></a></font>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center' bgcolor='#A88D3E' width='14%'>";
echo "<font color='white'><b>L</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='15%'>";
echo "<font color='white'><b>M</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='15%'>";
echo "<font color='white'><b>M</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='14%'>";
echo "<font color='white'><b>J</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='14%'>";
echo "<font color='white'><b>V</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='14%'>";
echo "<font color='white'><b>S</b></font>";
echo "</td>";
echo "<td align='center' bgcolor='#A88D3E' width='14%'>";
echo "<font color='white'><b>D</b></font>";
echo "</td>";
echo "</tr>";
for ($semana=1;$semana<=$NumeroSemanas;$semana++){
  echo "<tr>";
  for ($diasem=1;$diasem<=7;$diasem++){ 
    $dow = numero_dia_semana($dia,$mes,$anho);
	if (($dow==2)||($dow==3)) {$ancho='15%';} else {$ancho='14%';}
	if (($dow==6)||($dow==7)) {$color='#333300';} else {$color='#333300';}
    if ($anho*10000+$mes*100+$dia==$anhohoy*10000+$meshoy*100+$diahoy) {$colorfondo='#A88D3E';} else {$colorfondo='#CFBB7E';}	
	if (($dow==$diasem) && ($dia<=$dias_mes)) {
	  $valor = $dia;
	  $dia++;
	} else {
	  $valor = "&nbsp;";
	}
	echo "<td align='right' bgcolor=$colorfondo width=$ancho>";
    echo "<font color=$color size='2'><b>$valor</b></font>";
    echo "</td>";
  } 
  echo "</tr>";
}
echo "<tr>";
echo "<td align='center' colspan='7'>";
echo "<font color='#000000'>";
echo "<b>Hoy, ".nombre_dia_semana($diahoy,$meshoy,$anhohoy)." ".$diahoy." de <BR>".nombre_mes($meshoy)." del ".$anhohoy."</b>";
echo "</font>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";



echo'</div>';

?>
