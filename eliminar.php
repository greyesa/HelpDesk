<?php
/*
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
*/

/** conexion ***************************/
// conectamos a la base de datos
$link = mysql_connect(’localhost’, ‘root’, ”);
if(!$link) {
die(”Error al intentar conectar: “.mysql_error());
}

// seleccionamos la base de datos
$db_link = mysql_select_db(’helpdesk’, $link);
if(!$db_link) {
die(”Error al intentar seleccionar la base de datos”. mysql_error());
}
/** fin conexion ************************/

// comprovamos si
// ha sido enviado el formulario
if(isset($_POST['eliminar']) && $_POST['eliminar'] == ‘Eliminar’){

// creamos la consulta
// que eliminara el registro
// que viene via $_POST
$id_eliminar = $_POST['id'];
$sqlEliminar = mysql_query(”DELETE FROM helpdesk
WHERE Id_registro = $id_eliminar”, $link)
or die(mysql_error());
// enviamos un mensage de exito
$mensaje = “El registro a sido eliminado”;
}

// si no ha sido enviado el formulario aun
// recogemos el ID
// del registro a eliminar
// via $_GET
elseif(isset($_GET['id'])){
$id = $_GET['id'];

// hacemos una consulta
// para mostrar el registro
// que vamos a eliminar
$sql = mysql_query(”SELECT * FROM helpdesk
WHERE Id_registro = $id”, $link)
or die(mysql_error());
$row = mysql_fetch_array($sql);

// advertimos
$mensaje = “¿Está seguro que quiere eliminar La Falla<b>$row[Id_registro]</b>?”;
}

// mostramos el mensage
echo $mensaje;
?>
<!– creamos el formulario HTML
que enviara el ID
del registro a eliminar –>
<form name=”eliminar-registro” method=”post” action=”<?php $_SERVER['PHP_SELF']; ?>” >
<input name=”id” type=”hidden” value=”<?php echo $row['Id_registro']; ?>” />
<input name=”eliminar” type=”submit” value=”Eliminar” />
</form>
