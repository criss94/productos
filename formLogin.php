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
        <form action="login" method="post">
            <div class="row">
                 <div class="col-md-offset-4 col-md-4">
                     <div class="form-login" style="background-color: #2b669a;padding: 25px;border-radius: 6px;color: white">
                        <h3 align="center">Inicio de sesión</h3>
                        <input type="text" name="usuario" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                        </br>
                        <input type="password" name="psw" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                        </br>
                         <div align="center">
                             <a href="#"><input type="submit" name="LogIn" value="login" class="btn btn-primary btn-md"><i class="fa fa-sign-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == 1) {
                    ?>
                    <div id="error" align="center" style="color:red">Contraseña y/o Usuario incorrectos</div>
                    <?php
                }elseif($_GET["error"] == 2) {
                    ?>
                    <div id="error" align="center" style="color:red">Debe loguearse para ingresar</div>
                    <?php
                }
            }
        ?>

    </div>

    <div id="footer"><?php require_once "templates/pie.php"; ?></div>

</body>
</html>