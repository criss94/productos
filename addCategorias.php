<?php
    $categoria=$_POST["descripcion"];

    require_once "conexion.php";
    $sql="INSERT INTO categorias VALUES(NULL,'".$categoria."')";
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);
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
        <?php
            if ($checkeo !=1) {
                ?>
                <table class="table">
                    <tr>
                        <td align="center">Error al subir los datos</td>
                    </tr>
                    <tr>
                        <td><a href="panelCategorias"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Nueva categoria agregada</th>
                    </tr>
                    <tr>
                        <th>Categoria</th>
                        <td><?php echo $categoria; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="panelCategorias"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>