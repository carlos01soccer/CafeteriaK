<?php

require("ventasdb.php");
require_once("productosdb.php");
$venta = new Ventas();
$productos = $venta->get_productos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Nuevo producto</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script>
            function validar_datos(){
                if(document.getElementById('producto').value == 0 ){
                   alert("Seleccione un producto");
                   return false;
                }
                if(document.getElementById('cantidad').value == 0 ){
                   alert("Por lo menos debe ser 1 la cantidad");
                   return false;
                }
                if(document.getElementById('vunitario').value == 0 ){
                   alert("Digite el valor unitario del producto");
                   return false;
                }
                if(document.getElementById('total').value == 0 ){
                   alert("Total no valido para la venta");
                   return false;
                }

                return true;
            }

            function valor(combo){
                /*var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function() {
                        if (this.readyState==4 && this.status==200) {
                         document.getElementById("vunitario").innerHTML=this.responseText;
                        }
                    }
                    xmlhttp.open("POST","vender_additions.php",true);
                    xmlhttp.send("id="+combo);*/
            }
            function cambiarValor(){
                var und = document.getElementById('vunitario').value;
                var cant = document.getElementById('cantidad').value;
                document.getElementById('total').value = und * cant;;
            }
    </script>
</head>
<body>
    <h1>CAFETERIA KONECTA</h1>
    <table>
    <form action="index.php" method="post" onsubmit='return validar_datos()'>
        <tr>
            <td colspan="6"><h2>CREAR NUEVA VENTA</h2></td>
        </tr>
        <tr>
        <td>Seleccione producto:</td>
        <td><select onchange="valor(this.value);" name="producto" id="producto">
                <option value="0">-Seleccione un producto-</option>
                <?php foreach($productos as $produc){ ?>
                <option value="<?= $produc->codigo?>"><?= $produc->nombre." $".$produc->precio." COP"; ?></option>
                <?php } ?>
            </select>
        </td>
        <td>Cantidad:</td>
        <td><input type="number" onblur="cambiarValor();" name="cantidad" id="cantidad" min="1" max="50" value ="0"></td>
        <td>Valor:</td>
        <td><input type="number" onblur="cambiarValor();" name="vunitario" id="vunitario" value="0"></td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        <td>Total:</td>
        <td><input type="number" name="total" id="total"  value="0" readonly></td>
        </tr>
        
        <tr>
            <td colspan="5">
                <a class="botonvolver" href="index.php">VOLVER</a> 
            </td>
            <td>
                <input type="submit" class="botonenviar" value="Crear">
            </td>
        </tr>
    </form>
</table>
</body>
</html>