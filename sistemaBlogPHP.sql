--
-- Base de datos: `sistemaBlogPHP`
--
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `articulo` longtext,
  `tags` varchar(90) DEFAULT NULL,
  `id_estado` tinyint(1) unsigned NOT NULL,
  `id_imagen` smallint(5) unsigned DEFAULT NULL,
  `id_seccion` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_estado`),
  KEY `id_imagen` (`id_imagen`),
  KEY `id_seccion` (`id_seccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


INSERT INTO `articulos` (`id`, `titulo`, `fecha_publicacion`, `articulo`, `tags`, `id_estado`, `id_imagen`, `id_seccion`) VALUES
(1, 'coso 1', '2015-07-09 15:22:25', 'asdfsadfasdf asdfsa df asdf asdf sadf sad fasdf sdaf sadf sdf sdaf sdaf asd f', 'asdf', 1, 1, 3),
(2, 'Flor de jasmin', '2015-07-09 15:24:30', 'asdf f asdf asdf adsf s\r\nasdf f asdf asdf adsf s\r\nasdf f asdf asdf adsf s\r\nasdf f asdf asdf adsf sasdf f asdf asdf adsf sasdf f asdf asdf adsf sasdf f asdf asdf adsf s\r\nasdf f asdf asdf adsf s\r\nasdf f asdf asdf adsf sasdf f asdf asdf adsf sasdf f asdf asdf adsf s', 'sadf', 1, 2, 1),
(3, 'asdfasdf', '2015-07-09 16:55:36', 'asdfasdfasd', '', 2, 1, 2),
(4, 'pensando en futuro', '2015-07-30 21:43:11', 'conchaculoteta conchaculoteta conchaculoteta conchaculoteta conchaculoteta conchaculoteta\r\npornopornoporno pornoporno pornoporno pornoporno pornoporno pornoporno porno', '', 1, 8, 3),
(5, 'Lorem ipsum dolor sit amet, consectetur', '2015-08-01 02:52:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna consequat sagittis. Curabitur dapibus enim sit amet elit pharetra tincidunt feugiat nisl imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros. Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In rutrum accumsan ultricies. Mauris vitae nisi at sem facilisis semper ac in est.', 'ads, ygihj, locu', 1, 3, 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'noticias');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `estados` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'Aprobado'),
(2, 'Pendiente'),
(3, 'Borrado');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `archivo` varchar(37) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `id_categoria` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `archivo` (`archivo`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO `imagenes` (`id`, `archivo`, `titulo`, `descripcion`, `id_categoria`) VALUES
(1, '1987299e5d8e648c6462fabb56dc528a.jpg', 'flor', 'flor flor', 1),
(2, 'af9ef323791aaeeef06544f5c96791d2.jpg', 'conchapitoculoteta', 'conchapitoculoteta12', 1),
(3, '84bf16a067c71bc8453bf516ed1b2e8b.jpg', 'conchapitoculoteta454', 'conchapitoculoteta890', 1),
(8, '7bba6249c5a998d3386153e9c6ecdf43.jpg', 'pensando en futuro', 'pensando en futuro', 1);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `musica` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `artista` varchar(25) DEFAULT NULL,
  `votos` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `musica` (`id`, `nombre`, `artista`, `votos`) VALUES
(1, 'Yellow Submarine', 'Beatles', 2),
(2, 'Karkelo', 'Korpiklaani', 1),
(3, 'Stairway To Heaven', 'Led Zeppelin', 1),
(4, 'Fermin', 'Almendra', 1),
(5, 'Silent Dream', 'Rhapsody of Fire', 0),
(6, 'Sex & Religion', 'Steve Vai', 2),
(7, 'The Castle Hall', 'Ayreon', 0),
(8, 'Marcha de la bronca', 'Miguel Cantilo', 0);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `niveles` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nivel` (`nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `niveles` (`id`, `nivel`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `secciones` (`id`, `seccion`) VALUES
(1, 'Todo'),
(2, 'Policial'),
(3, 'Sociedad'),
(4, 'Tecnologia'),
(5, 'Espectaculo');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` char(32) NOT NULL,
  `id_nivel` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `correo` varchar(60) NOT NULL,
  `domicilio` varchar(80) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `id_nivel` (`id_nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`id`, `usuario`, `contrasenia`, `id_nivel`, `nombre`, `apellido`, `correo`, `domicilio`, `telefono`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, '', '', '', '', ''),
(2, 'user', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL, NULL, 'null@null.com.ar', NULL, NULL);

-- --------------------------------------------------------

ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`id_imagen`) REFERENCES `imagenes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articulos_ibfk_3` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id`) ON UPDATE CASCADE;

ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id`) ON UPDATE CASCADE;