<?php
    require_once "conexion.php";
    require_once "validar.php";
    $sql="SELECT p.cod_producto,
                 p.cod_categoria,
                 c.descripcion,
                 p.nombre,
                 p.precio,
                 p.stock,
                 p.cod_marca,
                 m.nombre_marca
           FROM productos AS p
     LEFT JOIN categorias AS c ON p.cod_categoria=c.cod_categoria
     LEFT JOIN marcas AS m ON p.cod_marca=m.cod_marca";

    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="Panel de Productos";
?>

</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container arriba col-lg-9 col-lg-offset-2">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <!-- no es necesario mostrar los IDs -->
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th class="text-center" colspan="2"><a href="formAddProductos"><img src="imgs/add.png" alt=""></a></th>
            </tr>
            <?php
                while ($fila=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["precio"]; ?></td>
                <td><?php echo $fila["stock"]; ?></td>
                <td><?php echo $fila["descripcion"]; ?></td>
                <td><?php echo $fila["nombre_marca"]; ?></td>
                <td><a href="formEditProductos?cod_producto=<?php echo $fila["cod_producto"]; ?>"><img src="imgs/edit.png" alt=""></a></td>
                <td><a href="formDropProductos?cod_producto=<?php echo $fila["cod_producto"]; ?>"><img src="imgs/drop.png" alt=""></a></td>
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