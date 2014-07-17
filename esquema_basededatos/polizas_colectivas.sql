

CREATE TABLE IF NOT EXISTS `polizas_colectivas` (

`id` bigint(11) NOT NULL AUTO_INCREMENT,
`n_poliza` varchar(60) NOT NULL,
`nombre_contratante` varchar(100) NOT NULL,
`url_archivo` varchar(150) NOT NULL,
`fecha_creacion` datetime NOT NULL,
   
PRIMARY KEY (`id`)
);
