<meta charset="utf-8" />
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
?>
    <script type="text/jscript">
<?php
    if(isset($_GET['confirm']) && $_GET['confirm']==true){
        $id         = $_GET['id'];
        $query      = "DELETE FROM clientes WHERE id='$id'";
        $resultado  = $conexion->query( $query);
        echo "window.location='index.php';";
    }else{
?>
        if(confirm("¿Esta seguro que desea eliminar el registro?")){
            alert('Registro eliminado correctamente.');
            window.location='eliminar.php?id=<?php echo $_GET['id'];?>&confirm=true';
        }else{
            alert('El registro no se ha eliminado.');
            window.location='index.php';
        }
<?php
    }
?>
    </script>
<?php
    require_once('foot.php');
?>