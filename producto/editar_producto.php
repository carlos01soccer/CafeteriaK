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
                if(document.getElementById('nombre').value.length < 2 ){
                   alert("Verifique el nombre del producto");
                   return false;
                }
                if(document.getElementById('referencia').value.length < 2 ){
                   alert("Verifique la referencia del producto");
                   return false;
                }
                if(document.getElementById('precio').value < 500 ||  document.getElementById('precio').value> 50000){
                   alert("Verifique el precio del producto. Debe estar entre 500 y 50000");
                   return false;
                }
                if(document.getElementById('peso').value < 5 ||  document.getElementById('peso').value > 500){
                   alert("Verifique el peso del producto. Debe estar entre 5 y 500");
                   return false;
                }
                if(document.getElementById('categoria').value == "0" ){
                   alert("Debe seleccionar una categoria para el producto");
                   return false;
                }
                if(document.getElementById('cantidad').value < 1 ||  document.getElementById('cantidad').value > 50){
                   alert("Verifique la cantidad del producto. Debe estar entre 1 y 50");
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
            <td colspan="4"><h2>EDITAR PRODUCTO</h2></td>
        </tr>
        <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" id="nombre" value="<?= $productoActual->nombre ?>"></td>
        <td>Referencia:</td>
        <td><input type="text" name="referencia" id="referencia" value="<?= $productoActual->referencia ?>"></td>
        </tr>
        <tr>
        <td>Precio:</td>
        <td><input type="number" value="<?= $productoActual->precio ?>" name="precio" id="precio" min="500" max="50000" style="width: 160px;"></td>
        <td>Peso:</td>
        <td><input type="number" value="<?= $productoActual->peso ?>" name="peso" id="peso" min="5" max="500" style="width: 160px;"></td>
        </tr>
        <tr>
        <td>Categoria:</td>
        <td><select name="categoria" id="categoria">
                <option value="0">-Seleccione una categoria-</option>
                <?php foreach($categorias as $cat){ ?>
                <option value="<?= $cat->id_categoria?>"<?php if($cat->id_categoria == $productoActual->id_categoria) 
                echo "selected"; ?>><?= $cat->nombre_categoria?></option>
                <?php } ?>
            </select>
        </td>
        <td>Cantidad:</td>
        <td><input type="number" value="<?= $productoActual->cantidad ?>" name="cantidad" id="cantidad" min="1" max="50">
        <input type="hidden" name="e" value="<?= $productoActual->codigo ?>"></td>
        </tr>
        <tr>
            <td colspan="3">
                <a class="botonvolver" href="../productos.php">VOLVER</a> 
            </td>
            <td>
                <input type="submit" class="botonenviar" value="Editar">
            </td>
        </tr>
    </form>
</table>
</body>
</html>