<?php
    require_once "conexion.php";
    $sql="SELECT id_usuario,usuario,psw,nombre,apellido,mail,edad,sexo,tipo,numero,fuma,pais,imagen FROM usuarios";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    $titulo="Listado de Usuarios";
    sleep(1);
?>

    <div class="container">
        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50 auto;padding: 30px">
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th>Usuario</th>
                <th>Password</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Tipo</th>
                <th>Numero</th>
                <th>Fuma</th>
                <th>Pais</th>
                <th>imagen</th>
            </tr>
            <?php
                while ($fila=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $fila["usuario"]; ?></td>
                <td style="display: block;width:120px;overflow: auto"><?php echo $fila["psw"]; ?></td>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["apellido"]; ?></td>
                <td><?php echo $fila["mail"]; ?></td>
                <td><?php echo $fila["edad"]; ?></td>
                <td><?php echo $fila["sexo"]; ?></td>
                <td><?php echo $fila["tipo"]; ?></td>
                <td><?php echo $fila["numero"]; ?></td>
                <td><?php echo $fila["fuma"]; ?></td>
                <td><?php echo $fila["pais"]; ?></td>
                <td><img class="img-rounded" src="imagenes/<?php echo $fila["imagen"]; ?>" alt="" width="80" height="80"></td>
            </tr>
            <?php } ?>
            <tr id="cantidad">
                <td colspan="14">Se encontraron <?php echo $cantidad; ?> registros en la tabla</td>
            </tr>
        </table>
    </div>
