<?php

require("../categoriasdb.php");
require_once("../productosdb.php");
$catego = new Devuelve_categorias();
$produc = new Devuelve_productos();
$categorias = $catego->get_categorias();

$dato = $_GET['n'];
$productoActual = $produc->get_producto($dato);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Edición de producto</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script>
            function validar_datos(){
                if(!document.getElementById('seguro').checked){
                   alert("Si esta seguro de eliminar por favor verifique la casilla de 'Estoy seguro/a'");
                   return false;
                }
                return true;
            }

    </script>
</head>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <table>
    <form action="../productos.php" method="post" onsubmit='return validar_datos()'>
        <tr>
            <td colspan="4"><h2>ELIMINAR PRODUCTO</h2></td>
        </tr>
        <tr>
        <td>Nombre:</td>
        <td><label for="nombre"><?= $productoActual->nombre ?></label></td>
        <td>Referencia:</td>
        <td><label for="referencia"><?= $productoActual->referencia ?></label></td>
        </tr>
        <tr>
        <td>Precio:</td>
        <td><label for="precio"><?= $productoActual->precio ?></label></td>
        <td>Peso:</td>
        <td><label for="peso"><?= $productoActual->peso ?></label></td>
        </tr>
        <tr>
        <td>Categoria:</td>
        <td><label for="categoria"><?= $productoActual->id_categoria?></label></td>
        <td>Cantidad:</td>
        <td><label for="cantidad"><?= $productoActual->cantidad ?></label>
        <input type="hidden" name="x" value="<?= $productoActual->codigo ?>"></td>
        </tr>
        <tr>
            <td>
                <a class="botonvolver" href="../productos.php">VOLVER</a> 
            </td>
            <td colspan="2">
                Estoy seguro/a<input type="checkbox" name="seguro" id="seguro">
            </td>
            <td>
                <input type="submit" class="botonenviar" value="Eliminar">
            </td>
        </tr>
    </form>
</table>
</body>
</html>