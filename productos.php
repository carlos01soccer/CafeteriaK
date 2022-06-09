<?php 

require ("producto/productosdb.php");

$produc = new Devuelve_productos();

$array_productos = $produc->get_productos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Productos</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <h2>PRODUCTOS</h2>
    <table>
        <tr>
            <td colspan="4">
                <a href="producto/crear_producto.php"><button class="boton1">NUEVO PRODUCTO</button></a> 
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        <td>PRODUCTO</td>
        <td>REFERENCIA</td>
        <td>PRECIO</td>
        <td>CATEGORIA</td>
        <td>CANTIDAD EN INVENTARIO</td>
        </tr>
        <?php 
          foreach($array_productos as $elemento){
        ?> 
        <tr>
            <td><?= $elemento['nombre'] ?></td>
            <td><?= $elemento['referencia'] ?></td>
            <td>$ <?= $elemento['precio'] ?> COP</td>
            <td><?= $elemento['categoria'] ?></td>
            <td><?= $elemento['cantidad'] ?></td>
        </tr>
        <?php } ?>
    <tr><td colspan="4">
    <a href="index.php"><button class="botonvolver">VOLVER</button></a> 
    </td>
    <td>&nbsp;</td></tr>
</table>
</body>
</html>