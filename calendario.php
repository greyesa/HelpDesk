<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
calendario.php                  Dom/25/jul/2004
***********************************************/

include "config.inc.php";

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<title>'.$titulop.'</title>';

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
echo'</head>

<body bgcolor="#A88D3E">';
if($num2 == "1" || $num2 == "0" || $num2 == "2"){
echo'<div id="content">';
// Código escrito por Desarrollo web.

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
    case 3: $valor = "Miércoles";	break;
    case 4: $valor = "Jueves";		break;
    case 5: $valor = "Viernes";		break;
    case 6: $valor = "Sábado";		break;
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
echo "<font color='#333300'><a href=./calendario.php?anho=".$anhoanterior."&mes=".$mes."><<</a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='15%'>";
echo "<font color='#333300'><a href=./calendario.php?anho=".$anhoant."&mes=".$mesant."><</a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' colspan='3' width='43%'>";
echo "<font color='#333300'>".$NombreMes."<br>( ".$anho." )</font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='14%'>";
echo "<font color='#333300'><a href=./calendario.php?anho=".$anhosig."&mes=".$messig.">></a></font>";
echo "</td>";
echo "<td align='center' bgcolor='#CFBB7E' width='14%'>";
echo "<font color='#333300'><a href=./calendario.php?anho=".$anhosiguiente."&mes=".$mes.">>></a></font>";
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
echo "<b>Hoy, ".nombre_dia_semana($diahoy,$meshoy,$anhohoy)." ".$diahoy." de ".nombre_mes($meshoy)." del ".$anhohoy."</b>";
echo "</font>";
echo '<br><br><center><a href=javascript:window.close();>[ Cerrar ventana ]</a></center>';
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}
echo '</div>';
echo'</body></html>';

?>
