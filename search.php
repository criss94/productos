<?php
    $criterio=$_GET["search"];
    require_once "conexion.php";
    $sql="SELECT p.cod_producto,
             p.nombre,
             p.precio,
             p.stock,
             p.cod_categoria,
             c.descripcion,
             p.cod_marca,
             m.nombre_marca
          FROM productos AS p
          INNER JOIN categorias AS c 
          ON p.cod_categoria = c.cod_categoria
          INNER JOIN marcas AS m 
          ON p.cod_marca = m.cod_marca
          WHERE p.nombre LIKE '%".$criterio."%' OR c.descripcion LIKE '%".$criterio."%' OR m.nombre_marca LIKE '%".$criterio."%'";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
?>
<?php
    require_once "templates/header.php";
    $titulo="Resultados de la Búsqueda";
?>
<script src="js/ajaxCategorias.js"></script>
<script src="js/ajaxMarcas.js"></script>
<script src="js/ajaxPeliculas.js"></script>
<script src="js/ajaxUsuarios.js"></script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container arriba" id="contenedor">
        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50px auto;padding: 30px">
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->

        <?php
            if ($cantidad==0) {
                ?>
                <table class="table">
                    <tr>
                        <td align="center">0 resultados encontrados</td>
                    </tr>
                    <tr>
                        <td align="center"><a href="index.php"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>

                <table class="table table-striped">
                    <tr>
                        <td colspan="8" align="center"><a href="index.php"><input type="submit" value="volver"></a></td>
                    </tr>
                    <tr id="encabezadoTabla">
                        <th>ID Pro</th>
                        <th>Nombre del Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>ID Cat</th>
                        <th>Categoria del Producto</th>
                        <th>ID Mar</th>
                        <th>Marca del Producto</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["cod_producto"]; ?></td>
                            <td><?php echo $row["nombre"]; ?></td>
                            <td>$ <?php echo $row["precio"]; ?></td>
                            <td><?php echo $row["stock"]; ?></td>
                            <td><?php echo $row["cod_categoria"]; ?></td>
                            <td><?php echo $row["descripcion"]; ?></td>
                            <td><?php echo $row["cod_marca"]; ?></td>
                            <td><?php echo $row["nombre_marca"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr id="cantidad">
                        <td colspan="8" class="pie">Se encontraron <?php echo $cantidad; ?> productos en la tabla</td>
                    </tr>

                </table>
                <?php
            }
        ?>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>