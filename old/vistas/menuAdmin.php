<?php


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="vistas/css/admin.css" />
        <title> Administrador </title>
    </head>
    <body>
        <div id="head"></div>
        <div id="menu">
            <ul id="botones">
                <li><a href="index.php?link=adminUsuarios.php">Usuarios</a></li>
                <li><a href="index.php?link=adminVerInventario.php">Ver Inventario</a></li>
                <li><a href="index.php?link=adminModificaInventario.php">Modificar Inventario</a></li>
                <li><a href="index.php?link=adminInsertaInventario.php">Añadir Inventario</a></li>
            </ul>

            <form id="logout" name="logout" method="POST" action="index.php">
                <input type="hidden" name="logout">
                <input id="submit" type="submit" value="Salir"/>
            </form>

        </div>     


    </body>
</html>