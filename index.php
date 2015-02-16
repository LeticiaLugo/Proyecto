<?php
    /** 
     * SISTEMA PARA EL CONTROL DE CLIENTES
     * Este sistema permite al usuario agregar, actualizar y eliminar clientes.
     * 
     * @Package   MiProyecto
     * @Author    Leticia Aracely Lugo Castillo <leticialugo94@gmail.com>
     * 
    */

	require_once('conexiondb.php');
	/** 
	* Esta condicion IF realiza una busqueda en la tabla clientes, 
	* donde el nombre sea ordenado por la ID
	* Las variables en uso son $buscar, $resultado.
	* 
	*/

	if ($_POST) {
		$buscar = $_POST['buscar'];

		$query 	= "SELECT * FROM clientes WHERE nombre LIKE '%".($buscar)."%' ORDER BY id";
		$resultado = $conexion->query($query);
		
	} else {
		/** 
		* En esta consulta se utiliza la tabla clientes, ordenandolos por su ID
		* Y tine como resultado la conexion con la base de datos
		*/

		$query = "SELECT * FROM clientes ORDER BY id";
		$resultado = $conexion->query($query);

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema control de clientes</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="contenido">
		<h1>Consulta de clientes:</h1>
		<div class="herramientas">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<a href="index.php" >Inicio</a>
				<a href="insertar.php">Nuevo cliente</a>
				<input type="text" name="buscar" placeholder="Nombre a buscar" required/>
				<input type="submit" value="Búsqueda">
			</form>
		</div>
		<section class="tabla">
		<table>
			<tbody>
				<tr>
					<th> Id</th>
					<th> Estado Id</th>
					<th> Nombre</th>
					<th> Apellido</th>
					<th> Teléfono</th>
					<th> Correo electrónico</th>
					<th> Acción</th>
					<th> </th>
				</tr>

<?php
	if ($resultado->num_rows>0) {
		while($row=$resultado->fetch_assoc()) {
?>

				<tr class="trhover">
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['estado_id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['apellidos']; ?></td>
					<td><?php echo $row['telefono']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td class="opciones">
						<a href="actualizar.php?id=<?php echo $row['id'];?>">Actualizar</a>
						<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
					</td>
				</tr>

<?php
		}
	} else {
		echo "<script type='text/javascript'>
		alert('No hubo resultado.');
		window.location='index.php';
		</script>";
	}
?>

			</tbody>
		</table>
		</section>
	</section>
</body>
</html>