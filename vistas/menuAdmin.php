<?php ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="vistas/css/admin.css" />
        <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap/css/bootstrap.css" />
        <title> Administrador </title>
    </head>
    <body>

        <nav id="menuTop" class="navbar navbar-inverse" role="navigation">
            <ul id="botones">
                <li><a href="index.php?link=adminUsuarios.php">Usuarios</a></li>
                <li><a href="index.php?link=adminVerInventario.php">Ver Inventario</a></li>
                <li><a href="index.php?link=adminModificaInventario.php">Modificar Inventario</a></li>
                <li><a href="index.php?link=adminInsertaInventario.php">Añadir Inventario</a></li>
            </ul>

            <form id="logout" name="logout" method="POST" action="index.php">
                <input type="hidden" name="logout">
                <!--<input id="submit" type="submit" value="Salir"/>-->
                <button id="salir" class="btn btn-danger" type="submit" />Salir</button>
            </form>
        </nav>



    </body>
</html>