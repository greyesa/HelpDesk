<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
ayuda.php                       Dom/25/jul/2004
***********************************************/


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
<?
?>

<body  bgcolor="#A88D3E">

<?php
if($num2 == "1" || $num2 == "0" || $num2 == "2"){

echo'<div id="content">';
echo'<center><A HREF=javascript:imprimir()><img src=libreria/imprimir.gif border=0 alt=Imprimir> Imprimir P&aacute;gina</A></center>';
echo'<CENTER>[<a href="javascript:window.close();">Cerrar esta ventana</a>]</CENTER><br>';
echo'<h2 title="Content">Ayuda para '.$titulop.'</h2>


<b>Indice</b><br><br>
<ul>
	<li>Introducci&oacute;n</li>
	<li>Ingreso al Sistema</li>
	<li>Men&uacute; de Trabajo</li>
	<li>Como empezar a trabajar con el Sistema</li>
	<li>Modulo Departamentos</li>	
	<li>Modulo Personal</li>
	<li>Modulo Contactos</li>
	<li>Modulo Registros</li>
	<li>Modulo Reportes</li>
	<li>Modulo Configuraci&oacute;n</li>
	<li>Modulo Calendario</li>
	<li>Modulo Ayuda de</li>
	<li>Modulo Acerca de</li>
</ul>


<b><U>Introducci&oacute;n</U></b><br>
	'.$titulop.' es una manera f&aacute;cil de mantener control sobre ciertos reportes que son necesarios en Centros de Atenci&oacute;n al Cliente u otros Departamentos que lo requiera. <br><br>
	
Usted podr&aacute;:<br>

    <ul>
     	<li> Ingresar Registros por Departamento.</li>
     <li>Ordenar los Registros adecuadamente seg&uacute;n la fecha.</li>
     <li>Visualizar detalladamente los Reportes.</li>
     <li>Imprimir Reportes.</li>
     <li>Exportar los Reportes.</li>
     	
  </ul>


<b>Requerimientos:</b><br>
Este sistema esta orientado a trabajar en cualquier plataforma Windows incluso Linux.<br><br>


- * PHP 4, PHP 5<br>
- * MySQL 3.23.X o superior<br>
- * Servidor web puede ser:<br>
        &nbsp;&nbsp;&nbsp;&nbsp;Apache 1.3.X<br>
        &nbsp;&nbsp;&nbsp;&nbsp;Apache 2.0.X<br>
        &nbsp;&nbsp;&nbsp;&nbsp;IIS/Personal Web Server<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Xitami<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Internet Information Server<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Netscape Enterprise Server, iPlanet<br>
- * Un navegador puede ser:<br>
        &nbsp;&nbsp;&nbsp;&nbsp;Mozilla<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Netscape<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Opera<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Internet Explorer <br><br>


<b><U>Trabajando con el Sistema</U></b><br>
	Al usted comenzar con el sistema se le pedir&aacute; que se realice un login, el administrador del sistema habilita las cuentas, dependiendo de esto el tiene la opci&oacute;n de dar permisos para cada cuenta, esto lo veremos m&aacute;s adelante en Configuraciones.<br><br>

<center><img src="img/16.JPG" width="400" height="300" border="0" alt=""></center><br><br>



<b><U>Men&uacute; de Trabajo</U></b><br>
	El Men&uacute; principal de trabajo consta de 10 enlaces r&aacute;pidos a los m&oacute;dulos como usted puede ver en la siguiente imagen: <br><br>
<CENTER><IMG SRC="img/0.JPG" WIDTH="221" HEIGHT="328" BORDER="0" ALT=""> </CENTER>

Encontramos:<br>
	<B>- Bienvenida:</B> Aqu&iacute; usted navega a la p&aacute;gina Principal de Bienvenida del sistema.<br><br>
	<B>- Contactos:</B> Aqu&iacute; usted ingresa al modulo de Contactos donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Personal:</B> Aqu&iacute; usted ingresa al modulo de Personal donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Departamentos:</B> Aqu&iacute; usted ingresa al modulo de Departamentos donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Registros:</B> Aqu&iacute; usted ingresa al modulo de Registros donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Reportes:</B> Aqu&iacute; usted ingresa al modulo de Reportes donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Calendario:</B> Aqu&iacute; usted ingresa al modulo de Calendario donde podr&aacute; manipular datos de los mismos. Es una ventana emergente.<br><br>
	<B>- Configuraci&oacute;n:</B> Aqu&iacute; usted ingresa al modulo de Configuraci&oacute;n donde podr&aacute; manipular datos de los mismos.<br><br>
	<B>- Ayuda de:</B> Aqu&iacute; usted ingresa al modulo de Ayuda de donde podr&aacute; ver informaci&oacute;n de ayuda para el Sistema. Es una ventana emergente.<br><br>
	<B>- Acerca de:</B> Aqu&iacute; usted ingresa al modulo de Acerca de donde podr&aacute; ver informaci&oacute;n acerca del Sistema. Es una ventana emergente.<br><br>

<b><U>Como empezar a trabajar con el Sistema</U></b><br>
<p>Para iniciar es necesario realizar una base de datos de los Departamentos a utilizar, para esto vaya al modulo Departamentos y empiece a formar su base de datos.</p>


<B><U>Modulo Departamentos</U></B><br>
	<p>En este modulo usted ingresa los departamentos que utilizar&aacute; para iniciar l&oacute;gicamente deber&aacute; trabajar en este modulo podr&aacute; ingresar toda la informaci&oacute;n necesaria para identificar a cada departamento. En este modulo usted podr&aacute; ingresar nuevos departamentos, editarlos, visualizarlos y eliminarlos.</p>

<CENTER><IMG SRC="img/4.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>


<B><U>Modulo Personal</U></B><br>
<P>El Personal ser&aacute;n las personas que trabajan actualmente en su departamento. A estos se le asignar&aacute;n las ordenes. Usted deber&aacute; para esto dirigirse al modulo de Personal e ingresar usuarios que en este caso podr&iacute;an ser T&eacute;cnicos.</P>

<P>A la hora de ingresar usuarios en el modulo de Personal se le pedir&aacute; el nombre de dicha persona y usted le asignar&aacute; un c&oacute;digo personal, por el cual usted lo identificar&aacute;, sin embargo el sistema genera autom&aacute;ticamente un c&oacute;digo de identificaci&oacute;n para el control del mismo.</P>

<p><B>Ejemplo:</B><br>
Nombre: Juan P&eacute;rez<br>
C&oacute;digo Personal: JP<br>
C&oacute;digo del Sistema: T1</p>

<CENTER><IMG SRC="img/2.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo '<U><B>Modulo Contactos</B></U><br>';
echo '<p>Los Contactos ser&aacute;n las personas que son encargadas en primera instancia de cada departamento, si en tal caso no hay un contacto como podr&iacute;a ser una secretaria o director, entonces se tomar&aacute; la persona encargada de dicho departamento cuando este se ingreso. </p>';

echo '<CENTER><IMG SRC="img/1.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo '<U><B>Modulo Registros</B></U><br>';
echo '<p>Usted cuando ingrese a este modulo tendr&aacute; dos opciones la primera Ingresar Nueva Orden, la segunda Tareas Pendientes.</p>';

echo '<CENTER><IMG SRC="img/6.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo 'Explicamos:<br>';
echo '- <B>Ingresar Nueva Orden:</B> Ser&aacute; donde ingresemos nuestras ordenes o pedidos.<br>';
echo '- <B>Tareas Pendientes:</B> Ser&aacute; donde visualizaremos las tareas que tenemos pendientes.<br><br>';

echo '<B>Ingresar Nueva Orden</B><br>';
echo 'Cuando queramos ingresar una nueva orden nos pedir&aacute; que identifiquemos primero el departamento, si en tal caso el departamento no exista solamente clickea en el enlace que dice <I><U>"Pulsando Aqu&iacute;"</U></I> Aqu&iacute; se abrir&aacute; una ventana emergente donde podr&aacute;s ingresar el nuevo departamento. Cuando cierres esta ventana la otra ser&aacute; refrescada para que aparezca el nuevo departamento. Esto deber&aacute;s hacerlo clickeando en el enlace que dice <I><U>"[Cerrar esta ventana]"</U></I><br><br>';

echo '<CENTER><IMG SRC="img/8.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';


echo'Al tenerlo listo nos mandar&aacute; al formulario de ingreso de departamento, Aqu&iacute; deber&aacute;s ingresar los datos que se te piden.<br><br>';
echo '<CENTER><IMG SRC="img/5.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo 'Si en tal caso quieres ingresar un nuevo contacto simplemente clickea en el enlace que dice <U><I>"Nuevo"</I></U> y despu&eacute;s de haberlo ingresado pulsa en <U><I>"[Cierra esta ventana]"</I></U> para que la ventana anterior sea refrescada con los nuevos cambios.<br><br>';

echo '<CENTER><IMG SRC="img/7.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';


echo 'Cuando se halla completado el formulario de la orden presione <I>Ingresar</I>, a continuaci&oacute;n lo mandar&aacute; a una nueva p&aacute;gina donde podr&aacute; visualizar la orden, esto por si quiere realizar alg&uacute;n cambio a dicha orden, si la orden esta correcta pulse el bot&oacute;n <I>Ingresar</I> y la orden ser&aacute; ingresada.<br><br>';

echo '<CENTER><IMG SRC="img/9.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo '<B>Tareas Pendientes</B><br>';
echo 'Aqu&iacute; usted podr&aacute; visualizar las tareas que est&aacute;n pendientes con cuesti&oacute;n a las ordenes, solo se ver&aacute;n las ordenes con estado de <U><I>Proceso</I></U>.<br><br>';

echo '<CENTER><IMG SRC="img/10.JPG" WIDTH="400" HEIGHT="215" BORDER="0" ALT=""></CENTER><br><br>';


echo 'Usted cuando seleccione una cuenta ver&aacute; toda su informaci&oacute;n, adem&aacute;s en ese momento podr&aacute; cerrar esa orden. Solo debe presionar el bot&oacute;n <U><I>Cerrar Orden</I></U>, y la orden ser&aacute; cerrada para la fecha de ese momento.<br><br>';

echo '<CENTER><IMG SRC="img/11.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';


echo '<U><B>Modulo Reportes</B></U><br>';
echo 'Usted cuando ingrese a este modulo tendr&aacute; dos opciones la primera Reporte por Departamento, la segunda Reporte por Personal.<br><br>';

echo 'Para las dos opciones simplemente debes elegir el rango de fechas que deseas ver.<br><br>';

echo '<CENTER><IMG SRC="img/17.jpg" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo 'Cuando presiones el bot&oacute;n Ver se abrir&aacute; una ventana emergente donde podr&aacute;s ver la plantilla con toda la informaci&oacute;n requerida. Esta versi&oacute;n de la plantilla es imprimible.<br><br>';

echo '<CENTER><IMG SRC="img/19.jpg" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><br><br>';

echo '<U><B>Modulo de Configuraci&oacute;n</B></U><br>';
echo 'En este modulo podr&aacute;s trabajar con usuarios del sistema, podr&aacute;s manipular sus datos y privilegios.<br><br> - Nuevo Usuario<br>- Editar Usuario<br> - Lectura de Usuario<br><br>';

echo 'Simplemente te pide un nombre o nick de ingreso, una contrase\F1a el correo electr&oacute;nico, y el privilegio, Aqu&iacute; te mostramos los tipos de privilegios que hay para los usuarios del sistema.<br><br>';

echo '- <B>Administrador:</B> <br> Es la persona o personas que administran el sistema. <br><br> - <B>Usuario Avanzado:</B> <br> Es la persona que simplemente tiene acceso a Registros y Reportes.<br><br> - <B>Usuario:</B> <br>Esta persona tiene privilegios solamente para visualizar reportes.<br><br>';

echo '<CENTER><IMG SRC="img/13.JPG" WIDTH="400" HEIGHT="135" BORDER="0" ALT=""></CENTER><BR><BR>';

echo '<U><B>Modulo de Calendario</B></U><br>';
echo 'Aqu&iacute; se abrir&aacute; una ventana emergente que mostrar&aacute; un calendario, donde podr&aacute;s tambi&eacute;n ver otros meses del a\F1o.<br><br>';
echo '<CENTER><IMG SRC="img/12.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><BR><BR>';

echo '<U><B>Modulo de Ayuda de</B></U><br>';
echo 'Aqu&iacute; se abrir&aacute; una ventana emergente que mostrar&aacute; esta Ayuda.<br><br>';
echo '<CENTER><IMG SRC="img/14.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><BR><BR>';

echo '<U><B>Modulo de Acerca de</B></U><br>';
echo 'Aqu&iacute; se abrir&aacute; una ventana emergente que mostrar&aacute; informaci&oacute;n Acerca de Help Desk System.<br><br>';
echo '<CENTER><IMG SRC="img/15.JPG" WIDTH="400" HEIGHT="300" BORDER="0" ALT=""></CENTER><BR><BR>';

}
echo'</div>';

echo'</body></html>';


?>
