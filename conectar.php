<?php
mysql_connect("localhost", "root") OR DIE("No ha sido posible conectar a la tabla");
@mysql_query("SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
mysql_select_db("banco")OR DIE("No ha sido posible conectar a la Base de Datos");
?>
