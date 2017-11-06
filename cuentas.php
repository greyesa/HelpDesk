<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
cuentas.php                       Dom/25/jul/2004
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
echo'</head>';
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

<body  bgcolor="#A88D3E">

<?php
if($num2 == "1" || $num2 == "0" || $num2 == "2"){

echo'<div id="content">';
echo'<CENTER>[<a href="javascript:window.close();">Cerrar esta ventana</a>]</CENTER><br>';
echo'<h2 title="Content">Cuentas en '.$titulop.'</h2>';

if($modulo=="adm"){

echo 'Usted tiene cuenta de <b>Administrador</b>. Esta cuenta le permite tener acceso total al sistema.';

}

if($modulo=="us"){
echo 'Usted tiene cuenta de <b>Usuario</b>. Su acceso es restringido para ciertos modulos, solamente tiene acceso al sistema de reportes.';


}

if($modulo=="usav"){
echo 'Usted tiene cuenta de <b>Usuario Avanzado</b>. Su acceso es restringido para ciertos modulos, solamente tiene acceso al sistema de reportes y registros.';


}


}
echo'</div>';

echo'</body></html>';


?>
