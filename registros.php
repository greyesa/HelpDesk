<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
registros.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Registros</h2>';
if($num2 == "1" || $num2 == "2"){

//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	echo '<li><a href="registros.php?modulo=elegir">Ingresar Nueva Orden.</a></li>';
	echo '<li><a href="registros.php?modulo=tareas">Tareas Pendientes.</a></li>';
echo '</ul>';
}



//Modulo ver2
if($modulo=="ver2"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Ver todas las Ordenes</B> ]</CENTER><br>';

echo 'De la Fecha: '.$firstinput.' A la Fecha: '.$secondinput.'<br><br>';
echo '<TABLE border="0" width="95%">
<TR>
	<TD><font size="1"><CENTER><B>Orden</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Ingreso</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Cierre</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Estado</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Prioridad</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Problema</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Departamento</B></CENTER></font></TD>
	<TD><font size="1"><CENTER><B>Asignado</B></CENTER></font></TD>
</TR>';


$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from registros where fecha_orden>='$firstinput' and fecha_orden<='$secondinput'", $link2);
while ($row=mysql_fetch_array($result1))
{

echo'<TR>';
echo'<TD><font size="1"><CENTER>'.$row["id_registro"].'</CENTER></font></TD>
<TD><font size="1"><CENTER>'.$row["fecha_orden"].'</CENTER></font></TD>
	<TD><font size="1"><CENTER>'.$row["fecha_cierra"].'</CENTER></font></TD>';

echo'	<TD><font size="1"><CENTER>'.$row["status_orden"].'</CENTER></font></TD>
	<TD><font size="1"><CENTER>'.$row["prioridad"].'</CENTER></font></TD>
<TD><font size="1">'.$row["problema_orden"].'</font></TD>';

$depa_orden = $row["depa_orden"];
$asig = $row["asig_orden"];




$result2=mysql_query("select * from departamento where id_depart='$depa_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo'	<TD><font size="1"><CENTER>'.$row["nombre_depart"].'</CENTER></font></TD>';
}
mysql_free_result($result2);

$result3=mysql_query("select * from personal where id_personal='$asig'", $link2);
while ($row=mysql_fetch_array($result3))
{
echo'	<TD><font size="1"><CENTER>'.$row["codigo_asig"].'</CENTER></font></TD>';
}
mysql_free_result($result3);

echo'</TR>';
}
mysql_free_result($result1);

echo'</TABLE>';
}


//Modulo ver 
if($modulo=="ver"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Ver todas las Ordenes</B> ]</CENTER><br>';

echo "<table border=0 width=80%><FORM name='sampleform' METHOD=POST ACTION='registros.php?modulo=ver2'>";

echo "<tr><td><B>De que Fecha: </B></td><td><input type='text' name='firstinput' size='20'> <small><a href=javascript:showCal('Calendar1')>Selecciona 
fecha</a></small></td></tr>";
echo "<tr><td><B>A que Fecha:</B> </td><td><input type='text' name='secondinput' size='20'> <small><a href=javascript:showCal('Calendar2')>Selecciona 
fecha</a></small></td></tr>";

echo '</table><br><br><INPUT TYPE="submit" name="ver2" value="Ver">';
echo '</FORM>';

}





//Modulo buscar orden
if($modulo=="buscar2"){
echo'<a href="registros.php?modulo=buscar"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Buscar Orden</B> ]</CENTER><br>';


$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2);
$result=mysql_query("select * from registros WHERE id_registro='$orden'", $link2) or die ('No hay nada relacionado a lo que ingreso.');

while ($row=mysql_fetch_array($result))
{


echo '<TABLE border="0" width="95%">
<TR>
	<TD><B>No. de Orden</B></TD>
	<TD>'.$row["id_registro"].'</TD>
</TR>
<TR>
	<TD><B>Fecha de Orden:</B></TD>
	<TD>'.$row["fecha_orden"].'</TD>
</TR>
<TR>
	<TD><B>Estado:</B></TD>
	<TD>'.$row["status_orden"].'</TD>
</TR>
<TR>
	<TD><B>Departamento:</B></TD>';

$depart=$row["depa_orden"];

$result3=mysql_query("select * from departamento where id_depart='$depart'", $link2);
while ($row=mysql_fetch_array($result3))
{
echo'	<TD>'.$row["nombre_depart"].'</TD>';
}
mysql_free_result($result3);
echo'</TR>
</TABLE>';
}
mysql_free_result($result);
}




//modulo buscar registro
if($modulo=="buscar"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Buscar Orden</B> ]</CENTER><br>';

