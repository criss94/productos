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
    require_once"validar.php";
    $titulo="Editar usuario";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2>
        <!--desarrollo del proyecto-->

        <form action="editUsuarios" method="post" enctype="multipart/form-data" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <fieldset>
                <?php
                while ($fila=mysqli_fetch_assoc($result)){
                ?>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">Usuario</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputUser" placeholder="User" type="text" name="usuario" value="<?php echo $fila["usuario"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputPassword" placeholder="Password" type="text" name="psw" value="<?php echo $fila["psw"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputNombre" placeholder="Username" type="text" name="nombre" value="<?php echo $fila["nombre"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputApellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputApellido" placeholder="Lastname" type="text" name="apellido" value="<?php echo $fila["apellido"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEmail" placeholder="E-mail" type="text" name="mail" value="<?php echo $fila["mail"]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEdad" class="col-lg-2 control-label">Edad</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEdad" placeholder="Years" type="text" name="edad" value="<?php echo $fila["edad"]; ?>">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-lg-2 control-label">Sexo</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <?php
                                    if ($fila["sexo"]=="M") {
                                        ?>
                                        <input name="sexo" id="optionsRadios1" value="M" checked="checked" type="radio"> Hombre
                                        <?php
                                    }else {
                                        ?>
                                        <input name="sexo" id="optionsRadios1" value="M" type="radio"> Hombre
                                        <?php
                                    }
                                ?>
                            </label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radio">
                            <label>
                                <?php
                                if ($fila["sexo"]=="F") {
                                    ?>
                                    <input name="sexo" id="optionsRadios2" value="F" checked="checked" type="radio"> Mujer
                                    <?php
                                }else {
                                    ?>
                                    <input name="sexo" id="optionsRadios2" value="F" type="radio"> Mujer
                                    <?php
                                }
                                ?>
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                $identificacion=array("DNI"=>"DNI","CI"=>"CI","LC"=>"LC","LD"=>"LD");
                ?>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Tipo</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="tipo">
                            <?php
                            foreach ($identificacion as $valor => $nombre){
                                ?>
                                <option <?php if ($fila["tipo"]==$valor){ echo "selected"; } ?> value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber" class="col-lg-2 control-label">Teléfono</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputNumber" placeholder="Number" type="tel" name="numero" value="<?php echo $fila["numero"]; ?>">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-lg-2 control-label">fuma</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input name="fuma" id="optionsRadios1" type="radio" <?php if ($fila["fuma"]=="Si"){  echo "value='Si' checked='checked'"; }else{ echo "value='Si'"; } ?>> Si
                            </label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radio">
                            <label>
                                <input name="fuma" id="optionsRadios2" value="No" type="radio" <?php if ($fila["fuma"]=="No"){  echo "value='No' checked='checked'"; }else{ echo "value='No'"; } ?>> No
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                $pais=array("Arg"=>"Argentina","Bra"=>"Brasil","Col"=>"Colombia","Bol"=>"Bolivia","Chi"=>"Chile",
                    "Uru"=>"Uruguay","Par"=>"Paraguay","Mex"=>"Mexico","Ven"=>"Venezuela");
                ?>
                <div class="form-group">
                    <label for="selectPais" class="col-lg-2 control-label">Pais</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="selectPais" name="pais">
                            <?php
                            foreach ($pais as $valor => $nombre) {
                                ?>
                                <option <?php if ($fila["pais"]==$valor){ echo "selected"; } ?> value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFile" class="col-lg-2 control-label">Imagen Actual</label>
                    <div class="col-lg-10">
                        <img src="imagenes/<?php echo $fila["imagen"]; ?>" alt="" width="150">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="inputFile" class="col-lg-2 control-label">Cambiar Imagen</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="inputFile" type="file" name="imagen">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-5">
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
                <?php } ?>
            </fieldset>
        </form>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>