# phpMyAdmin SQL Dump
# version 2.5.7
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tiempo de generación: 17-08-2004 a las 17:01:42
# Versión del servidor: 4.0.12
# Versión de PHP: 4.3.5
# 
# Base de datos : `helpdesksystem`
# 

# --------------------------------------------------------

#
# Estructura de tabla para la tabla `administrador`
#

CREATE TABLE `administrador` (
  `ID_adm` int(11) NOT NULL auto_increment,
  `correo` varchar(255) default NULL,
  `contrasena` varchar(255) default NULL,
  `web` varchar(255) default NULL,
  `nombre` varchar(255) default NULL,
  `pais` varchar(100) default NULL,
  `nivel` varchar(255) default NULL,
  UNIQUE KEY `ID_adm` (`ID_adm`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Volcar la base de datos para la tabla `administrador`
#

INSERT INTO `administrador` VALUES (1, 'greyes@poccms.com', '21232f297a57a5a743894a0e4a801fc3', 'http://www.poccms.com', 'admin', 'Guatemala', '1');


# --------------------------------------------------------


-- 
-- Estructura de tabla para la tabla `categoria_hard`
-- 

CREATE TABLE `categoria_hard` (
  `id_cat` int(11) NOT NULL auto_increment,
  `nom_cat` varchar(255) default NULL,
  PRIMARY KEY  (`id_cat`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `categoria_hard`
-- 

INSERT INTO `categoria_hard` VALUES (1, 'Hardware');
INSERT INTO `categoria_hard` VALUES (2, 'Software');

-- --------------------------------------------------------

#
# Estructura de tabla para la tabla `contactos`
#

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL auto_increment,
  `contact_nom` varchar(255) default NULL,
  `contact_ext` varchar(255) default NULL,
  `contact_mail` varchar(255) default NULL,
  `iden_contact` varchar(255) default NULL,
  `contact_cargo` varchar(255) default NULL,
  `fecha_contact` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_contacto`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Volcar la base de datos para la tabla `contactos`
#


# --------------------------------------------------------

#
# Estructura de tabla para la tabla `departamento`
#

CREATE TABLE `departamento` (
  `id_depart` int(11) NOT NULL auto_increment,
  `nombre_depart` varchar(255) default NULL,
  `fecha_depart` datetime NOT NULL default '0000-00-00 00:00:00',
  `contacto_tel` varchar(255) default NULL,
  `contacto_ext` varchar(255) default NULL,
  `contacto_fax` varchar(255) default NULL,
  `contacto_mail` varchar(255) default NULL,
  `codigo_depart` varchar(255) default NULL,
  `jefe_depart` varchar(255) default NULL,
  `cargojefe_depart` varchar(255) default NULL,
  `emailjefe_depart` varchar(255) default NULL,
  PRIMARY KEY  (`id_depart`)
) TYPE=MyISAM;

#
# Volcar la base de datos para la tabla `departamento`
#

# --------------------------------------------------------

#
# Estructura de tabla para la tabla `mensajes`
#

CREATE TABLE `mensajes` (
  `id_men` int(11) NOT NULL auto_increment,
  `iden_men` varchar(255) default NULL,
  `ti_men` varchar(255) default NULL,
  `mens_men` varchar(255) default NULL,
  `fecha_men` datetime default NULL,
  `ver` varchar(255) default NULL,
  `enviado_men` varchar(255) default NULL,
  `tipo` varchar(255) default NULL,
  PRIMARY KEY  (`id_men`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Volcar la base de datos para la tabla `mensajes`
#

#
# Estructura de tabla para la tabla `mensajes_per`
#

CREATE TABLE `mensajes_per` (
  `id_men_per` int(11) NOT NULL auto_increment,
  `iden_men_per` varchar(255) default NULL,
  `ti_men_per` varchar(255) default NULL,
  `mens_men_per` varchar(255) default NULL,
  `fecha_men_per` datetime default NULL,
  `ver_per` varchar(255) default NULL,
  `enviado_men_per` varchar(255) default NULL,
  PRIMARY KEY  (`id_men_per`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Volcar la base de datos para la tabla `mensajes_per`
#



# --------------------------------------------------------

#
# Estructura de tabla para la tabla `personal`
#

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL auto_increment,
  `nombre_personal` varchar(255) default NULL,
  `fecha_personal` datetime NOT NULL default '0000-00-00 00:00:00',
  `codigo_personal` varchar(255) default NULL,
  `codigo_asig` varchar(255) default NULL,
  PRIMARY KEY  (`id_personal`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Volcar la base de datos para la tabla `personal`
#

INSERT INTO `personal` VALUES (1, 'Saul Gallo', '2004-07-30 19:37:17', 'T1', 'SG');

# --------------------------------------------------------

#
# Estructura de tabla para la tabla `puestos`
#

CREATE TABLE `puestos` (
  `id_puestos` int(11) NOT NULL auto_increment,
  `puesto` varchar(255) default NULL,
  PRIMARY KEY  (`id_puestos`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

#
# Volcar la base de datos para la tabla `puestos`
#

INSERT INTO `puestos` VALUES (1, 'Decano(a)');
INSERT INTO `puestos` VALUES (2, 'Vice-Decano(a)');
INSERT INTO `puestos` VALUES (3, 'Secretaria(o)');
INSERT INTO `puestos` VALUES (4, 'Director(a)');
INSERT INTO `puestos` VALUES (5, 'Licenciado(a)');
INSERT INTO `puestos` VALUES (6, 'Ingeniero(a)');
INSERT INTO `puestos` VALUES (7, 'Doctor(a)');
INSERT INTO `puestos` VALUES (8, 'Técnico(a)');
INSERT INTO `puestos` VALUES (9, 'Encargado(a)');
INSERT INTO `puestos` VALUES (10, 'Recepcionista');

# --------------------------------------------------------

#
# Estructura de tabla para la tabla `registros`
#

CREATE TABLE `registros` (
  `id_registro` int(11) NOT NULL auto_increment,
  `numero_orden` varchar(255) default NULL,
  `depa_orden` varchar(255) default NULL,
  `contacto_orden` varchar(255) default NULL,
  `problema_orden` varchar(255) default NULL,
  `fecha_orden` datetime NOT NULL default '0000-00-00 00:00:00',
  `asig_orden` varchar(255) default NULL,
  `status_orden` varchar(255) default NULL,
  `solucion_orden` varchar(255) NOT NULL default '',
  `numero_pc_orden` varchar(255) default NULL,
  `prioridad` varchar(255) default NULL,
  `fecha_cierra` varchar(255) default NULL,
  `categoria` varchar(255) default NULL,
  `call` varchar(255) default NULL,
  PRIMARY KEY  (`id_registro`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Volcar la base de datos para la tabla `registros`
#

