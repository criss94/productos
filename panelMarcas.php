<?php
    require_once "conexion.php";
    require_once "validar.php";
    $sql="SELECT cod_marca,nombre_marca FROM marcas";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="Panel de Marcas";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container arriba col-lg-3 col-lg-offset-4">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th>Nombre</th>
                <th class="text-center" colspan="2"><a href="formAddMarcas"><img src="imgs/add.png" alt=""></a></th>
            </tr>
            <?php
                while ($fila=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $fila["nombre_marca"]; ?></td>
                <td><a href="formEditMarcas?cod_marca=<?php echo $fila["cod_marca"]; ?>"><img src="imgs/edit.png" alt=""></a></td>
                <td><a href="formDropMarcas?cod_marca=<?php echo $fila["cod_marca"]; ?>"><img src="imgs/drop.png" alt=""></a></td>
            </tr>
            <?php } ?>
            <tr id="cantidad">
                <td colspan="14">Se encontraron <?php echo $cantidad; ?> registros en la tabla</td>
            </tr>
        </table>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>