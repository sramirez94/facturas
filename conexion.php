<?php

/* Variables para la conexion */
    define('servidor','localhost');
    define('base','simmsoft_pruebas');
    define('usuario','usuario');
    define('pass','simm#1234');

/* Establecer conexion */
$con = mysql_connect(servidor,usuario,pass);
mysql_select_db(base);

?>
