<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$cn = mysql_connect("localhost:3306","baraho5_ubar32","97Bzra-hgf*r7893");
mysql_select_db("baraho5_bdbarahona", $cn);
mysql_query("SET NAMES 'utf8'");

// $cn = mysql_connect("localhost:8889","baraho5_ubar32","97Bzra-hgf*r7893");
// mysql_select_db("baraho5_bdbarahona", $cn);
// mysql_query("SET NAMES 'utf8'");
?>
