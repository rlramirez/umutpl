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

echo $query = "update atenciones_medicas set nombre='$nombre',apellido='$apellido',cedula='$cedula',email='$correo',direccion='$direccion', 
		f_nacimiento='$fecha_nacimiento',genero='$genero',tipo_paciente='$tipo_paciente',id_medico='$medico',sintomas='$sintomas', prescripcion='$prescripcion',
		indicaciones='$indicaciones' 
		where id='$id'";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
echo '<script>alert("datos actializados..")</script>';
echo "<script>location.href='listar.php'</script>";


function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
?>
