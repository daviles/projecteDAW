<?php ?>
<div id="cuerpo">

    <?php
    


    if (isset($_SESSION['presupuesto']['nombre'])) {
        echo 'Datos del cliente <br> Nombre: ' . $_SESSION['presupuesto']['nombre'] . ' Apellidos: ' . $_SESSION['presupuesto']['apellidos'];
    } else {
        echo '<h3>vacio</h3>';
    }
    echo '<br>';
    //var_dump($_SESSION['zonas']);
    if (isset($_SESSION['zonas'])) {
        $zonas = count($_SESSION['zonas']);
        $items = count($_SESSION['zonas']);
        
        $html = $this->generaHTML($zonas, $items);
        
        echo $html;
       
        
        
    }
    
    var_dump($_SESSION["zonas"]);
    ?>



</div>