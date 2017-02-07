<?php
    require_once "conexion.php";
    $sql="SELECT cod_pelicula,nombre,genero,descripcion,stock,disponibles FROM peliculas";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    $titulo="Listado de Peliculas";
    sleep(1);
?>

    <div class="container">
        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50px auto;padding: 30px">
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th>Nombre</th>
                <th>Género</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Disponible</th>
            </tr>
            <?php
                while ($fila=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["genero"]; ?></td>
                <td><?php echo $fila["descripcion"]; ?></td>
                <td><?php echo $fila["stock"]; ?></td>
                <td><?php echo $fila["disponibles"]; ?></td>
            </tr>
            <?php } ?>
            <tr id="cantidad">
                <td colspan="14">Se encontraron <?php echo $cantidad; ?> registros en la tabla</td>
            </tr>
        </table>
    </div>