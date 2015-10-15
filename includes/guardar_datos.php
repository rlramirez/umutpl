<?php
include("../dll/config.php");
include("../dll/mysql.php");
extract($_POST);
$fecha_actual=date("Y-m-d");
$dias=dias_transcurridos($fecha_nacimiento,$fecha_actual);
$anios=$dias/365;

if ($anios>0 and $anios <= 2.9) {$tipo_paciente="Bebe";}
if ($anios>=3 and $anios <= 12.9) {$tipo_paciente="Ninio";}
if ($anios>=13 and $anios <= 18.9) {$tipo_paciente="Adolecente";}
if ($anios>19 and $anios <= 49.9) {$tipo_paciente="Adulto";}
if ($anios>=50 and $anios <= 65) {$tipo_paciente="Mayor";}
if ($anios>65) {$tipo_paciente="3ra edad";}

$query = "insert into atenciones_medicas values('','$nombre','$apellido','$cedula','$genero','$fecha_nacimiento','$correo','$direccion','$tipo_paciente','$medico','$sintomas','$prescripcion','$indicaciones')";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query1 = "select max(id) from atenciones_medicas";
$result1 = mysql_query($query1) or die('Consulta fallida: ' . mysql_error());
while ($line = mysql_fetch_row($result1)){ 
        $id_atencion=$line[0];
}

for ($i=0;$i<count($enfermedades);$i++)    
{     
	$query = "insert into diagnosticos values('','$id_atencion','$enfermedades[$i]')";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());   
} 
echo '<script>alert("datos guardados..")</script>';
echo "<script>location.href='listar.php'</script>";

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
// Ejemplo de uso:


?>
