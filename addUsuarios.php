<?php
    $ruta="imagenes/";
    $imagen="sin-foto.png";
    if ($_FILES["imagen"]["name"]!=""){
        $imagen=$_FILES["imagen"]["name"];
        $imagentmp=$_FILES["imagen"]["tmp_name"];
        move_uploaded_file($imagentmp,$ruta.$imagen);
    }

    $usuario=$_POST["usuario"];

    $psw=$_POST["psw"];
    $security_psw=password_hash($psw,PASSWORD_BCRYPT,["cost"=>8]);//creamos un hash para la pass
    //$verify_psw=password_verify($psw,$security_psw);// verificamos si la pass es correcta con el hash creado anteriormente,
    // entonces nos devuelve un true o false, pero esto va en el login.php
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
    $sql="INSERT INTO usuarios VALUES(NULL,'".$usuario."',
                                           '".$security_psw."',
                                           '".$nombre."',
                                           '".$apellido."',
                                           '".$mail."',
                                           '.$edad.',
                                           '".$sexo."',
                                           '".$tipo."',
                                           '.$numero.',
                                           '".$fuma."',
                                           '".$pais."',
                                           '".$imagen."')";
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $checkeo=mysqli_affected_rows($link);
    mysqli_close($link);
?>
<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Nuevo usuario agregado";
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
                        <td><a href="listadoUsuarios.php"><input type="submit" value="volver"></a></td>
                    </tr>
                </table>
                <?php
            }else {
                ?>
                <table class="table table-bordered">
                    <tr id="encabezadoTabla">
                        <th colspan="2">Nuevo usuario agregado</th>
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <td><?php echo $usuario; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><?php echo $security_psw; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td><?php echo $apellido; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $mail; ?></td>
                    </tr>
                    <tr>
                        <th>Edad</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td><?php echo $sexo; ?></td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td><?php echo $tipo; ?></td>
                    </tr>
                    <tr>
                        <th>Numero</th>
                        <td><?php echo $numero; ?></td>
                    </tr>
                    <tr>
                        <th>Fuma</th>
                        <td><?php echo $fuma; ?></td>
                    </tr>
                    <tr>
                        <th>Pais</th>
                        <td><?php echo $pais; ?></td>
                    </tr>
                    <tr>
                        <th>Imagen</th>
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