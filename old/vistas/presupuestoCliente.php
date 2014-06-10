<?php ?>
<div id="cuerpo">

    <div id="leftPresupuesto">
        <?php
        $col = $this->getColeccion();
        $zona = $this->getZona();
        $lCol = count($col);
        $lZona = count($zona);

        echo '<form id="filtroMuestra" name="filtroMuestra" method="POST" action="">';
        echo '<input type="hidden" name="filtroMuestra">';
        echo '<select id = "listaColeccion" name = "colecciones">';
        //echo '<option name="coleccion" value="0">blanco</option>';
        for ($i = 0; $i < $lCol; $i++) {
            echo '<option name="coleccion" value="' . $col[$i]['coleccion'] . '">' . $col[$i]['coleccion'] . '</option>';
        }
        echo '</select><br>';

        echo '<select id = "listaZona" name = "zonas">';
        for ($i = 0; $i < $lZona; $i++) {
            echo '<option name="zona" value="' . $zona[$i]['zona'] . '">' . $zona[$i]['zona'] . '</option>';
        }
        echo '<input type="submit" value="Mostrar">';
        echo '</select>';
        echo '</form>';
        //var_dump($_SESSION);
        //echo $_SESSION['usuario'];
        ?>
    </div>

    <?php
    if (isset($_POST['filtroMuestra'])) {
        $col = $_POST['colecciones'];
        $zona = $_POST['zonas'];
    } else {
        $col = '0';
        $zona = '0';
    }


    $resultado = $this->buscaInventario($col, $zona);
    $lgn = count($resultado);

    if ($col != '0' && $zona != '0') {
        echo '<div id="busqueda">';
        //echo 'Zona :' . $_POST['zonas'] . '<br>';
        //echo 'Coleccion :' . $_POST['colecciones'] . '<br>';
        echo '<form id="addId" name="addId" method="POST" action="">';
        echo '<table border="1">';
        echo '<tr>';
        echo '<td>Nombre Zona : <input type="text" id="nombreZona" name="nombreZona"></td>';
        echo '<td>Precio</td>';
        echo '<td>Cantidad</td>';
        echo '<td><input type="button" value="Enviar" onclick="getZona()"></td>';
        echo '<input type="hidden" name="addId">';
        echo '<input type="hidden" name="zona" value="' . $_POST['zonas'] . '">';
        echo '</tr>';
//echo '<ul id="listaInventario">';

        for ($i = 0; $i < $lgn; $i++) {
            echo '<tr>';
            echo '<td>' . $resultado[$i]['descripcion'] . '</td>';
            echo '<td>' . $resultado[$i]['precio'] . '</td>';
            echo '<td><input type="text" name="cantidad" value="0" iditem="'.$resultado[$i]['idInventario'].'"></td>';
            echo '<td><input type="checkbox" name="item" value="' . $resultado[$i]['idInventario'] . '"></td>';
            echo '</tr>';
        }
        echo '</table>';
        //echo '<ul>';
        //echo '<input type="button" value="Enviar" onclick="getZona()">';
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>