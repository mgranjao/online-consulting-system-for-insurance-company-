CREATE TABLE IF NOT EXISTS `logs_usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(11) NOT NULL,
  `post` text NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;