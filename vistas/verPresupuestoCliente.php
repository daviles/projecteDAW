<?php ?>
<div id="cuerpo">

    <?php
    if (isset($_SESSION['presupuesto']['nombre'])) {
        
        echo '<div id="datosCliente">';
        echo '<img id="logo" src="vistas/css/img/logo.png"></img><br><br>';        
        echo 'Nombre: ' . $_SESSION['presupuesto']['nombre'] . '<br>';
        echo 'Apellidos: ' . $_SESSION['presupuesto']['apellidos'] . '<br>';
        echo 'Direccion: ' . $_SESSION['presupuesto']['direccion'] . '<br>';
        echo 'Telefono: ' . $_SESSION['presupuesto']['telefono'] . '<br>';
        echo 'Email: ' . $_SESSION['presupuesto']['email'] . '<br>';
        echo 'Fecha: ' . $_SESSION['presupuesto']['fecha'] . '<br>';
        echo '</div>';
        
        echo '<div id="datosEmpresa">';
        
        echo 'CIF: B-64782949 <br>';
        echo 'Santa Eugenia Nº12  <br>';
        echo '08012 / Barcelona <br>';
        echo 'Móvil. 691548342, 670362872    <br>';
        echo 'TEL. 932377955 <br>';
        echo '<button id="boton" class="btn btn-default" onclick="creaPDF()">Crear PDF</button>';
        echo '</div>';
        
        
    } else {
        echo '<h3>vacio</h3>';
    }
    echo '<br>';
    //var_dump($_SESSION['zonas']);
    if (isset($_SESSION['zonas'])) {
        $zonas = count($_SESSION['zonas']);
        $items = count($_SESSION['zonas']);
        echo '<div id="tablaPresupuesto">';
        $html = $this->generaHTML($zonas, $items);

        echo $html;
        echo '</div>';
    }
    ?>



</div>