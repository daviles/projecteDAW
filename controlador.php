<?php

require_once 'ModelPDO.php';

class controlador extends ModelPDO {

    function __construct() {

        if (isset($_SESSION['usuario'])) {  // si hay un usuario en sesion...
            // control del login
            if (isset($_POST['logout'])) {  // si entra por post logout...
                $this->salir();
                $this->formulario();
            } else {
                $this->entra();     // si hay un usuario en sesion entra
            }

            // insertar usuarios            
            if (isset($_POST['insertaUsuario'])) {
                $this->insertaUsuario($_POST['iuNombre'], $_POST['iuPassword'], $_POST['iuAdmin']);
            }

            // elimina usuarios            
            if (isset($_POST['eliminaUsuario'])) {
                $this->eliminaUsuario($_POST['euNombre'], $_POST['euId']);
            }

            //Inserta registros en el inventario
            if (isset($_POST['insertaInventario'])) {
                $this->instartaInventario($_POST['descripcion'], $_POST['unidad'], $_POST['precio'], $_POST['coleccion'], $_POST['zona']);
            }

            //Modifica registros en el inventario
            if (isset($_POST['modificaInventario'])) {
                $this->modificaInventario($_POST['id'], $_POST['descripcion'], $_POST['unidad'], $_POST['precio'], $_POST['coleccion'], $_POST['zona']);
            }

            // crea un nuevo presupuesto           
            if (isset($_POST['newPresupuesto'])) {
                $this->nuevoPresupuesto();
            }


            //obitene el nombre de la zona y los items
            if (isset($_POST['zonaItems'])) {
                $zonaItems = json_decode($_POST['zonaItems']);
                $this->almacenaZonas($zonaItems);
            }
        } else { //control del login
            if (isset($_POST['nombre'])) {  // si entra por post un nombre
                if ($this->login($_POST['nombre'], $_POST['passwd']) == 1) { // y este nombre se encuentra en la base de datos...
                    $this->entra();
                } else {
                    $this->formulario();
                }
            } else {
                $this->formulario();
            }
        }

        //control de pantallas admin
        if (isset($_GET['link'])) {

            $url = $_GET['link'];
            //header('Location: ./vistas/'.$url);
            include "vistas/" . $url;
        }
    }

    function formulario() { // muestra el formulario de entrada
        include 'vistas/formularioLogin.php';
    }

    function entra() { // controla si el usuario de entrada es admin o cliente
        if ($_SESSION['admin'] == 1) {
            include 'vistas/menuAdmin.php';
        } else {
            include 'vistas/menuCliente.php';
        }
    }

    function salir() { // cierra la sesion
        session_destroy();
    }

    function login($n, $p) {  // comprueba en la base de datos el nombre y la contraseña
        $this->n = $_POST['nombre'];
        $this->p = $_POST['passwd'];

        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT * FROM usuarios WHERE nombre like :nombre AND password like :passwd");
        $query->bindParam(':nombre', $this->n);
        $query->bindParam(':passwd', $this->p);
        $query->execute();

        $resultado = $query->fetchAll();

        //print_r($resultado[0]['nombre']);
        //print_r($resultado[0]['password']);
        //var_dump($resultado);



        if (sizeof($resultado) == 1) {
            $_SESSION['admin'] = $resultado[0]['administrador'];
            $_SESSION['usuario'] = $resultado[0]['nombre'];
            return 1;
        } else {
            return 0;
        }
    }

    function insertaUsuario($nombre, $pass, $admin) {

        $oDB = $this->getDBO();
        $query = $oDB->prepare("INSERT into usuarios (nombre, password, administrador) VALUES ('" . $nombre . "', '" . $pass . "', " . $admin . ")");
        $query->execute();

        include "vistas/adminUsuarios.php";
    }

    function tablaUsuarios() {

        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT * FROM usuarios");
        $query->execute();

        $resultado = $query->fetchAll();

        return ($resultado);
    }

    function eliminaUsuario($login, $id) {
        $oDB = $this->getDBO();
        $query = $oDB->prepare('DELETE FROM usuarios WHERE nombre like "' . $login . '" and idUsuario =' . $id);
        $query->execute();

        include "vistas/adminUsuarios.php";
    }

    function muestraInventario() {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT * FROM inventario");

        $query->execute();

        $resultado = $query->fetchAll();

        return ($resultado);
    }

    function instartaInventario($descrip, $unidad, $precio, $coleccion, $zona) {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("INSERT into inventario (descripcion, unidad, precio, coleccion, zona) VALUES ('" . $descrip . "', '" . $unidad . "', " . $precio . ", '" . $coleccion . "', '" . $zona . "')");
        $query->execute();

        include "vistas/adminInsertaInventario.php";
    }

