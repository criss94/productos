<?php
    $cod_categoria=$_GET["cod_categoria"];
    require_once "conexion.php";
    $sql="SELECT cod_categoria,descripcion FROM categorias WHERE cod_categoria=".$cod_categoria;
    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila=mysqli_fetch_assoc($resultado);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Agregar nueva Categoria";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2><br>
        <!--desarrollo del proyecto-->

        <form action="editCategorias" method="post" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <fieldset>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">Categoria</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputUser" type="text" name="descripcion" value="<?php echo $fila["descripcion"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-5">
                        <input type="hidden" name="cod_categoria" value="<?php echo$cod_categoria; ?>">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>