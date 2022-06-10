<?php 
require("inventariosdb.php");

$inventario = new Inventarios();
//$inventario2 = new Inventarios();
$inventariomayor = $inventario->get_mas_inventario();
$masvendido = $inventario->get_mas_ventas();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Ventas</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script>
        function refrescar(){
            window.location.href = window.location.href;   
        }
    </script>
</head>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <h2>VENTAS</h2>
    <table>
        <tr>
            <td colspan="7" style="text-align:right">
                <button class="botonenviar" onClick="refrescar();">ACTUALIZAR</button>
            </td>
        </tr>
        <tr>
            <td colspan= "3"><label for="stockmayor">PRODUCTO CON MAS UNIDADES EN INVENTARIO:</label></td>
            <td colspan= "4"><?= $inventariomayor->nombre?></td>
        </tr>
        <tr>
            <td colspan= "3"><label for="masvendido">PRODUCTO MAS VENDIDO:</label></td>
            <td colspan= "4"><?= $masvendido->nombre_mayor .": ".$masvendido->mayor." unidades" ?></td>
        </tr>
    <tr><td colspan="7" style="text-align:left;">
    <a href="index.php"><button class="botonvolver">VOLVER</button></a> 
    </td>
</table>
</body>
</html>
