<nav class="navbar navbar-default" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles ,se vera solo en moviles-->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index">PHP y MySQL</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php
        if (!isset($_SESSION["login"])) {
            ?>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index">Inicio</a></li>
                <li><a href="formBuscar">Búsqueda avanzada</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Menú<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#categorias" id="botonCategorias">Categorias</a></li>
                        <li><a href="#marcas" id="botonMarcas">Marcas</a></li>
                        <li class="divider"></li>
                        <li><a href="#peliculas" id="botonPeliculas">Películas</a></li>
                        <li class="divider"></li>
                        <li><a href="#usuarios" id="botonUsuarios">Usuarios</a></li>
                    </ul>
                </li>
            </ul>

            <form action="search" method="get" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Búscar producto">
                </div>
                <button type="submit" class="btn btn-default">búscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="formLogin"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp&nbsp</a></li>
            </ul>
            <?php
        }else {
            ?>
            <ul class="nav navbar-nav">
                <li><a href="panelCategorias">Admin Categorias</a></li>
                <li><a href="panelMarcas">Admin Marcas</a></li>
                <li><a href="panelPeliculas">Admin Peliculas</a></li>
                <li><a href="panelProductos">Admin Productos</a></li>
                <li><a href="panelUsuarios">Admin Usuarios</a></li>
                <li><a href="formMovimiento">Control de Movimiento</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout"><span class="glyphicon glyphicon-user"></span> Logout &nbsp&nbsp</a></li>
            </ul>
            <?php
        }
        ?>
    </div>
</nav>


