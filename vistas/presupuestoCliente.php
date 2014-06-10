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
        echo '<fieldset><label>Colección</label>';
        echo '<select class="form-control" id = "listaColeccion" name = "colecciones">';
        //echo '<option name="coleccion" value="0">blanco</option>';
        for ($i = 0; $i < $lCol; $i++) {
            echo '<option name="coleccion" value="' . $col[$i]['coleccion'] . '">' . $col[$i]['coleccion'] . '</option>';
        }
        echo '</select></fieldset><br>';
        
        echo '<fieldset><label>Zona</label>';
        echo '<select class="form-control" id = "listaZona" name = "zonas">';
        for ($i = 0; $i < $lZona; $i++) {
            echo '<option name="zona" value="' . $zona[$i]['zona'] . '">' . $zona[$i]['zona'] . '</option>';
        }
        
        //echo '<button type="submit" class="btn btn-default">Mostrar</button>';
        echo '</select></fieldset>';
        echo '<br><input type="submit" value="Mostrar" class="btn btn-default">';
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
        echo $_POST['zonas'] . ' ' . $_POST['colecciones'] . '<br>';
        echo '<form id="addId" name="addId" method="POST" action="">';
        echo 'Nombre Zona : <input type="text" id="nombreZona" name="nombreZona">';
        echo '<input type="button" value="Guardar" onclick="getZona()">';
        echo '<input type="hidden" name="addId">';
        echo '<input type="hidden" name="zona" value="'.$_POST['zonas'].'">';
        echo '<br>';
        echo '<br>';
        echo '<ul id="listaInventario" class="list-group">';
        for ($i = 0; $i < $lgn; $i++) {

            echo '<li class="list-group-item"><input type="checkbox" name="item" value="' . $resultado[$i]['idInventario'] . '"> ' . $resultado[$i]['descripcion'] . '</li>';
        }
        echo '<ul>';        
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>