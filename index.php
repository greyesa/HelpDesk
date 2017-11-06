<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
index.php                       Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Bienvenido a '.$titulop.'</h2>

<p>'.$titulop.' es una manera f&aacute;cil de mantener control sobre ciertos reportes que son necesarios en Centros de Atenci&oacute;n al Cliente u otros Departamentos que lo requiera.</p><br>


<CENTER><IMG SRC="img/20.jpg" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER>

<p>Usted podr&aacute;:</p>

<ul>
	<li>Ingresar Registros por Departamento.</li>
	<li>Ordenar los Registros adecuadamente seg&uacute;n la fecha.</li>
	<li>Visualizar detalladamente los Reportes.</li>
	<li>Imprimir Reportes.</li>
	<li>Exportar los Reportes.</li>
</ul>


<p>Lo invitamos a relacionarse con '.$titulop.' y mantenga el control de sus registros para Atenci&oacute;n al Cliente.</p>

</div>';

include('libreria/final.php');

?>
