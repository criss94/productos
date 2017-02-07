<?php
    $sqlImagen="";
    $ruta="imagenes/";
    $imagen="sin-foto.png";
    if ($_FILES["imagen"]["name"]!=""){
        $imagen=$_FILES["imagen"]["name"];
        $imagentmp=$_FILES["imagen"]["tmp_name"];
        move_uploaded_file($imagentmp,$ruta.$imagen);
        $sqlImagen=",imagen='".$imagen."'";
    }

    $id_usuario=$_POST["id_usuario"];
    $usuario=$_POST["usuario"];
    $psw=$_POST["psw"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $mail=$_POST["mail"];
    $edad=$_POST["edad"];
    $sexo=$_POST["sexo"];
    $tipo=$_POST["tipo"];
    $numero=$_POST["numero"];
    $fuma=$_POST["fuma"];
    $pais=$_POST["pais"];

    require_once "conexion.php";
    $sql="UPDATE usuarios SET usuario='".$usuario."',
                              psw='".$psw."',
                              nombre='".$nombre."',
                              apellido='".$apellido."',
                              mail='".$mail."',
                              edad=".$edad.",
                              sexo='".$sexo."',
                              tipo='".$tipo."',
                              numero=".$numero.$sqlImagen.",
                              fuma='".$fuma."',
                              pais='".$pais."'
                              WHERE id_usuario=".$id_usuario;
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Usuario Editado";
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
                        <td align="center">Error al editar los datos o ya fue editado</td>
                    </tr>
                    <tr>
                        <td align="center"><a href="panelUsuarios.php"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Nuevo usuario editado</th>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><?php echo $usuario; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><?php echo $psw; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <td>Apellido</td>
                        <td><?php echo $apellido; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $mail; ?></td>
                    </tr>
                    <tr>
                        <td>Edad</td>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td><?php echo $sexo; ?></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td><?php echo $tipo; ?></td>
                    </tr>
                    <tr>
                        <td>Numero</td>
                        <td><?php echo $numero; ?></td>
                    </tr>
                    <tr>
                        <td>Fuma</td>
                        <td><?php echo $fuma; ?></td>
                    </tr>
                    <tr>
                        <td>Pais</td>
                        <td><?php echo $pais; ?></td>
                    </tr>
                    <tr>
                        <td>Imagen</td>
                        <td><img src="imagenes/<?php echo $imagen; ?>" alt="" width="80" height="80"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><a href="panelUsuarios.php"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }
        ?>
    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>