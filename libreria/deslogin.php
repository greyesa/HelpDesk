<?php
session_start();
session_unset();
session_destroy();
?>
<?php
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
deslogin.php                    Dom/25/jul/2004
***********************************************/
include "../config.inc.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<?php
echo '<title>'.$titulop.'</title>';
?>
<meta http-equiv="refresh" content="2;URL=../index.php">
<style type="text/css">
BODY {
text-align: justify;
font-family: "Trebuchet MS", Arial, Geneva, san-serif;
}
</style>
</head>
<body bgcolor="#A88D3E">
<CENTER><p><B>Desconectando al Usuario del Sistema espero un momento por favor......</B></p></CENTER>
</BODY>
</HTML>
<? exit; ?>
