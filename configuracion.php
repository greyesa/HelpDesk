<?php
include 'libreria/sesion.php';
/***********************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
configuracion.php                    Dom/25/jul/2004
***********************************************/


include('libreria/cabecera.php');

echo'<div id="content">
<h2 title="Content">Modulo Configuraci&oacute;n</h2>';


if($num2 == "1"){


//Modulo menu
if($modulo=="menu") {
echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	echo '<li><a href="configuracion.php?modulo=usuarios">Configuraci&oacute;n de Usuarios</a></li>';
	echo '<li><a href="configuracion.php?modulo=preferencias">Preferencias</a></li>';
echo '</ul>';
}

//modulo preferencias menu
if($modulo=="preferencias"){
echo'<a href="configuracion.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Preferencias</B> ]</CENTER><br>';

echo '<ul>';
	/*echo '<li><a href="configuracion.php?modulo=puestos">Puestos o Cargos</a></li>';*/
	echo '<li><a href="configuracion.php?modulo=categorias">Categorias de Equipo</a></li>';

echo '</ul>';

}


///Modulo de categorias
if($modulo=="categorias"){
echo'<a href="configuracion.php?modulo=preferencias"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Categorias de Equipo</B> ]</CENTER><br>';

echo '<ul>';
	echo '<li><a href="configuracion.php?modulo=categoriasing">Nueva Categor&iacute;a</a></li>';
echo '</ul>';

echo '<center><TABLE border="0" width="95%">';
echo '<TR>';
echo '	<TD><B>Tipo de Equipo</B></TD>';	
echo '<TD><B>Opci&oacute;n</B></TD>';
echo '</TR>';
echo '<TR>';



$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from categoria_hard", $link2);
while ($row=mysql_fetch_array($result1))
{

echo '	<TD>'.$row["nom_cat"].'</TD>';
echo '	<TD><a href="configuracion.php?modulo=categoriasedi&id_cat='.$row["id_cat"].'">Editar</a></TD>';
echo '</TR>';
}
mysql_free_result($result1);

echo'</TABLE></center>';
}


//Modulo ingresar categorias
if($modulo=="categoriasing"){
echo'<a href="configuracion.php?modulo=categorias"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Categorias de Equipo</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=categoriasing2">';
echo '<B>Categoria:</B> <INPUT TYPE="text" NAME="categoria"><BR><BR>';

echo '<INPUT TYPE="submit" name="categoriasing2" value="Ingresar">';
echo '</FORM>';

}


//Modulo ingresar categorias
if($modulo=="categoriasing2"){
echo'<meta http-equiv="refresh" content="3;URL=configuracion.php?modulo=categorias">';
echo'<a href="configuracion.php?modulo=categorias"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Categorias de Equipo</B> ]</CENTER><br>';
$link= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link); 	
$result=mysql_query("INSERT into categoria_hard (nom_cat) values('$categoria')",$link);
echo 'Dato ingresado satisfactoriamente.<br>Ser&aacute;s redireccionado espero un segundo.<br>';
}


//Modulo para editar categorias
if($modulo=="categoriasedi2"){
echo'<meta http-equiv="refresh" content="3;URL=configuracion.php?modulo=categorias">';

echo'<a href="configuracion.php?modulo=categoriasele"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Categorias de Equipo</B> ]</CENTER><br>';
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update categoria_hard Set nom_cat='$categoria' where id_cat='$id_cat'",$link);

echo 'Dato actualizado satisfactoriamente.<br>Ser&aacute;s redireccionado espero un segundo.<br>';

}





//Modulo para editar categorias
if($modulo=="categoriasedi"){
echo'<a href="configuracion.php?modulo=categorias"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Categorias de Equipo</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=categoriasedi2">';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from categoria_hard where id_cat='$id_cat'", $link2);
while ($row=mysql_fetch_array($result1))
{
echo '<B>Categoria:</B> <INPUT TYPE="text" NAME="categoria" value="'.$row["nom_cat"].'"><BR><BR>';
echo '<INPUT TYPE="hidden" name="id_cat" value="'.$id_cat.'">';
}
mysql_free_result($result1);



echo '<INPUT TYPE="submit" name="categoriasedi2" value="Editar">';
echo '</FORM>';


}






