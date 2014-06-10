<?php ?>

<div id="cuerpo">

    <div id="caseFiltros">
        <form id="filtroMuestra" name="filtroMuestra" method="POST" action="">
            <input type="hidden" name="filtroMuestra">            
            Coleccion : <input type="text" name="coleccion">
            Zona : <input type="text" name="zona">
            <input type="submit" value="Buscar">
        </form>
    </div>

    <?php
    if(isset($_POST['filtroMuestra'])){
        $col= $_POST['coleccion'];
        $zona= $_POST['zona'];
    }else{
        $col='0';
        $zona='0';
    }   
    
    //echo $col.' - '.$zona;    
    $resultado = $this->buscaInventario($col, $zona);
    $lgn = count($resultado);
    //var_dump ($resultado);

    echo '<div id=tabVerInventario>';
    echo '<table><tr><th>Id</th></th><th>Descripcion</th><th>Unidad</th><th>Precio</th><th>Coleccion</th><th>Zona</th></tr>';
    for ($i = 0; $i < $lgn; $i++) {

        echo '<tr><td>' . $resultado[$i]['idInventario'] . '</td><td>' . $resultado[$i]['descripcion'] . '</td><td>' . $resultado[$i]['unidad'] . '</td><td>' . $resultado[$i]['precio'] . '</td><td>' . $resultado[$i]['coleccion'] . '</td><td>' . $resultado[$i]['zona'] . '</td></tr>';
    }
    echo '</form>';
    echo '</table></div>';
    ?>
</div>