

CREATE TABLE IF NOT EXISTS `usuarios_seguimiento` (
 
 `id` bigint(11) NOT NULL AUTO_INCREMENT,
 
 `email` varchar(60) NOT NULL,
 
 `nombre_completo` varchar(100) NOT NULL,

 `contrasena` varchar(255) NOT NULL,
 
 `fecha_create` datetime NOT NULL,

 `permiso_todos` tinyint(1) NOT NULL,
 `permiso_personas` tinyint(1) NOT NULL,
 `permiso_empresas` tinyint(1) NOT NULL ,
 `permiso_brokers` tinyint(1) NOT NULL,
 `permiso_accionistas` tinyint(1) NOT NULL,
 `permiso_archivos` tinyint(1) NOT NULL,
 `permiso_solicitudes` tinyint(1) NOT NULL,   
PRIMARY KEY (`id`)
);
