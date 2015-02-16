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

    if($_POST){
        $idEstado = $_POST['estado_id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $query = "INSERT INTO clientes ( estado_id, nombre, apellidos, telefono, email) VALUES ( '$idEstado', '$nombre', '$apellidos', '$telefono', '$email')";
        $resultado = $conexion->query( $query);

        if ($resultado>0) {
            echo "  <script type='text/javascript'>
                        alert('Registro satisfactorio del cliente.');
                        window.location='index.php';
                    </script> ";
        } else {
            echo "  <script type='text/javascript'>
                        alert('Error al registrar cliente, intente otra vez.');
                        window.location='insertar.php';
                    </script> ";
        }
    }

    $sql = "SELECT * FROM estados";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables.

    if ($result->num_rows>0){  //Si la variable tiene al menos una fila continua.
        $estado ="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $estado .=" <option value='".$row['id']."'>".$row['nombre']."</option>";
        }
    }else{
        echo "  <script type='text/javascript'>
                    alert('No hubo resultado.');
                </script> ";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="contenido">
    <h2>Registro de nuevo cliente:</h2>
        <div>
            <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                <select name="estado_id">
                    <option value="">Elige el estado...</option>
                    <?php echo $estado; ?>
                </select><br/>
                <input type="text" name="nombre"  placeholder="Nombre" required/><br/>
                <input type="text" name="apellidos" placeholder="Apellidos" required/><br/>
                <input type="text" name="telefono" placeholder="Telefono" required/><br/>
                <input type="text" name="email" placeholder="Correo electronico" required/><br/>
                <a href="index.php">Cancelar</a>
                <input type="submit" name="enviar" value="Registrar"/>
            </form>
        </div>
</section>
</body>
</html>