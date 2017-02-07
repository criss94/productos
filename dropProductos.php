<?php
    $cod_producto=$_POST["cod_producto"];
    require_once "conexion.php";
    $sql="DELETE FROM productos WHERE cod_producto=".$cod_producto;
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once"validar.php";
    $titulo="Datos eliminados";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <?php
            if ($checkeo !=1) {
                ?>
                <table class="table">
                    <tr>
                        <th><h3 class="btn-danger">Error al eliminar los datos,<br> ó los datos ya fueron eliminados</h3></th>
                    </tr>
                    <tr>
                        <td align="center"><a href="panelProductos"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table">
                    <tr>
                        <th colspan="2"><h3 class="btn-success">Se eliminó el producto correctamente</h3></th>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="panelProductos"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>