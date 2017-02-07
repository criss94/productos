<?php
    require_once "conexion.php";
    $sql="SELECT cod_producto,cod_categoria,nombre,precio,stock,cod_marca FROM productos";
    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));

    $sql="SELECT id_usuario,nombre FROM usuarios";
    $resultado1=mysqli_query($link,$sql) or die(mysqli_error($link));
    mysqli_close($link);

?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Control de movimiento de Productos";
?>

</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2><br>
        <!--desarrollo del proyecto-->

        <form action="movimiento" method="post" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <fieldset>
                 <div class="form-group">
                    <label for="select" class="col-lg-4 control-label">Producto</label>
                    <div class="col-lg-7">
                        <select class="form-control" id="select" name="cod_producto">
                            <?php
                                 foreach ($resultado as $fila){
                            ?>
                                <option value="<?php echo $fila["cod_producto"]; ?>"><?php echo $fila["nombre"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-4 control-label">Tipo de consumo</label>
                    <div class="col-lg-7">
                        <select class="form-control" id="select" name="tipo">
                            <?php
                                $tipo=array("Compra"=>"Compra","Venta"=>"Venta");
                                foreach ($tipo as $valor =>$nombre){
                                ?>
                                <option value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cantidad" class="col-lg-4 control-label">Cantidad total</label>
                    <div class="col-lg-7" id="stock" style="color: black">

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-4 control-label">Cantidad a Sumar ó Restar al Stock actual</label>
                    <div class="col-lg-7">
                        <input class="form-control" id="inputUser" placeholder="Cantidad" type="text" name="cantidad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectPais" class="col-lg-4 control-label">Usuario Responsable</label>
                    <div class="col-lg-7">
                        <input class="form-control" id="inputUser" type="text" value="<?php echo $_SESSION["nombre"];?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-5">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>



    <script src="js/jquery.js"></script>
    <script>

        $("#select").change(function () {
            var productos=$("#select option:selected").val();
            var mandarDatos="id="+productos;
            $.ajax({
                type:"POST",
                url:"stockConAjax.php",
                data:mandarDatos,
                success:function (data) {
                    $("#stock").html(data);
                }
            });
        });

    </script>

</body>
</html>