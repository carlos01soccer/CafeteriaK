<?php 

require("config/conexion.php");

class Ventas extends Conexion{

    public function Ventas(){

        parent::__construct();

    }

    public function get_ventas(){

        

        $sql = "SELECT id_venta codigoventa, p.nombre_producto nombre, v.unidades_venta unidades, 
        precio_unidad_venta preciounitario, precio_total_venta total 
        FROM ventas v, productos p 
        WHERE v.id_producto_venta = p.id_producto";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }
    public function get_productos(){ //ALL
        $sql = "SELECT id_producto codigo,nombre_producto nombre, precio_producto precio, 
        cantidad_producto cantidad FROM productos p, categorias c WHERE
        p.id_categoria_producto = c.id_categoria ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }
    public function create_venta($datos){ //crear una nueva venta

        $id = $datos[0];
        $cantidad = $datos[1];
        //echo "1|".$datos[0]." 2|".$datos[1]." 3|".$datos[2]." 4|".$datos[3]."|";
        
        $sql = "SELECT cantidad_producto cantidad FROM productos WHERE
        id_producto = :id ";
        $sentencia = $this->conexion_db->prepare($sql);
        $sentencia->execute(array(':id' =>$id));
        $result = $sentencia->fetch(PDO::FETCH_OBJ);
        if($cantidad > $result->cantidad  || $result->cantidad == 0){ //si en el inventario queda 0 
            //o la cantidad a escoger es mayor a la que hay en el inventario no se puede vender
            echo "<label>No se pudo realizar la venta</label><br>";
            echo "<label>¡No hay cantidad de ese producto o la cantidad a vender supera la cantidad en el inventario!</label>";
        }else{
            $sql = "INSERT INTO VENTAS VALUES('0', :prod,:cant,:vunitario,:tot,CURDATE())";//crear venta
            $sentencia = $this->conexion_db->prepare($sql);
            $sentencia->execute(array(':prod' => $id, ':cant' => $cantidad,':vunitario' => $datos[2],
            ':tot' => $datos[3]));

            $sql = "UPDATE PRODUCTOS SET cantidad_producto = cantidad_producto - :cant
            WHERE id_producto = :producto";//actualizar productos
            $sentencia = $this->conexion_db->prepare($sql);
            $sentencia->execute(array(':cant' => $cantidad,':producto' => $id));

            $sql = "UPDATE INVENTARIOS SET cantidad_actual_producto = cantidad_actual_producto - :cant,
            cantidad_vendido_producto = cantidad_vendido_producto + :cant WHERE id_producto = :producto";//actualizar inventario
            $sentencia = $this->conexion_db->prepare($sql);
            $sentencia->execute(array(':cant' => $cantidad,':producto' => $id));


            $sentencia->closeCursor();
            //return $resultado;
        }
        

        $this->conexion_db = null;
    }
} ?>