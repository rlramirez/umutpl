<?php
//include("config.php");
$link = mysql_connect($db_host,$db_usr,$db_pass)
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($db_name) or die('No se pudo seleccionar la base de datos');
?>