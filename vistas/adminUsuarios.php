<?php
//$this->tablaUsuarios();
?>
<div id="cuerpo">

    <div id="caseUsuarios">
        <form id="insertaUsuario" name="insertaUsuario" method="POST" action="index.php">
            <input type="hidden" name="insertaUsuario">
            <table id="tabInsertaUser" border="0"> 
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
                    <td>Admin </td>
                    <td><select name="iuAdmin">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select></td>
                    <td><input type="submit" value="Enviar"/></td>
                </tr>                        
            </table>
        </form>

        <form id="eliminaUsuario" name="eliminaUsuario" method="POST" action="index.php">
            <input type="hidden" name="eliminaUsuario">
            <table id="tabEliminaUsuario" border="0"> 
                <tr>
                    <td colspan="3">Eliminar Usuario</td>

                </tr>
                <tr>
                    <td>Login </td>
                    <td colspan="2"><input type="text" name="euNombre"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Id Usuario  </td>
                    <td colspan="2"><input type="text" name="euId"></td>
                    <td></td>
                </tr>
                <tr>           
                    <td><input type="submit" value="Eliminar"/></td>
                </tr>                        
            </table>
        </form>
    </div>
    <?php
    $resultado = $this->tablaUsuarios();
    $lgn = count($resultado);

    //echo '<div id=tabUsuarios>';
    echo '<div class="table-responsive">';
    echo '<table class="table" id="tabUsuarios"><tr><th>Id Usuario</th></th><th>Login</th><th>Password</th><th>Administrador</th></tr>';
    for ($i = 0; $i < $lgn; $i++) {
        if ($resultado[$i]['administrador'] == 1) {
            $ad = 'Si';
        } else {
            $ad = 'No';
        }
        echo '<tr><td>' . $resultado[$i]['idUsuario'] . '</td><td>' . $resultado[$i]['nombre'] . '</td><td>' . $resultado[$i]['password'] . '</td><td>' . $ad . '</td></tr>';
    }
    echo '</form>';
    echo '</table></div>';
    ?>

</div>