echo 'Por favor ingresa el No. de Orden a Buscar.<br><br>';

echo '<FORM METHOD=POST ACTION="registros.php?modulo=buscar2">';
echo '<B>No. de Orden:</B> <INPUT TYPE="text" NAME="orden"><br><br>';
echo '<INPUT TYPE="submit" name="buscar2" value="Buscar">';
echo '</FORM>';

}





//modulo editar
if($modulo=="editar"){
echo'<meta http-equiv="refresh" content="5;URL=registros.php?modulo=tareas">';
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Cerrar Orden</B> ]</CENTER><br>';

echo 'La Orden fue cerrada satisfactoriamente para el d&iacute;a de Hoy. Ser&aacute;s redireccionado al menu de tareas en aproximadamente unos 5 segundos.<br><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update registros Set status_orden='Terminado',fecha_cierra=now() where id_registro='$id_registro'",$link);

}


//Modulo tareas 2
if($modulo=="tareas2"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Tareas Pendientes</B> ]</CENTER><br>';


echo '<B><U>Previsualizaci&oacute;n de Orden</U></B><BR><BR>';
echo '<TABLE border="0" width="95%">
<FORM METHOD=POST ACTION="registros.php?modulo=editar">';

echo'<tr><td><B>No. Orden</B></td><td>'.$id_registro.'</td></tr>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from registros where id_registro='$id_registro'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<tr><td><B>Fecha de Ingreso</B></td><td>'.$row["fecha_orden"].'</td></tr>';
}
mysql_free_result($result2);

echo'<TR>
	<TD><B>Departamento:</B></TD>';

$result2=mysql_query("select * from departamento where id_depart='$depa_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo'<TD>'.$row["nombre_depart"].'</TD>';
}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="id_registro" value="'.$id_registro.'">';
echo'<INPUT TYPE="hidden" name="depa_orden" value="'.$depa_orden.'">
</TR>
<TR>
	<TD><B>Contacto:</B></TD>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from contactos where id_contacto='$contacto_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '<TD>'.$row["contact_nom"].'</TD>';

}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="contacto_orden" value="'.$contacto_orden.'">

</TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from categoria_hard where id_cat='$categoria'", $link2);
while ($row=mysql_fetch_array($result2))
{

echo '<TD><B>Categoria:</B></TD>
	<TD><INPUT TYPE="hidden" name="categoria" value="'.$categoria.'">'.$row["nom_cat"].'</TD>';

}
mysql_free_result($result2);




echo'<TR>
	<TD><B>Estado:</B></TD>
	<TD><INPUT TYPE="hidden" name="status_orden" value="'.$status_orden.'">'.$status_orden.'</TD>
</TR>
<TR>';
$result2=mysql_query("select * from registros where id_registro='$id_registro'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo'<TD><B>Posible soluci&oacute;n:</B></TD>
	<TD><INPUT TYPE="hidden" name="solucion_orden" value="'.$row["solucion_orden"].'">'.$row["solucion_orden"].'</TD>
</TR>
<TR>
	<TD><B>Descripci&oacute;n:</B></TD>
	<TD><INPUT TYPE="hidden" name="problema_orden" value="'.$row["problema_orden"].'">'.$row["problema_orden"].'</TD>
</TR>
<TR>


<TD><B>Observaciones:</B></TD>
	<TD><INPUT TYPE="hidden" name="numero_pc_orden" value="'.$row["numero_pc_orden"].'">'.$row["numero_pc_orden"].'</TD>';


}
mysql_free_result($result2);
echo'</TR>
<TR>
	<TD><B>Personal Asignado:</B></TD>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal where id_personal='$asig_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo '<TD>'.$row["nombre_personal"].'</TD>';
}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="asig_orden" value="'.$asig_orden.'">

</TR>
<TR>
	<TD><B>Prioridad:</B></TD>
	<TD><INPUT TYPE="hidden" name="prioridad" value="'.$prioridad.'">'.$prioridad.'</TD>
</TR>

</TABLE><BR><BR><CENTER><a href="mostrar-registros.php"target="_blank">Solucion de Falla</a> </CENTER>
</TABLE><BR><BR><CENTER><a href="javascript:history.back()"><< Regresar</a> <INPUT TYPE="submit" name="editar" value="Cerrar Orden"></CENTER></FORM>';


}



