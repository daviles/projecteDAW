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
        <link rel="stylesheet" type="text/css" href="vistas/css/cliente.css" />
        <link rel="stylesheet" type="text/css" href="vistas/css/bootstrap/css/bootstrap.css" />

    </head>
    <body>
        <div id="login">
            <fieldset>
                <legend>Login</legend>
                <form name="login" method="POST" action="index.php">

                    <input type="text" name="nombre" placeholder="Usuario"/>

                    <input type="password" name="passwd" placeholder="Password"/>
                    <button type="submit" class="btn btn-default">Entrar</button>
                </form>
            </fieldset>
        </div>


    </body>
</html>