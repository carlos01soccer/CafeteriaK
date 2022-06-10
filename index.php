<?php

require("ventasdb.php");



$ventaNueva = array();
if(isset($_POST) && $_POST != null ){
    //var_dump($_POST);
    $venta2 = new Ventas();
    array_push($ventaNueva,$_POST['producto'],$_POST['cantidad'],$_POST['vunitario'],$_POST['total']);
    $venta2->create_venta($ventaNueva);
}
$venta = new Ventas();
$ventashoy = $venta->get_ventas();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <div class="botones1">
        <a href="productos.php"><button class="boton2">PRODUCTOS</button></a> 
        <a href="ventas.php"><button class="boton3">VENTAS</button></a>
    </div>
    <h2><label for="titulo">VENTAS</label></h2>
    <table>
        <tr>
        <th>NRO° VENTA</th>
        <th>PRODUCTO</th>
        <th>CANTIDAD</th>
        <th>PRECIO UND</th>
        <th>TOTAL</th>
        </tr>
        <?php 
          foreach($ventashoy as $vent1){
        ?> 
        <tr>
            <td>V0000<?=$vent1->codigoventa  ?></td>
            <td><?= $vent1->nombre  ?></td>
            <td><?= $vent1->unidades ?></td>
            <td>$ <?= $vent1->preciounitario ?> COP</td>
            <td>$ <?= $vent1->total  ?> COP</td>
        </tr>
        <?php } ?>
        <tr><td colspan="7" style="text-align:right;">
            <a href="vender.php"><button class="botonenviar">VENDER</button></a> 
        </td>
</table>

</body>
</html>