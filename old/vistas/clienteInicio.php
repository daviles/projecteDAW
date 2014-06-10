<?php ?>
<div id="cuerpo">

    <div id="newPresupuesto">
        <?php
        echo '<form name = "newPresupuesto" method = "POST" action = "">
                <input type = "hidden" name = "newPresupuesto">
                <input type = "hidden" id = "user" value="'.$_SESSION['usuario'].'">
                Nombre : <input type = "text" name = "NPnombre">
                Apellidos : <input type = "text" name = "NPapellidos">
                Direccion : <input type = "text" name = "NPdireccion">
                Telefono : <input type = "text" name = "NPtelefono">
                Email : <input type = "text" name = "NPemail">
               <input type="submit" value="Crear" onclick="avisoPresupuesto()">
              </form>';
        ?>
    </div>



</div>