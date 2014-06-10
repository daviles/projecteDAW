<?php ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="vistas/css/cliente.css" />
        <script src="vistas/js/jquery-2.1.0.js"></script>
        <title> Cliente </title>
        <script>


            function getZona() {

                //obtiene el nombre de la zona i los items que la componen

                var listaItems = new Array();

                var nombreZona = $('#nombreZona').val();
                //alert(nombreZona);
                
                listaItems.push(nombreZona);
                $('input[name="item"]:checked').each(function() {
                    //$(this).val() es el valor del checkbox correspondiente
                    listaItems.push($(this).val());                    
                });

                //for (var i = 0; i < listaItems.length; i++) {
                //alert(listaItems[i]);
                //}

                //envia el listado en formato json al controlador php
                
                var listaItemsJSON = JSON.stringify(listaItems);

                // Realizamos la petición al servidor
                $.post('index.php', {zonaItems: listaItemsJSON},
                function(respuesta) {
                    console.log(respuesta);
                }).error(
                        function() {
                            console.log('Error al ejecutar la petición');
                        }
                );

                var listaItems = [];

            }




            //pinta la pantalla
            function myFunction() {
                window.print();
            }



            $(document).ready(function() {
                //alert('ready');            
            });


            function suma(item, id) {
                var idCantidad = '#item' + item;
                var cantidad = $(idCantidad).val();
                //alert(item+'-'+id);
                var idPrecio = '#precio' + item;
                var precio = $(idPrecio).html();

                var total = '#totalItem' + item;
                restaZona($(total).html());
                $(total).empty();
                var multi = precio * cantidad;
                $(total).append(multi);

                /*
                 var idTotalZona = '#totalZona' + item;
                 var totalZona = $(idTotalZona).html();
                 $(totalZona).empty();
                 $(totalZona).append(multi);*/


            }



        </script>
    </head>
    <body>
        <!--<div id="head"></div>-->
        <div id="menu">
            <ul id="botones">
                <li><a href="index.php?link=clienteInicio.php">Datos del Cliente</a></li>
                <li><a href="index.php?link=presupuestoCliente.php">Añadir Zonas</a></li>
                <li><a href="index.php?link=verPresupuestoCliente.php">Ver Presupuesto</a></li>

            </ul>

            <form id="logout" name="logout" method="POST" action="index.php">
                <input type="hidden" name="logout">
                <input id="submit" type="submit" value="Salir"/>
            </form>

        </div>     


    </body>
</html>