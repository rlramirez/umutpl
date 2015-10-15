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
		<h3>Formulario de Registro de Personal</h3>
			<form action="actualizar_datos.php" method="post" accept-charset="utf-8">

				<div class="form-group">
					<label for="nombre">Nombre *</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo $nombre;?>">
					<input type="hidden" name="id"  value="<?php echo $id;?>">
				</div>
				<div class="form-group">
					<label for="apellido">Apellidos *</label>
					<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" value="<?php echo $apellido;?>">
				</div>
				<div class="form-group">
					<label for="cedula">Cedula *</label>
					<input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="<?php echo $cedula;?>">
				</div>
				<div class="form-group">
					<label for="genero">Genero *</label>
						<select name="genero" id="genero" required>
						  <option value="<?php echo $genero;?>"><?php echo $list_gen[$genero];?></option>
						  <option value="H">Hombre</option>
						  <option value="M">Mujer</option>
						</select> 
				</div>
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha de nacimiento *</label>
					<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="0000-00-00" value="<?php echo $fecha_nacimiento;?>">
				</div>
				<div class="form-group">
					<label for="correo">Correo *</label>
					<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electronico" value="<?php echo $correo;?>">
				</div>
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion;?>">
				</div>
				<div class="form-group">
					<label for="medico">Medico tratante *</label>
					<select name="medico" id="medico" required>
						<?php
							$query1="select * from medicos where id='$id_medico'";
							$medicos = mysql_query($query1) or die('Consulta fallida: ' . mysql_error());
							while ($medico = mysql_fetch_array($medicos, MYSQL_ASSOC)) 
							{ ?>
							<option value="<?php echo $medico['id'];?>"><?php echo $medico['nombre'];?></option><?PHP
							}
						?>
					  	<?php
							$query="select * from medicos";
							$medicos = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
							while ($medico = mysql_fetch_array($medicos, MYSQL_ASSOC)) 
							{ ?>
							<option value="<?php echo $medico['id'];?>"><?php echo $medico['nombre'];?></option><?PHP
							}
						?>
					</select> 
				</div>
				<div class="form-group">
					<label for="sintomas">Sintomas *</label>
					 <textarea name="sintomas" ide="sintomas" rows="4" cols="50" ><?php echo $sintomas;?></textarea> 
				</div>
				<div class="form-group">
					<label for="prescripcion">Prescripcion</label>
					 <textarea name="prescripcion" ide="prescripcion" rows="4" cols="50" ><?php echo $prescripcion;?></textarea> 
				</div>
				<div class="form-group">
					<label for="indicaciones">Indicaciones</label>
					 <textarea name="indicaciones" ide="indicaciones" rows="4" cols="50" ><?php echo $indicaciones;?></textarea> 
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
				
			</form>
	</section>
	<?php
	include ("footer.php");
	?>
</body>
</html>