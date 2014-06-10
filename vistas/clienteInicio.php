<?php ?>
<div id="cuerpo">

    <div id="newPresupuesto">
        <?php
       /* echo '<form name = "newPresupuesto" method = "POST" action = "">
                <input type = "hidden" name = "newPresupuesto">
                <input type = "hidden" id = "user" value="' . $_SESSION['usuario'] . '">
                Nombre : <input type = "text" name = "NPnombre">
                Apellidos : <input type = "text" name = "NPapellidos">
                Direccion : <input type = "text" name = "NPdireccion">
                Telefono : <input type = "text" name = "NPtelefono">
                Email : <input type = "text" name = "NPemail">
               <input type="submit" value="Crear" onclick="avisoPresupuesto()">
              </form>';*/
        ?>
        <h3>Datos del cliente </h3>
        <br>
        <form class="form-horizontal" role="form" name = "newPresupuesto" method = "POST" action = "">
            <input type = "hidden" name = "newPresupuesto">
            <?php echo'<input type = "hidden" id = "user" value = "' . $_SESSION['usuario'] . '">' ?>
            <div class="form-group">
                <label for="inputNombre" class="col-sm-2 control-label">Nombre Cliente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPnombre">
                </div>
            </div>
            <div class="form-group">
                <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPapellidos">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDirección" class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPdireccion">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTelefono" class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPtelefono">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPemail">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "NPfecha">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="text" class="btn btn-default" onclick="avisoPresupuesto()">Crear</button>
                </div>
            </div>
        </form>

    </div>



</div>