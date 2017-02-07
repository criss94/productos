<?php
    require_once "conexion.php";
    require_once "validar.php";
    $sql="SELECT cod_pelicula,nombre,genero,descripcion,stock,disponibles FROM peliculas";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="Panel de Peliculas";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container arriba">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th>Nombre</th>
                <th>Genero</th>
                <th>Descripcion</th>
                <th>stock</th>
                <th>Disponibles</th>
                <th class="text-center" colspan="2"><a href="formAddPeliculas"><img src="imgs/add.png" alt=""></a></th>
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
                <td><a href="formEditPeliculas?cod_pelicula=<?php echo $fila["cod_pelicula"]; ?>"><img src="imgs/edit.png" alt=""></a></td>
                <td><a href="formDropPeliculas?cod_pelicula=<?php echo $fila["cod_pelicula"]; ?>"><img src="imgs/drop.png" alt=""></a></td>
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