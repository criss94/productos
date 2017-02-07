<?php
    require_once "conexion.php";
    $sql="SELECT cod_categoria,descripcion FROM categorias";
    $result=mysqli_query($link,$sql) or die(mysqli_error($link));

    $sql="SELECT cod_marca,nombre_marca FROM marcas";
    $result1=mysqli_query($link,$sql) or die(mysqli_error($link));
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="";
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
    <div class="container arriba" id="contenedor">
        <div align="center">
            <img src="imgs/loading.gif" alt="" id="imagenAjax" style="display: none;margin:50px auto;padding: 30px">
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <form action="buscar" method="get" class="form-horizontal col-xs-6 col-md-offset-3" style="background-color: #2b669a;padding: 15px;border-radius: 6px;color: white">
            <fieldset>
                <legend style="text-align: center;color: white">Búsqueda avanzada</legend>
                <div class="form-group col-md-12">
                    <label for="inputEmail" class="col-lg-2 control-label">Producto</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEmail" placeholder="Nombre del Producto" type="text" name="palabra">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="select" class="col-lg-2 control-label">Categorias</label>
                    <div class="col-lg-10">
                        <select name="cod_categoria" class="form-control" id="select">
                                <option value="0">Todos</option>
                                <?php
                                     while ($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row["cod_categoria"]; ?>"><?php echo $row["descripcion"]; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="select" class="col-lg-2 control-label">Marcas</label>
                    <div class="col-lg-10">
                        <select name="cod_marca" class="form-control" id="select">
                            <option value="0">Todos</option>
                            <?php
                                while ($row1=mysqli_fetch_assoc($result1)){
                                ?>
                                <option value="<?php echo $row1["cod_marca"]; ?>"><?php echo $row1["nombre_marca"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-5">
                        <button type="submit" class="btn btn-primary">Búscar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>

    <div id="footer">
             <?php require_once "templates/pie.php"; ?>
    </div>
</body>
</html>