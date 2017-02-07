<?php
    require_once "validar.php";
    require_once "conexion.php";
    $cod_producto=$_GET["cod_producto"];
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
      LEFT JOIN marcas AS m ON p.cod_marca=m.cod_marca
          WHERE p.cod_producto=".$cod_producto;

    $result=mysqli_query($link,$sql);
    $fila=mysqli_fetch_assoc($result);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="Eliminar Producto";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <form action="dropProductos" method="post" onsubmit="return eliminar()" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <table class="table">
                <tr id="encabezadoTabla">
                    <th colspan="2">Eliminar un producto</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $fila["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td><?php echo $fila["precio"]; ?></td>
                </tr>
                <tr>
                    <th>Categoria</th>
                    <td><?php echo $fila["descripcion"]; ?></td>
                </tr>
                <tr>
                    <th>Marca</th>
                    <td><?php echo $fila["nombre_marca"]; ?></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="cod_producto" value="<?php echo $cod_producto; ?>"></td>
                    <td colspan="2"><input type="submit" value="eliminar" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

    <script src="js/validarProductos.js"></script>
</body>
</html>