//Modulo puestos
if($modulo=="puestos"){
echo'<a href="configuracion.php?modulo=preferencias"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

echo '<ul>';
	echo '<li><a href="configuracion.php?modulo=puestosin1">Ingresar Nuevo Puesto o Cargo</a></li>';
	echo '<li><a href="configuracion.php?modulo=puestosed1">Editar Puesto o Cargo</a></li>';

echo '</ul>';

}


//Modulo para editar puesto
if($modulo=="puestosed3"){
echo'<meta http-equiv="refresh" content="5;URL=configuracion.php?modulo=puestos">';

echo'<a href="configuracion.php?modulo=puestosed1"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update puestos Set puesto='$cargo' where id_puestos='$id_puestos'",$link);


echo 'Actualizado Satisfactoriamente el Cargo o Puesto denominado: <B>'.$cargo.'</B>. Ser&aacute;s redireccionado al menu principal en aproximadamente 5 segundos.';

}





//Modulo para editar puesto
if($modulo=="puestosed2"){
echo'<a href="configuracion.php?modulo=puestosed1"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from puestos where id_puestos='$id_puestos'", $link2);
echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=puestosed3">';
while ($row=mysql_fetch_array($result2))
{
echo '<B>Puesto o Cargo: </B><INPUT TYPE="text" NAME="cargo" value="'.$row["puesto"].'">';
echo '<INPUT TYPE="hidden" name="id_puestos" value="'.$id_puestos.'">';
}
mysql_free_result($result2);
echo '<br><br><INPUT TYPE="submit" name="puestosed3" value="Editar">';
echo '</FORM>';

}


//modulo para editar puesto
if($modulo=="puestosed1"){
echo'<a href="configuracion.php?modulo=puestos"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from puestos order by puesto", $link2);

echo '<TABLE border="0" width="95%">
<TR>
	<TD><B>Puesto o Cargo</B></TD>
</TR>';

while ($row=mysql_fetch_array($result2))
{
echo '	<TR><TD><a href="configuracion.php?modulo=puestosed2&id_puestos='.$row["id_puestos"].'">'.$row["puesto"].'</a></TD>';
}
mysql_free_result($result2);

echo '</TR>
</TABLE>';
}




//Modulo ingresar nuevo cargo
if($modulo=="puestosin2"){
echo'<meta http-equiv="refresh" content="5;URL=configuracion.php?modulo=puestos">';
echo'<a href="configuracion.php?modulo=puestos"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
$result=mysql_query("INSERT into puestos (puesto)values('$cargo')",$link);

echo 'Ingresado Satisfactoriamente el Cargo o Puesto denominado: <B>'.$cargo.'</B>. Ser&aacute;s redireccionado al menu principal en aproximadamente 5 segundos.';

}



//modulo ingresar nuevo cargo
if($modulo=="puestosin1"){
echo'<a href="configuracion.php?modulo=puestos"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Puestos o Cargos</B> ]</CENTER><br>';

echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=puestosin2">';
echo '<B>Nombre de Puesto o Cargo:</B> <INPUT TYPE="text" NAME="cargo"><br><br>';
echo '<INPUT TYPE="submit" name="puestosin2" value="Ingresar">';
echo '</FORM>';
}




//Modulo para editar usuario
if($modulo=="usuarios"){
echo'<a href="configuracion.php?modulo=menu"><< Regresar a Men&uacute;</a><br><br>';

echo '<p>Por favor selecciona una opci&oacute;n:</p>';
echo '<ul>';
	/*echo '<li><a href="configuracion.php?modulo=ingresar">Nuevo Usuario</a></li>';*/
	/*echo '<li><a href="configuracion.php?modulo=editar">Editar Usuario</a></li>';*/
	echo '<li><a href="configuracion.php?modulo=lectura">Lectura de Usuarios</a></li>';

echo '</ul>';
}

