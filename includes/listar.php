<?php
include("../dll/config.php");
include("../dll/mysql.php");
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
	<h3><span class="icon-user"></span>Listar Registros</h3>
		<?php
		$query = "select a.id, a.nombre, a.apellido, a.cedula, a.email,a.tipo_paciente, m.nombre  from atenciones_medicas a, medicos m where a.id_medico=m.id";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		echo "<table class='table'>";
		echo "<tr>";
			echo "<td><strong>ID</strong></td>";
			echo "<td><strong>NOMBRE</strong></td>";
			echo "<td><strong>APELLIDO</strong></td>";
			echo "<td><strong>CEDULA</strong></td>";
			echo "<td><strong>CORREO</strong></td>";
			echo "<td><strong>TIPO</strong></td>";
			echo "<td><strong>DOCTOR</strong></td>";
		echo "</tr>";
		while ($line = mysql_fetch_row($result)){ 
		    echo "<tr>";
		        echo "<td>$line[0]</td>";
		        echo "<td>$line[1]</td>";
		        echo "<td>$line[2]</td>";
		        echo "<td>$line[3]</td>";
		        echo "<td>$line[4]</td>";
		        echo "<td>$line[5]</td>";
		        echo "<td>$line[6]</td>";
		        echo "<td><a href='diagnostico.php?id=$line[0]' class='diagnostico'><span class='icon-bug'></span></a></td>";
		        echo "<td><a href='actualizar.php?id=$line[0]' class='actualizar'><span class='icon-pencil'></span></a></td>";
		        echo "<td><a href='borrar.php?id=$line[0]' class='borrar'><span class='icon-trashcan'></span></a></td>";
		    echo "</tr>";
		}
		echo "</table>";

		?>
	</section>
	<?php
	include ("footer.php");
	?>
</body>
</html>