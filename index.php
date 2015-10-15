<?php
include ("dll/config.php");
include ("dll/mysql.php");
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
	include ("includes/header_menu.php");
	?>
	<section id="contenedor">
			<h3>Formulario de Registro de Personal</h3>
			<form action="includes/guardar_datos.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label for="nombre">Nombre *</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required>
				</div>
				<div class="form-group">
					<label for="apellido">Apellidos *</label>
					<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" required>
				</div>
				<div class="form-group">
					<label for="cedula">Cedula *</label>
					<input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" required>
				</div>
				<div class="form-group">
					<label for="genero">Genero *</label>
						<select name="genero" id="genero" required>
						  <option value=""></option>
						  <option value="H">Hombre</option>
						  <option value="M">Mujer</option>
						</select> 
				</div>
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha de nacimiento *</label>
					<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="0000-00-00" required>
				</div>
				<div class="form-group">
					<label for="correo">Correo *</label>
					<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electronico" required>
				</div>
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
				</div>
				<div class="form-group">
					<label for="medico">Medico tratante *</label>
					<select name="medico" id="medico" required>
						<option value=""></option>
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
					<label for="sintomas">Enfermedades *</label>
					<select name="enfermedades[]" multiple>
					  <?php
							$query="select * from enfermedades";
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
					 <textarea name="sintomas" ide="sintomas" rows="4" cols="50" required></textarea> 
				</div>
				<div class="form-group">
					<label for="prescripcion">Prescripcion</label>
					 <textarea name="prescripcion" ide="prescripcion" rows="4" cols="50"></textarea> 
				</div>
				<div class="form-group">
					<label for="indicaciones">Indicaciones</label>
					 <textarea name="indicaciones" ide="indicaciones" rows="4" cols="50"></textarea> 
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
	</section>
	<?php
	include ("includes/footer.php");
	?>
</body>
</html>