    function buscaInventario($col, $zona) {

        $oDB = $this->getDBO();
        if (strlen($col) <= 1 && strlen($zona) <= 1) {
            $query = $oDB->prepare("SELECT * FROM inventario");
        } else if (strlen($col) <= 1 && strlen($zona) > 1) {
            $query = $oDB->prepare("SELECT * FROM inventario WHERE zona like '" . $zona . "' ORDER BY zona");
        } else if (strlen($zona) <= 1 && strlen($col) > 1) {
            $query = $oDB->prepare("SELECT * FROM inventario WHERE coleccion like '" . $col . "' ORDER BY coleccion");
        } else {
            $query = $oDB->prepare("SELECT * FROM inventario WHERE coleccion like '" . $col . "' AND zona like '" . $zona . "' ORDER BY zona");
        }

        $query->execute();
        $resultado = $query->fetchAll();
        return ($resultado);

        include "vistas/adminVerInventario.php";
    }

    function modificaInventario($id, $descrip, $unidad, $precio, $coleccion, $zona) {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("UPDATE inventario SET descripcion='" . $descrip . "',unidad='" . $unidad . "', precio=" . $precio . ", coleccion='" . $coleccion . "', zona='" . $zona . "'  WHERE idInventario=" . $id);     
        $query->execute();

        include "vistas/adminModificaInventario.php";
    }

    function getColeccion() {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT DISTINCT coleccion FROM inventario");
        $query->execute();
        $resultado = $query->fetchAll();
        return ($resultado);
    }

    function getZona() {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT DISTINCT zona FROM inventario");
        $query->execute();
        $resultado = $query->fetchAll();
        return ($resultado);
    }

    function getItem($id) {
        $oDB = $this->getDBO();
        $query = $oDB->prepare("SELECT * FROM inventario WHERE idInventario=" . $id);
        $query->execute();
        $resultado = $query->fetchAll();
        return ($resultado);
    }

    function generaHTML($zonas, $items) {
        $html ='<div class="table-responsive">';
        $html .='<table class="table">';        
        //$html .= '<table border="1">';
        
        for ($i = 0; $i < $zonas; $i++) {
            $html .= '<tr>';
            $items = count($_SESSION['zonas'][$i]);
            $html .= '<th>' . $_SESSION['zonas'][$i][0] .'</th>';
            $html .= '<td>Unidad</td>';
            $html .= '<td>Precio</td>';
            $html .= '<td>Cantidad</td>';
            $html .= '<td>Total</td>';
            $html .= '</tr>';
            for ($f = 1; $f < $items; $f++) {
                $item = $this->getItem($_SESSION['zonas'][$i][$f]);
                //var_dump($item);
                $html .= '<tr>';
                //echo '<td>Id item: ' . $_SESSION['zonas'][$i][$f] . '</td>';
                $html .= '<td>' . $item[0]['descripcion'] . '</td>';
                $html .= '<td>' . $item[0]['unidad'] . '</td>';
                $html .= '<td id="precio'.$item[0]['idInventario'].'">' . $item[0]['precio'] . '</td>';
                $html .= '<td onchange="suma('.$item[0]['idInventario'].','.$i.')"><input value="0" type="text" name="cantidad"'
                        . 'id="item'.$item[0]['idInventario'].'"></td>';
                $html .= '<td class="Zona'.$i.'" id="totalItem'.$item[0]['idInventario'].'"></th>';
                $html .= '</tr>';
                
            }
            $html .= '<tr><th>Total '.$item[0]['coleccion'].'</th><th colspan="4" id="totalZona'.$i.'"></td></tr>';
            //separador
            $html .= '<tr><td colspan="5"><td></tr>';
        }
        $html .= '</table></div>';  
        

        return $html;
    }

    function nuevoPresupuesto() {

        if (isset($_POST['newPresupuesto'])) {
            $_SESSION['presupuesto']['nombre'] = $_POST['NPnombre'];
            $_SESSION['presupuesto']['apellidos'] = $_POST['NPapellidos'];
            $_SESSION['presupuesto']['direccion'] = $_POST['NPdireccion'];
            $_SESSION['presupuesto']['telefono'] = $_POST['NPtelefono'];
            $_SESSION['presupuesto']['email'] = $_POST['NPemail'];
            $_SESSION['presupuesto']['fecha'] = $_POST['NPfecha'];
        }
    }

    function almacenaZonas($zona) {
        $_SESSION['zonas'][] = $zona;
        //array_push($_SESSION['zonas'], $zona);
    }

}

?>