//Modulo tareas
if($modulo=="tareas"){
echo'<a href="registros.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT=""> <a href="registros.php?modulo=elegir">Nueva Orden</a><br>';
echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT=""> <a href="registros.php?modulo=buscar">Buscar Orden</a><br><br>';



	/*echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT=""> <a href="registross.php?modulo=elegir">Ingresar Nueva Orden con fecha manualmente.</a><br>';*/


echo '<IMG SRC="libreria/flecha.jpg" BORDER="0" ALT=""> <a href="registros.php?modulo=ver">Ver todas las Ordenes</a><br><br>';



echo '<CENTER>[ <B>Tareas Pendientes</B> ]</CENTER><br>';

echo '<TABLE border="0" width="95%">
<TR>

	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Orden</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Prioridad</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Estado</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Ingreso</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Departamento</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Categoria</CENTER></B></font></TD>
	<TD bgcolor="#A88D3E"><font face="verdana" color="#ffffff" size="1"><B><CENTER>Help Desk</CENTER></B></font></TD>

</TR>';
$base="$nbase";
$con=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db($base,$con);

if (!isset($pg))
$pg = 0; // $pg es la pagina actual
$cantidad=20; // cantidad de resultados por p&aacute;gina
$inicial = $pg * $cantidad;

$pegar = "SELECT * from registros,departamento,categoria_hard where (status_orden='Proceso') and (depa_orden=id_depart) and (id_cat=categoria) ORDER BY id_registro desc LIMIT $inicial,$cantidad";
$cad = mysql_db_query($base,$pegar) or die (mysql_error());

$contar = "select * from registros where status_orden='Proceso' order by id_registro desc"; 
$contarok= mysql_db_query($base,$contar);
$total_records = mysql_num_rows($contarok);
$pages = intval($total_records / $cantidad);
while ($row=mysql_fetch_array($cad))
{
echo'	<TR>';
echo'<TD><CENTER><font face="verdana" size="1">'.$row["id_registro"].'</font></CENTER></TD>';

	echo'<TD><font face="verdana" size="1"><CENTER>'.$row["prioridad"].'</CENTER></font></TD>
	<TD><font face="verdana" size="1"><a href="registros.php?modulo=tareas2&categoria='.$row["categoria"].'&id_registro='.$row["id_registro"].'&depa_orden='.$row["depa_orden"].'&contacto_orden='.$row["contacto_orden"].'&asig_orden='.$row["asig_orden"].'&status_orden='.$row["status_orden"].'&call='.$row["call"].'&prioridad='.$row["prioridad"].'">'.$row["status_orden"].'</a></font></TD>
	<TD><font face="verdana" size="1">'.$row["fecha_orden"].'</font></TD>';

echo '<td align="left"><font face="verdana" size="1">'.$row["nombre_depart"].'</font></td>';
echo'<TD align="left"><font face="verdana" size="1">'.$row["nom_cat"].'</font></TD>';
//echo'<TD><font face="verdana" size="1">'.$row["call"].'</font></TD>;
}
mysql_free_result($cad);
echo'</TR>
</TABLE>';
// Creando los enlaces de paginaci&oacute;n
echo "<BR><BR><BR><center><p>P&aacute;ginas:<br>";
if ($pg <> 0)
{
$url = $pg - 1;
echo "<a href='registros.php?modulo=tareas&pg=".$url."'>\AB Anterior</a> ";
}
else {
echo " ";
}

for ($i = 0; $i<($pages + 1); $i++) {
if ($i == $pg) {
echo "<font color=ff0000><b> $i </b></font>";
}
else {
echo "<a href='registros.php?modulo=tareas&pg=".$i."'>".$i."</a> ";
}
}

if ($pg < $pages) {
$url = $pg + 1;
echo "<a href='registros.php?modulo=tareas&pg=".$url."'>Siguiente \BB</a>";
}
else {
echo " ";
}
echo "</p></center>";

}




//Modulo elegir departamento.
if($modulo=="elegir"){
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento order by nombre_depart", $link2);
echo 'Por favor elige al departamento en el cual se realizar&aacute; la orden. Si en tal caso el departamento no existe ingresalo';
echo" <a href=javascript:depa('departamento.php?modulo=ingresar') title='Nuevo Departamento'>Pulsando aqui</a><br><br>";

echo '<b>Departamento:</b><br>';
while ($row=mysql_fetch_array($result2))
{
echo '<a href="registros.php?modulo=ingresar&id_depart='.$row["id_depart"].'">'.$row["nombre_depart"].'</a><br>';
}
mysql_free_result($result2);

}