//Modulo de lectura de usarios
if($modulo=="lectura"){
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Lectura</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from administrador order by nombre", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Usuarios</B></TD>';
	echo '<TD><B>Correo</B></TD>';
	echo '<TD><B>Nivel</B></TD>';

echo '</TR>';
while ($row=mysql_fetch_array($result2))
{
echo '<TR>';
	echo '<TD>'.$row["nombre"].'</TD>';
	echo '<TD><a href="mailto:'.$row["correo"].'">'.$row["correo"].'</a></TD>';
if($row["nivel"] == "1"){
	$nivel = "Administrador";
}

elseif($row["nivel"] == "2"){
$nivel = "Usuario Avanzado";
}
elseif($row["nivel"] == "0"){
$nivel = "Usuario";
}

echo '<TD>'.$nivel.'</TD>';

echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';

}




//Modulo para editar usuario
if($modulo=="editar"){
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result2=mysql_query("select * from administrador order by nombre", $link2);
echo '<TABLE border="0" width="80%">';
echo '<TR>';
	echo '<TD><B>Usuarios del Sistema</B></TD>';
echo '</TR>';
while ($row=mysql_fetch_array($result2))
{
echo '<TR>';
	echo '<TD><a href="configuracion.php?modulo=editar2&ID_adm='.$row["ID_adm"].'">'.$row["nombre"].'</a></TD>';
echo '</TR>';
}
mysql_free_result($result2);
echo '</TABLE>';


}


//modulo para editar usuario
if($modulo=="editar2"){
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';

$link2= mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link2); 
$result1=mysql_query("select * from administrador where ID_adm='$ID_adm'", $link2);
while ($row=mysql_fetch_array($result1))
{
echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=editar3">';
echo '<INPUT TYPE="hidden" name="ID_adm" value="'.$ID_adm.'">';
echo '<TABLE border="0">
<TR>
	<TD><B>Nombre de Usuario:</B></TD>
	<TD><INPUT TYPE="text" NAME="nombre" value="'.$row["nombre"].'"></TD>
</TR>
<TR>
	<TD><B>Nueva Contrasena de Usuario:</B></TD>
	<TD><INPUT TYPE="password" NAME="contrase\F1a"></TD>
</TR>
<TR>
	<TD><B>E-mail de Usuario:</B></TD>
	<TD><INPUT TYPE="text" NAME="correo" value="'.$row["correo"].'"></TD>
</TR>
<TR>';

if($row["nivel"] == "1"){
	$nivel = "Administrador";
}
elseif($row["nivel"] == "2"){
$nivel = "Usuario Avanzado";
}
elseif($row["nivel"] == "0"){
$nivel = "Usuario";
}

echo'	<TD><B>Nivel dentro del Sistema:</B></TD>
	<TD><SELECT NAME="nivel"><option selected name="nivel" value="'.$row["nivel"].'">'.$nivel.'</option><option>-----------------</option><option name="nivel" value="1">Administrador</option><option name="nivel" value="2">Usuario Avanzado</option><option name="nivel" value="0">Usuario</option></SELECT></TD>
</TR>
</TABLE>';
echo 'Nota: Si desea mantener la contrase&ntilde;a actual no ingrese nada en nueva contrase&ntilde;a.<br>';
echo '<BR><BR><INPUT TYPE="submit" name="editar3" value="Editar">';
echo '</FORM>';

}
mysql_free_result($result1);
}


//modulo editar 3
if($modulo=="editar3"){
echo'<meta http-equiv="refresh" content="10;URL=configuracion.php?modulo=usuarios">';
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';
echo '<CENTER>[ <B>Editar</B> ]</CENTER><br>';


/*if($contrase\F1a = $contrasena){

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update administrador Set nombre='$nombre',contrase\F1a=MD5('$contrasena'),correo='$correo',nivel='$nivel',web='http://',pais='Guatemala' where ID_adm='$ID_adm'",$link);

}
else*/{
$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);
mysql_query("Update administrador Set nombre='$nombre',contrasena=MD5('$contrasena')correo='$correo',nivel='$nivel',web='http://',pais='Guatemala' where ID_adm='$ID_adm'",$link);
}




echo 'Datos actualizados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';

