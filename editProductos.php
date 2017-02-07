<?php
    $cod_producto=$_POST["cod_producto"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $cod_categoria=$_POST["cod_categoria"];
    $cod_marca=$_POST["cod_marca"];
    $stock=0;

    require_once "conexion.php";
    $sql="UPDATE productos SET cod_categoria=".$cod_categoria.",
                               nombre='".$nombre."',
                               precio=".$precio.",
                               stock=".$stock.",
                               cod_marca=".$cod_marca."
                         WHERE cod_producto=".$cod_producto;
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);


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
     WHERE cod_producto=".$cod_producto;
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila=mysqli_fetch_assoc($result);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Producto editado";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container col-lg-4 col-lg-offset-4" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <?php
            if ($checkeo !=1) {
                ?>
                <table class="table">
                    <tr>
                        <td align="center">Error al subir los datos</td>
                    </tr>
                    <tr>
                        <td><a href="panelProductos"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Producto editado</th>
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
                        <td colspan="2" align="center"><a href="panelProductos.php"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>