//Modulo de formulario de orden
if($modulo=="ingresar"){
echo'<a href="registros.php?modulo=elegir"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="registros.php?modulo=insertar">';

echo '<TABLE border="0" width="95%">';

echo '<TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from departamento where id_depart='$id_depart'", $link2);
while ($row=mysql_fetch_array($result2))
{
echo '<TD><B>Departamento:</B></TD>';
	echo '<TD><INPUT TYPE="hidden" NAME="nombre_depart" value="'.$row["id_depart"].'"><INPUT TYPE="hidden" NAME="nombre" value="'.$row["nombre_depart"].'"><B>'.$row["nombre_depart"].'</B></TD>';
}
mysql_free_result($result2);


echo '</TR>';
echo '<TR>';

	echo '<TD><B>Contacto:</B></TD>';
	echo '<TD><SELECT NAME="contacto_nom"> ';
	echo '<option selected NAME="contacto_nom" value="------------">---------------Selecciona-------------------</option>';

$link3= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link3); 
$result3=mysql_query("select * from contactos where iden_contact='$id_depart'", $link3);
while ($row=mysql_fetch_array($result3))
{
	echo '<option NAME="contacto_nom" value="'.$row["id_contacto"].'">'.$row["contact_nom"].'</option>';

}
mysql_free_result($result3);


	echo "</SELECT> <a href=javascript:contacto('contacto.php?modulo=ingresar&id_depart=$id_depart') title='Nuevo Contacto'>Nuevo</a></TD>";

echo '</TR>';


echo '<TR>';

	echo '<TD><B>Categoria:</B></TD>';
	echo '<TD><SELECT NAME="categoria"> ';
	echo '<option selected NAME="categoria" value="------------">---------------Selecciona-------------------</option>';

$link3= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link3); 
$result3=mysql_query("select * from categoria_hard", $link3);
while ($row=mysql_fetch_array($result3))
{
	echo '<option NAME="categoria" value="'.$row["id_cat"].'">'.$row["nom_cat"].'</option>';

}
mysql_free_result($result3);


	echo "</SELECT></TD>";

echo '</TR>';


echo '<TR>';
	echo '<TD valign="top"><B>Estado</B></TD>';
	echo '<TD><SELECT NAME="status_orden"><option selected NAME="status_orden" value="Proceso">Proceso</option><option NAME="status_orden" value="Terminado">Terminado</option></select></TD>';
echo '</TR>';


echo '<TR>';
	echo '<TD valign="top"><B>Descripci&oacute;n del Problema:</B></TD>';
	echo '<TD><TEXTAREA NAME="problema_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';

echo '<TR>';
	echo '<TD valign="top"><B>Posible soluci&oacute;n del Problema:</B></TD>';
	echo '<TD><TEXTAREA NAME="solucion_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';


echo '<TR>';
	echo '<TD><B>Personal Asignado:</B></TD>';
	echo '<TD><SELECT NAME="asig_orden">';

echo'<option selected NAME="asig_orden" value="-----------------">---------------Selecciona-------------------</option>';


$link4= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link4); 
$result4=mysql_query("select * from personal", $link4);
while ($row=mysql_fetch_array($result4))
{
echo'<option NAME="asig_orden" value="'.$row["id_personal"].'">'.$row["nombre_personal"].'</option>';

}
mysql_free_result($result4);

echo '</SELECT></TD></TR>';
echo '<tr><td><B>Prioridad:</B> </td><td>';
echo '<SELECT NAME="prioridad"><option selected value="Alta" name="prioridad">Alta</option><option value="Media" name="prioridad">Media</option><option value="Baja" name="prioridad">Baja</option></SELECT>';

echo '</td></tr>';

echo '<TR>';
	echo '<TD valign="top"><B>Observaciones:</B></TD>';
	echo '<TD><TEXTAREA NAME="numero_pc_orden" ROWS="5" COLS="30"></TEXTAREA></TD>';
echo '</TR>';


echo '</TABLE>';

echo '<br><br><input type="button" value="Ingresar" name="insertar" onClick="return Validar1(this.form)">';
echo '<input type="reset" value="Borrar">';
echo '</FORM>';
}


