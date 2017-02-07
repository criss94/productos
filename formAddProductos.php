<?php
    require_once "conexion.php";
    $sql="SELECT cod_categoria,descripcion FROM categorias";
    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));

    $sql="SELECT cod_marca,nombre_marca FROM marcas";
    $resultado1=mysqli_query($link,$sql) or die(mysqli_error($link));
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Agregar un producto";
?>
<script src="js/jquery.js"></script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2><br>
        <!--desarrollo del proyecto-->

        <form action="addProductos" method="post" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <fieldset>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputUser" placeholder="Nombre" type="text" name="nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Precio</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputPassword" placeholder="Precio" type="text" name="precio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Categorias</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="cod_categoria">
                            <?php
                            foreach ($resultado as $fila){
                            ?>
                                <option value="<?php echo $fila["cod_categoria"]; ?>"><?php echo $fila["descripcion"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectPais" class="col-lg-2 control-label">Marcas</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="selectPais" name="cod_marca">
                            <?php
                            foreach ($resultado1 as $fila1) {
                                ?>
                                <option value="<?php echo $fila1["cod_marca"]; ?>"><?php echo $fila1["nombre_marca"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-5">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>