<?php
/***************************************************
Help Desk System Interactiva Web (C)2012
Copyright (C)2004 Gustavo Reyes. Twitter: @greyes
Todos los derechos reservados.
http://www.interactivaweb.com
contacto@interactivaweb.com
Nueva liberación 18-5-2012
sesion.php                       Dom/25/jul/2004
***************************************************/
?>
<?php
if (isset($nombre_adm)) {
        //lo echas
  }

session_start();
  if (!isset($nombre_adm)) {
    //lo echas
 }
 else {
session_register("nombre_adm");
session_register("contrasena_adm");
session_register("id_admin");
}
?>
 <?php include 'login.php'; ?>
