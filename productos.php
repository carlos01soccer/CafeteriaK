<?php 

require("productosdb.php");

if(isset($_POST) && $_POST != null ){
    
    $productoEnviado = array();
    $produc2 = new Devuelve_productos();

    if(isset($_POST['x'])){  //ELIMINAR
        $produc2->delete_productos($_POST['x']);
    }else{
            array_push($productoEnviado,$_POST['nombre'],$_POST['referencia'],$_POST['precio'],$_POST['peso'],$_POST['categoria']
            ,$_POST['cantidad']);
        if(isset($_POST['e'])){ //SI EXISTE EL PRODUCTO,EDITAR
            $produc2->edit_productos($productoEnviado,$_POST['e']);
        }else{ //CREAR
            $produc2->insert_productos($productoEnviado);
        }
    }

    
}



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
<script>

function editar(cod){
    //console.log("producto/editar_producto.php?n="+cod);
    window.location.href = "producto/editar_producto.php?n="+cod;
}
function eliminar(cod){

    //console.log("producto/eliminar_producto.php?n="+cod);
    window.location.href = "producto/eliminar_producto.php?n="+cod;
}


</script>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <h2>PRODUCTOS</h2>
    <table>
        <tr>
            <td colspan="7">
                <a href="producto/crear_producto.php"><button class="boton1">NUEVO PRODUCTO</button></a> 
            </td>
        </tr>
        <tr>
        <th>PRODUCTO</th>
        <th>REFERENCIA</th>
        <th>PRECIO</th>
        <th>CATEGORIA</th>
        <th>CANTIDAD EN INVENTARIO</th>
        <th colspan="2">FUNCIONES</th>
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
            <td><input type="button" id ="botoneditar" value="Editar" onClick="editar(<?= $elemento['codigo']; ?>)" /></td>
            <td><input type="button" id="botoneliminar" value="Eliminar" onClick="eliminar(<?= $elemento['codigo']; ?>)" /></td>
        </tr>
        <?php } ?>
    <tr><td colspan="7" style="text-align:left;">
    <a href="index.php"><button class="botonvolver">VOLVER</button></a> 
    </td>
</table>
</body>
</html>