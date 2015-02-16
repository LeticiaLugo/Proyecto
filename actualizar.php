<?php
    /** 
     * SISTEMA PARA EL CONTROL DE CLIENTES
     * Este sistema permite al usuario agregar, actualizar y eliminar clientes.
     * 
     * @Package   MiProyecto
     * @Author    Leticia Aracely Lugo Castillo <leticialugo94@gmail.com>
     * 
    */
    require('conexiondb.php');

    if ($_GET) {
        $id = $_GET[ 'id'];
        $query = "SELECT * FROM clientes WHERE id='$id'";
        $resultado  = $conexion->query( $query);
        $row = $resultado->fetch_assoc();
    }

    if ($_POST) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $query = "UPDATE clientes SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email' WHERE id='$id'";
        $resultado = $conexion->query( $query);

        if ($resultado>0) {
            echo "  <script type='text/javascript'>
                        alert('Cliente actualizado satisfactoriamente.');
                        window.location='index.php';
                    </script> ";
        } else {
            echo "  <script type='text/javascript'>
                        alert('Error al actualizar al cliente, intente otra vez.');
                        window.location='javascript:history.back()';
                    </script> ";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualización del cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="contenido">
    <h2>Formulario actualización del cliente:</h2>
        <form name="formedit" action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="nombre"  placeholder="Nombre del cliente" value="<?php echo $row['nombre']; ?>" required/><br/>
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']; ?>" required/><br/>
            <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" required/><br/>
            <input type="text" name="email" placeholder="Correo electronico" value="<?php echo $row['email']; ?>" required/><br/>
            <a href="index.php">Cancelar</a>
            <input id="enviar" class="botonformulario" type="submit" name="enviar_btn" value="Actualizar" />
        </form>
</section>
</body>
</html>