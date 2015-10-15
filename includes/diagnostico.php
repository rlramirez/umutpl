<?php
include("../dll/config.php");
include("../dll/mysql.php");
extract($_GET);
$list_gen['H']='Hombre';
$list_gen['M']='Mujer';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $site_name; ?></title>
	<link rel="stylesheet" href="<?=$url_site?>css/estilos.css">
</head>
<body>
	<?php
	include ("header_menu.php");
	?>
	<section id="contenedor">
		<?php
		$query = "select * from atenciones_medicas where id='$id'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    foreach ($line as $col_value) {
		       // echo "<td>$col_value</td>";
		    	$id=$line['id'];
		    	$nombre=$line['nombre'];
		    	$apellido=$line['apellido'];
		    	$cedula=$line['cedula'];
		    	$genero=$line['genero'];
		    	$fecha_nacimiento=$line['f_nacimiento'];
		    	$correo=$line['email'];
		    	$direccion=$line['direccion'];
		    	$tipo_paciente=$line['tipo_paciente'];
		    	$id_medico=$line['id_medico'];
		    	$sintomas=$line['sintomas'];
		    	$prescripcion=$line['prescripcion'];
		    	$indicaciones=$line['indicaciones'];
		    }
		}
		?>
		<h3>Registro de Personal Atendido</h3>
				<div class="form-group">
					<label for="nombre">Nombre y Apellido</label>
					<?php echo $nombre." ".$apellido;?>
					<input type="hidden" name="id"  value="<?php echo $id;?>">
				</div>
				<div class="form-group">
					<label for="cedula">Cedula</label>
					<?php echo $cedula;?>

					<label for="genero">Genero</label>
						<?php echo $list_gen[$genero];?>

					<label for="fecha_nacimiento">Fecha de nacimiento</label>
					<?php echo $fecha_nacimiento;?>

					<label for="correo">Correo</label>
					<?php echo $correo;?>

					<label for="direccion">Direccion</label>
					<?php echo $direccion;?>

					<label for="medico">Medico Tratante</label>
						<?php
							$query1="select * from medicos where id='$id_medico'";
							$medicos = mysql_query($query1) or die('Consulta fallida: ' . mysql_error());
							while ($medico = mysql_fetch_array($medicos, MYSQL_ASSOC)) 
							{ 
							 echo $medico['nombre'];
							}
						?>
					<label for="medico">DIAGNOSTICO</label>
						<?php
							$query1="select e.nombre from enfermedades e,diagnosticos d where d.id_atencion='$id' and d.id_enfermedad=e.id";
							$medicos = mysql_query($query1) or die('Consulta fallida: ' . mysql_error());
							echo "<ul>";
							while ($medico = mysql_fetch_array($medicos, MYSQL_ASSOC)) 
							{ 
							 echo "<li>".$medico['nombre']."</li>";
							}
							echo "</ul>";
						?>
					<label for="sintomas">Sintomas</label>
					<?php echo $sintomas;?>

					<label for="prescripcion">Prescripcion</label>
					<?php echo $prescripcion;?>

					<label for="indicaciones">Indicaciones</label>
					<?php echo $indicaciones;?>
				</div>
				
	</section>
	<?php
	include ("footer.php");
	?>
</body>
</html>