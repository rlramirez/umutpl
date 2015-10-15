<?php
include("../dll/config.php");
include("../dll/mysql.php");
extract($_GET);
extract($_POST);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $site_name; ?></title>
	<link rel="stylesheet" href="<?=$url_site?>css/estilos.css">
	<link rel="stylesheet" href="<?=$url_site?>img/style.css">
</head>
<body>
	<?php
	include ("header_menu.php");
	?>
	<section id="contenedor">
	<form action="medicos.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label for="nombre">Nombre y Apellidos *</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres y Apellidos" required>
					<input type="hidden" name="var" value="2">
				</div>
				<div class="form-group">
					<label for="codigo">Código de Registro Médico *</label>
					<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de Registro Médico" required>
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
			</form>


	<h3><span class="icon-user"></span>Lista de Médicos Registrados</h3>
		<?php
		$query = "select * from medicos";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		echo "<table class='table'>";
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    echo "<tr>";
		    foreach ($line as $col_value) {
		        echo "<td>$col_value</td>";
		    }
		        echo "<td><a href='medicos.php?var=1&id=$line[id]' class='borrar'><span class='icon-trashcan'></span></a></td>";
		    echo "</tr>";
		}
		echo "</table>";
		if ($var==1) {
			$query = "delete from medicos where id='$id'";
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
			echo "<script>location.href='medicos.php'</script>";
		}
		if ($var==2) {
			$query = "insert into medicos values('','$nombre','$codigo')";
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
			echo "<script>location.href='medicos.php'</script>";
		}
		?>
	</section>
	<?php
	include ("footer.php");
	?>
</body>
</html>