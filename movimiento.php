<?php
    session_start();
    $cod_producto=$_POST["cod_producto"];
    $cantidad=$_POST["cantidad"];
    $tipo=$_POST["tipo"];
    $fecha=date("Y-m-d");
    $id_usuario=$_SESSION["id_usuario"];

    require_once "conexion.php";

    if ($tipo=="Compra"){
        $sql="UPDATE productos SET stock=stock+".$cantidad." WHERE cod_producto=".$cod_producto;
        mysqli_query($link,$sql) or die(mysqli_error($link));
        $incremento_stock=mysqli_affected_rows($link);
    }
    if ($tipo=="Venta"){
        $sql="UPDATE productos SET stock=stock-".$cantidad." WHERE cod_producto=".$cod_producto;
        mysqli_query($link,$sql) or die(mysqli_error($link));
        $decremento_stock=mysqli_affected_rows($link);
    }

    $sql="INSERT INTO movimiento VALUES(NULL,".$cod_producto.",
                                            ".$cantidad.",
                                            '".$tipo."',
                                            '".$fecha."',
                                            ".$id_usuario.")";

    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);

    $sql="SELECT cod_producto,nombre,stock FROM productos WHERE cod_producto=".$cod_producto;
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila=mysqli_fetch_assoc($result) or die(mysqli_error($link));

    $sql="SELECT id_usuario,nombre FROM usuarios WHERE id_usuario=".$id_usuario;
    $result1=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila1=mysqli_fetch_assoc($result1) or die(mysqli_error($link));

    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Registro de venta y compra de productos";
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
                        <td align="center">Error al registrar los datos</td>
                    </tr>
                    <tr>
                        <td><a href="formMovimiento"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Registro de productos</th>
                    </tr>
                    <tr>
                        <th>Producto</th>
                        <td><?php echo $fila["nombre"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td><?php echo $tipo; ?></td>
                    </tr>
                    <tr>
                        <th>Nueva Cantidad</th>
                        <td><?php echo $fila["stock"]; ?></td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td><?php echo $fecha; ?></td>
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <td><?php echo $fila1["nombre"]; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="formMovimiento"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>