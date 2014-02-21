Sistema de CMS para blog radial, con base de datos.

toDOs
=====

- que el archivo config/install.php funcione bien

- colocar las consultas a base de datos en archivo query/querys.php

- colocar consigna de trabajo en este archivo

- revisar funcionalidad

- colocar .htaccess en los lugares adecudos

config/install.php
==================
Hacer los bloques de CREATE TABLE, por separados puede ser un array que luego se recorra, varios if, un switch case, etc. <br/>
El caso es que todo eso se pasa por ciclo While(todas las consultas procesadas)   $seEjecuto++ if (hubo error) $error++;
