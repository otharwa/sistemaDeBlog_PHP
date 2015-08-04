

** Sobre el sitio:

El sitio web que aqui se presenta fue pensado para una pequeña emisora radial. Las necesidades a cubrir son la de publicar articulos, con sus respectivas imagenes, administracion del conjunto y divicion por categorias. Tambien se utiliza el recurso de seccion principal, donde se muestra el ultimo articulo publicado, y las ultimas imagenes publicadas.
Otra necesidad que se satisface es la votacion de temas musicales por parte de los usuarios registrados.

Los niveles manejados son 2, administradores, quienes pueden editar, agregar, articulos o imagenes, y visitantes queines por el momento solo puede hacer uso del modulo para votar temaas musicales.




** Sobre las tablas:

 - Usuarios: en esta tabla se registran los datos de los usuarios nuevos, y administrativos creados junto a la instalacion del sistema. El campo id_nivel se vincula con la tabla "niveles".
[muchos usuarios tienen un nivel]

- Niveles: vinculada con la tabla usuarios, es donde se alamcenan los roles que pueden cumplir los usuarios, en esta plataforma tenemos 2 roles unicamente, el administrador que puede crear nuevos articulos, agregar imagenes, etc, y el usuario visitante.
[un nivel tiene muchos usuarios]

- Musica: esta tabla no posee relacion con otras y cumple la funcion de almacenar el listado de temas musicales, y los correspondientes votos que le asignan los usuarios. Es un mero modulo del sistema y por eso no se priorizo la relacion con el resto de los datos.
[relacion huerfana]

- Articulos: todos los articulos creados se almacenan en esta tabla junto a su informacion particular, como ser fecha de publicacion, contenido, tags y titulo. Las imagenes, estado y seccion se relacionan con estras otras tablas.
[muchos articulos, tienen un estado]
[muchos articulos, tienen una imagen]
[muchos articulos, tienen una seccion]

- Estados: almacena los posibles estados de los articulos, como ser publicado y borrador.
[un estado, tiene muchos articulos]

- Secciones: aqui se listan las categorias donde se pueden clasificar a los articulos.
[una seccion, tiene muchos articulos]

- Imagenes: todas las imagenes creadas en el sistema se indexan en esta tabla, las mismas tienen datos basicos como nombre de archivo (no url), titulo y descripcion.
[muchas imagenes, tienen una categoria]

- Categorias: cada imagen se puede asignar a una categoria para diferenciar usos, lugares donde ser mostradas, etc.
[una categoria, tiene muchas imagenes]



** Creacion de vista

CREATE VIEW feed_news AS (
SELECT articulos.id, articulos.titulo, articulos.fecha_publicacion, articulos.articulo, CONCAT( 'https://raw.githubusercontent.com/0th4rw4/sistemaDeBlog_PHP/master/img/articulos/', imagenes.archivo ) AS src, imagenes.titulo AS alt
FROM articulos
JOIN imagenes ON articulos.id_imagen = imagenes.id
JOIN estados ON articulos.id_estado = estados.id
WHERE estados.estado = 'Aprobado'
ORDER BY articulos.fecha_publicacion ASC);

 - Explicacion: La vista feed_news, fue creada con el proposito de suministrar los datos de publicacion a sitios externos, quienes requieren una informacion limitada al entorno de la publicacion de un articulo y no requieren agregar nueva informacion.
Este es uno de los motivos por los cuales se incluye la url completa desde donde acceder a las imagenes, armando una concatenacion. Datos adicionales como el ID del articulo sirven a modo de agregado, para facilitar el uso de enlaces permanentes y otros.