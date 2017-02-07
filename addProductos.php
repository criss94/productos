<?php
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $cod_categoria=$_POST["cod_categoria"];
    $cod_marca=$_POST["cod_marca"];
    $stock=0;

    require_once "conexion.php";
    $sql="INSERT INTO productos VALUES(NULL,".$cod_categoria.",
                                           '".$nombre."',
                                           ".$precio.",
                                           ".$stock.",
                                           ".$cod_marca.")";
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $id=mysqli_insert_id($link);
    $sql="SELECT p.cod_producto,p.cod_categoria,c.descripcion,p.nombre,p.precio,p.stock,p.cod_marca,m.nombre_marca FROM productos AS p
           INNER JOIN categorias AS c ON p.cod_categoria=c.cod_categoria
           INNER JOIN marcas AS m ON p.cod_marca=m.cod_marca WHERE p.cod_producto=".$id;
    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila=mysqli_fetch_assoc($resultado);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Producto agregado";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container col-lg-4 col-lg-offset-4" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Nuevo producto agregado</th>
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

    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>