<?php
    session_start();
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Panel de Administración";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <div id="sesion">
            <p><b>ADMIN: </b><?php echo $_SESSION["nombre"]; ?></p>
        </div>
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <br><br>
        <div align="center" id="admin">
            <a href="panelCategorias"><img src="imgs/categorias.png" alt="" width="100" height="150"></a>
            <a href="panelMarcas"><img src="imgs/marcas.png" alt="" width="150" height="150"></a>
            <a href="panelPeliculas"><img src="imgs/peliculas.png" alt="" width="150" height="150"></a>
        </div>
        <br>
        <div align="center" id="admin">
            <a href="panelProductos"><img src="imgs/productos.png" alt="" width="200" height="200"></a>
            <a href="panelUsuarios"><img src="imgs/usuarios.png" alt="" width="200" height="200"></a>
        </div>


    </div>
    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>