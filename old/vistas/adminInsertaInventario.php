<?php ?>

<div id="cuerpo">
    
    
    <form id="insertaInventario" name="insertaInventario" method="POST" action="index.php">
        <input type="hidden" name="insertaInventario">
        Descripcion : <input type="text" name="descripcion"/><br>
        Unidad : <input type="text" name="unidad"/><br>
        Precio : <input type="text" name="precio"/><br>
        Coleccion : <input type="text" name="coleccion"/><br>
        Zona : <input type="text" name="zona"/><br>
        <input type="submit" value="Enviar"/>
    </form>
    
    
    <?php
        $resultado = $this->muestraInventario();
        $lgn = count($resultado);
        //var_dump ($resultado);

        echo '<div id=tabInventario>';
        echo '<table><tr><th>Id</th></th><th>Descripcion</th><th>Unidad</th><th>Precio</th><th>Coleccion</th><th>Zona</th></tr>';
        for ($i = 0; $i < $lgn; $i++) {

            echo '<tr><td>' . $resultado[$i]['idInventario'] . '</td><td>' . $resultado[$i]['descripcion'] . '</td><td>' . $resultado[$i]['unidad'] . '</td><td>' . $resultado[$i]['precio'] . '</td><td>' . $resultado[$i]['coleccion'] . '</td><td>' . $resultado[$i]['zona'] . '</td></tr>';
        }
        echo '</table></div>';
    ?>
</div>