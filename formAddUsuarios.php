<?php
    require_once "templates/header.php";
    require_once "validar.php";
    $titulo="Agregar un usuario";
?>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <?php require_once "templates/nav.php"; ?>
    </div>
    <div class="container" id="top">
        <h2><?php echo $titulo; ?></h2><br>
        <!--desarrollo del proyecto-->

        <form action="addUsuarios" method="post" enctype="multipart/form-data" class="form-horizontal col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2" style="background-color: #2b669a;padding: 15px;color: white;border-radius: 7px">
            <fieldset>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-2 control-label">Usuario</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputUser" placeholder="User" type="text" name="usuario">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="psw">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputNombre" placeholder="Username" type="text" name="nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputApellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputApellido" placeholder="Lastname" type="text" name="apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEmail" placeholder="E-mail" type="text" name="mail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEdad" class="col-lg-2 control-label">Edad</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEdad" placeholder="Years" type="text" name="edad">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-lg-2 control-label">Sexo</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input name="sexo" id="optionsRadios1" value="M" checked="checked" type="radio"> Hombre
                            </label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radio">
                            <label>
                                <input name="sexo" id="optionsRadios2" value="F" type="radio"> Mujer
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
                                <option value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber" class="col-lg-2 control-label">Teléfono</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputNumber" placeholder="Number" type="tel" name="numero">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-lg-2 control-label">fuma</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input name="fuma" id="optionsRadios1" value="Si" checked="checked" type="radio"> Si
                            </label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radio">
                            <label>
                                <input name="fuma" id="optionsRadios2" value="No" type="radio"> No
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
                                <option value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFile" class="col-lg-2 control-label">Imagen</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputFile" type="file" name="imagen">
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