<?php
    $nombre=$_POST["nombre"];
    $genero=$_POST["genero"];
    $descripcion=$_POST["descripcion"];
    $stock=$_POST["stock"];
    $disponibles=$_POST["disponibles"];

    require_once "conexion.php";
    $sql="INSERT INTO peliculas VALUES(NULL,'".$nombre."',
                                           '".$genero."',
                                           '".$descripcion."',
                                           ".$stock.",
                                           ".$disponibles.")";
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Pelicula agregada";
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
                        <td><a href="listadoPeliculas"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Nueva pelicula agregada</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Genero</th>
                        <td><?php echo $genero; ?></td>
                    </tr>
                    <tr>
                        <th>Descripcion</th>
                        <td><?php echo $descripcion; ?></td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td><?php echo $stock; ?></td>
                    </tr>
                    <tr>
                        <th>Disponibles</th>
                        <td><?php echo $disponibles; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="panelPeliculas"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>