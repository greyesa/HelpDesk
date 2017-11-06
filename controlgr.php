<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
controlgr.php                   Dom/25/jul/2004
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
	padding: 2em 5em 2em 2em;
	background: #FFF8EF;
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
<!--

function imprimir() {
  if (window.print)
    window.print()
  else
    alert("Disculpe, su navegador no soporta esta opci&oacute;n.");
}

// -->
</SCRIPT>
<?php
echo'</head>';
?>

<body  bgcolor="#A88D3E">

<?php
if($num2 == "1" || $num2 == "0" || $num2 == "2"){

echo'<div id="content">';
echo'<center><A HREF=javascript:imprimir()><img src=libreria/imprimir.gif border=0 alt=Imprimir> Imprimir P&aacute;gina</A></center>';

echo'<CENTER>[<a href="javascript:window.close();">Cerrar esta ventana</a>]</CENTER><br>';

echo'<h2 title="Content">Acerca de '.$titulop.'</h2>

<p><b>'.$titulop.' &copy;2008 Luis Arriaza y Jose C. Morataya</b></p>';

echo ''.$version.'<br><br>';
/*echo '<b>Diseñadores y Desarrolladores Web';
echo "<b>Control-Code</b>, es una herramienta que simplificando la vida y compartiendo conocimientos<br> Desarrollando ideas, con l&iacute;nea de Software Libre</em><br><br>";*/

}
echo'</div>';

echo'</body></html>';

?>
