<?php
    require_once "conexion.php";
    $sql="SELECT cod_categoria,descripcion FROM categorias";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    $titulo="Listado de Categorias";
    sleep(1);
?>

    <div class="container col-lg-4 col-lg-offset-4">
        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50px auto;padding: 30px">
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla" class="text-center">
                <th class="text-center">Categorias</th>
            </tr>
            <?php
                while ($fila=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $fila["descripcion"]; ?></td>
            </tr>
            <?php } ?>
            <tr id="cantidad">
                <td colspan="14">Se encontraron <?php echo $cantidad; ?> registros en la tabla</td>
            </tr>
        </table>
    </div>
