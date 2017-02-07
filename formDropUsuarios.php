<?php
    require_once "validar.php";
    require_once "conexion.php";
    $id_usuario=$_GET["id_usuario"];
    $sql="SELECT usuario,psw,nombre,apellido,mail,edad,sexo,tipo,numero,fuma,pais,imagen FROM usuarios WHERE id_usuario=".$id_usuario;
    $result=mysqli_query($link,$sql);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    $titulo="Eliminar Usuario";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->
        <form action="dropUsuarios" method="post" onsubmit="return eliminar()" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <table class="table">
                <tr id="encabezadoTabla">
                    <th colspan="2">Eliminar un usuario</th>
                </tr>
                <?php
                    while ($fila=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th>Usuario</th>
                    <td><?php echo $fila["usuario"]; ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo $fila["psw"]; ?></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $fila["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td><?php echo $fila["apellido"]; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $fila["mail"]; ?></td>
                </tr>
                <tr>
                    <th>Edad</th>
                    <td><?php echo $fila["edad"]; ?></td>
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td><?php echo $fila["sexo"]; ?></td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td><?php echo $fila["tipo"]; ?></td>
                </tr>
                <tr>
                    <th>Numero</th>
                    <td><?php echo $fila["numero"]; ?></td>
                </tr>
                <tr>
                    <th>Fuma</th>
                    <td><?php echo $fila["fuma"]; ?></td>
                </tr>
                <tr>
                    <th>Pais</th>
                    <td><?php echo $fila["pais"]; ?></td>
                </tr>
                <tr>
                    <th>Imagen actual</th>
                    <td><img src="imagenes/<?php echo $fila["imagen"]; ?>" alt="" width="80" height="80"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"></td>
                    <td colspan="2"><input type="submit" value="eliminar" class="btn btn-primary"></td>
                </tr>
            </table>
            <?php
                }
            ?>
        </form>
    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

    <script src="js/validarUsuarios.js"></script>
</body>
</html>