//Modulo insertar (Previsualizar)
if($modulo=="insertar"){
echo'<a href="javascript:history.back()"><< Regresar al Formulario de Orden</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

echo '<B><U>Previsualizaci&oacute;n de Orden</U></B><BR><BR>';
echo '<TABLE border="0" width="95%">
<FORM METHOD=POST ACTION="registros.php?modulo=insertar2">

<TR>
	<TD><B>Departamento:</B></TD>
	<TD><INPUT TYPE="hidden" name="nombre_depart" value="'.$nombre_depart.'">'.$nombre.'</TD>
</TR>
<TR>
	<TD><B>C&oacute;digo de Contacto:</B></TD>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from contactos where id_contacto='$contacto_nom'", $link2);
while ($row=mysql_fetch_array($result2))
{

	echo '<TD>'.$row["contact_nom"].'</TD>';

}
mysql_free_result($result2);
echo'<INPUT TYPE="hidden" name="contacto_nom" value="'.$contacto_nom.'">
</TR>';
echo '<TR>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from categoria_hard where id_cat='$categoria'", $link2);
while ($row=mysql_fetch_array($result2))
{

echo '<TD><B>Categoria:</B></TD>
	<TD><INPUT TYPE="hidden" name="categoria" value="'.$categoria.'">'.$row["nom_cat"].'</TD>';

}
mysql_free_result($result2);

echo '</TR>';
echo'<TR>
	<TD><B>Estado:</B></TD>
	<TD><INPUT TYPE="hidden" name="status_orden" value="'.$status_orden.'">'.$status_orden.'</TD>
</TR>
<TR>
	<TD><B>Descripci&oacute;n del Problema:</B></TD>
	<TD><INPUT TYPE="hidden" name="problema_orden" value="'.$problema_orden.'">'.$problema_orden.'</TD>
</TR>
<TR>
	<TD><B>Posible soluci&oacute;n del Problema:</B></TD>
	<TD><INPUT TYPE="hidden" name="solucion_orden" value="'.$solucion_orden.'">'.$solucion_orden.'</TD>
</TR>
<TR>
	<TD><B>Personal Asignado:</B></TD>';
$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from personal where id_personal='$asig_orden'", $link2);
while ($row=mysql_fetch_array($result2))
{
	echo '<TD>'.$row["nombre_personal"].'</TD>';
}
mysql_free_result($result2);

echo'<INPUT TYPE="hidden" name="asig_orden" value="'.$asig_orden.'">
</TR>
<TR>
	<TD><B>Prioridad:</B></TD>
	<TD><INPUT TYPE="hidden" name="prioridad" value="'.$prioridad.'">'.$prioridad.'</TD>
</TR>
<TR>
	<TD><B>Observaciones:</B></TD>
	<TD><INPUT TYPE="hidden" name="numero_pc_orden" value="'.$numero_pc_orden.'">'.$numero_pc_orden.'</TD>
</TR>
</TABLE><BR><BR><CENTER><a href="javascript:history.back()"><< Regresar</a> <INPUT TYPE="submit" name="insertar2" value="Ingresar"></CENTER></FORM>';
}



//Modulo insertar 2
if($modulo=="insertar2"){
echo'<meta http-equiv="refresh" content="5;URL=registros.php?modulo=tareas">';
echo'<a href="registros.php?modulo=tareas"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Nueva Orden</B> ]</CENTER><br>';

if($status_orden == "Proceso"){
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("INSERT into registros (numero_orden,depa_orden,contacto_orden,status_orden,problema_orden,solucion_orden,asig_orden,numero_pc_orden,prioridad,fecha_orden,categoria,call)values('0','$nombre_depart','$contacto_nom','$status_orden','$problema_orden','$solucion_orden','$asig_orden','$numero_pc_orden','$prioridad',now(),'$categoria','$nombre_adm')",$link);
}
elseif($status_orden == "Terminado"){
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("INSERT into registros (numero_orden,depa_orden,contacto_orden,status_orden,problema_orden,solucion_orden,asig_orden,numero_pc_orden,prioridad,fecha_orden,fecha_cierra,categoria,call)values('0','$nombre_depart','$contacto_nom','$status_orden','$problema_orden','$solucion_orden','$asig_orden','$numero_pc_orden','$prioridad',now(),now(),'$categoria','$nombre_adm')",$link);
}

echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 5 segundos.<br><br>';

}
}
else{
if($modulo=="tareas") {
echo '<p>Lo sentimos no tienes los permisos necesarios para visualizar esta informaci&oacute;n.</p>';
if($num2 == "1")
{
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=adm') title='Acerca de la Cuenta Administrador'>Administrador</a>";
}
elseif($num2 == "0"){
	$cuenta = "<a href=javascript:cuenta('cuentas.php?modulo=us') title='Acerca de la Cuenta Usuario'>Usuario</a>";
}


echo '<p><b>Tipo de Cuenta:</b><br><b>'.$cuenta.'</b></p>';

}
}

echo'</div>';

include('libreria/final.php');

?>
