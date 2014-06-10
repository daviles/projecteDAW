<?php ?>

<div id="cuerpo">

    <form id="modificaInventario" name="modificaInventario" method="POST" action="index.php">
        <input type="hidden" name="modificaInventario">
        <table class="table">
            <tr>
                <td>Id </td><td><input type="text" name="id"/></td>
                <td>Descripcion </td><td><input type="text" name="descripcion"/></td>
            </tr><tr>
                <td>Unidad </td><td><input type="text" name="unidad"/></td>
                <td>Precio </td><td><input type="text" name="precio"/></td>
            </tr><tr>
                <td>Coleccion </td><td><input type="text" name="coleccion"/></td>
                <td>Zona </td><td><input type="text" name="zona"/></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" value="Enviar"/></td>
            </tr>
        </table>
    </form>


    <?php
    $resultado = $this->muestraInventario();
    $lgn = count($resultado);
    //var_dump ($resultado);

    echo '<div id="tabInventario">';
    echo '<table><tr><th>Id</th></th><th>Descripcion</th><th>Unidad</th><th>Precio</th><th>Coleccion</th><th>Zona</th></tr>';
    for ($i = 0; $i < $lgn; $i++) {

        echo '<tr><td>' . $resultado[$i]['idInventario'] . '</td><td>' . $resultado[$i]['descripcion'] . '</td><td>' . $resultado[$i]['unidad'] . '</td><td>' . $resultado[$i]['precio'] . '</td><td>' . $resultado[$i]['coleccion'] . '</td><td>' . $resultado[$i]['zona'] . '</td></tr>';
    }
    echo '</table></div>';
    ?>
</div>