echo '<TABLE border="0">
<TR>
	<TD><B>Nombre de Usuario:</B></TD>
	<TD>'.$nombre.'</TD>
</TR>
<TR>
	<TD><B>Nueva Contrase&ntilde;a de Usuario:</B></TD>
	<TD>'.$contrasena.'</TD>
</TR>
<TR>
	<TD><B>E-mail de Usuario:</B></TD>
	<TD>'.$correo.'</TD>
</TR>
<TR>';

if($nivel == "1"){
	$nivel = "Administrador";
}
elseif($nivel == "2"){
$nivel = "Usuario Avanzado";
}
elseif($nivel == "0"){
$nivel = "Usuario";
}

echo'<TD><B>Nivel dentro del Sistema:</B></TD>
	<TD>'.$nivel.'</TD>
</TR>
</TABLE>';


}






//Modulo para ingresar nuevo usuario
if($modulo=="ingresar"){
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';

echo '<FORM METHOD=POST ACTION="configuracion.php?modulo=ingresar2">';

echo '<TABLE border="0">
<TR>
	<TD><B>Nombre de Usuario:</B></TD>
	<TD><INPUT TYPE="text" NAME="nombre"></TD>
</TR>
<TR>
	<TD><B>Contrase&ntilde;a de Usuario:</B></TD>
	<TD><INPUT TYPE="password" NAME="contrase\F1a"></TD>
</TR>
<TR>
	<TD><B>E-mail de Usuario:</B></TD>
	<TD><INPUT TYPE="text" NAME="correo"></TD>
</TR>
<TR>
	<TD><B>Nivel dentro del Sistema:</B></TD>
	<TD><SELECT NAME="nivel"><option selected name="nivel" value="1">Administrador</option><option name="nivel" value="2">Usuario Avanzado</option><option name="nivel" value="0">Usuario</option></SELECT></TD>
</TR>
</TABLE>';

echo '<BR><BR><INPUT TYPE="submit" name="ingresar2" value="Ingresar">';
echo '</FORM>';
	
}

//Modulo para ingresar nuevos datos de usuario
if($modulo=="ingresar2"){
echo'<meta http-equiv="refresh" content="10;URL=configuracion.php?modulo=usuarios">';
echo'<a href="configuracion.php?modulo=usuarios"><< Regresar a Men&uacute;</a><br><br>';

$link=mysql_connect("$nhost","$nuser","$npass");
mysql_select_db("$nbase", $link);

$sql = "SELECT nombre FROM administrador WHERE nombre='$nombre'";
$result = mysql_query($sql)
	or die("No se puede ejecutar el resultado de la base de datos.");
$num = mysql_numrows($result);
if ($num == 0) {

$result=mysql_query("INSERT into administrador (nombre,contrase\F1a,correo,nivel,web,pais)values('$nombre',MD5('$contrasena'),'$correo','$nivel','http://','Guatemala')",$link);


echo 'Datos ingresados satisfactoriamente. Ser&aacute;s redireccionado al Menu Principal en aproximadamente unos 10 segundos.<br><br><B><U>Previsualizaci&oacute;n:</U></B><br>';


echo '<TABLE border="0">
<TR>
	<TD><B>Nombre de Usuario:</B></TD>
	<TD>'.$nombre.'</TD>
</TR>
<TR>
	<TD><B>Contrase&ntilde;a de Usuario:</B></TD>
	<TD>'.$contrasena.'</TD>
</TR>
<TR>
	<TD><B>E-mail de Usuario:</B></TD>
	<TD>'.$correo.'</TD>
</TR>
<TR>';

if($nivel == "1"){
	$nivel = "Administrador";
}

elseif($nivel == "2"){
$nivel = "Usuario Avanzado";
}
elseif($nivel == "0"){
$nivel = "Usuario";
}

echo'<TD><B>Nivel dentro del Sistema:</B></TD>
	<TD>'.$nivel.'</TD>
</TR>
</TABLE>';

}
elseif ($num == 1)  {

echo'<br>Lo sentimos, ese usuario ya existe.<br><BR>';

}

}

}
else{

if($modulo=="menu") {
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
