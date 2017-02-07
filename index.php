<?php
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
          ORDER BY p.precio DESC";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $cantidad=mysqli_num_rows($result);
?>
<?php
    require_once "templates/header.php";
    $titulo="Vista de todos los productos Disponibles";
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
    <div id="contenedor" class="container arriba">
<!--
        <br>
        <div id="google_translate_element"></div><script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'la', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->

        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50px auto;padding: 30px">
        </div>
        <!--desarrollo del proyecto-->
        <h2><?php echo $titulo; ?></h2>
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria del Producto</th>
                <th>Marca del Producto</th>
            </tr>
            <?php
                while($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td>$ <?php echo $row["precio"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td><?php echo $row["nombre_marca"]; ?></td>
                    </tr>
                    <?php
                }
            ?>
            <tr id="cantidad">
                <td colspan="8">Se encontraron <b><?php echo $cantidad; ?></b> productos en la tabla</td>
            </tr>
        </table>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>