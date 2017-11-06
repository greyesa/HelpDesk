<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?
include "conexion.php";
$result=mysql_query("SELECT * FROM registros ORDER BY Id_registro",
  $conexion);
echo"<table width=300>
<tr>
<td><b>Nombre</b></td><td><b>Apellido</b></td><td><b>DNI</b></td>
</tr>";
while($row=mysql_fetch_row($result)){
  echo"<tr>
    <td>$row[1]</td><td>$row[2]</td><td>$row[3]
      <a href="actualizar.php?id=$row[0]">Actualizar</a></td>
    </tr>";
}
echo"</table>";
include "cerrar_conexion.php";
?>


</body>
</html>
