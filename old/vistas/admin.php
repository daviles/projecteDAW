<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Ver Inventario</a></li>
                <li><a href="#">Modificar Inventario</a></li>
                <li><a href="index.php?admin=insertaInventario.php">Añadir Inventario</a></li>
            </ul>

            <form id="logout" name="logout" method="POST" action="index.php">
                <input type="hidden" name="logout">
                <input id="submit" type="submit" value="Salir"/>
            </form>

        </div>
        <div id="cuerpo">

            <form id="insertaUsuario" name="insertaUsuario" method="POST" action="index.php">

                <input type="hidden" name="insertaUsuario">
                <table id="tabInsertaUser"> 
                    <tr>
                    <td colspan="3">Añadir Usuario</td>

                    </tr>
                    <tr>
                        <td>Nombre </td>
                        <td colspan="2"><input type="text" name="iuNombre"></td>
                    </tr>
                    <tr>
                        <td>Password  </td>
                        <td colspan="2"><input type="text" name="iuPassword"></td>
                    </tr>
                    <tr>
                        <td>Administrador </td>
                        <td><select name="iuAdmin">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select></td>
                        <td><input type="submit" value="Enviar"/></td>
                    </tr>                        
                </table>
                

            </form>


        </div>
        


    </body>
</html>