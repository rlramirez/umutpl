<?php
include("../dll/config.php");
include("../dll/mysql.php");
extract($_GET);

$query = "delete from atenciones_medicas where id='$id'";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

echo '<script>alert("Datos eliminados..")</script>';
echo "<script>location.href='listar.php'</script>";
?>
