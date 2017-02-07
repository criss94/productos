<?php
    require_once "templates/header.php";
    $titulo="Panel de productos";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div id="container" class="arriba">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <table class="table table-striped">
            <tr id="encabezadoTabla">
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr id="cantidad">
                <td>Se econtraron <?php echo $cant; ?> registros en la tabla</td>
            </tr>
        </table>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>