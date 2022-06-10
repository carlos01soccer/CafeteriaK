<?php 

require("config/conexion.php");

class Inventarios extends Conexion{

    public function Inventarios(){

        parent::__construct();

    }

    public function get_mas_inventario(){

        $sql = "SELECT nombre_producto nombre FROM productos WHERE cantidad_producto =  
        (SELECT MAX(cantidad_actual_producto) FROM inventarios) ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetch(PDO::FETCH_OBJ);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }

    public function get_mas_ventas(){

        $sql = "SELECT MAX(cantidad_vendido_producto) mayor, i.id_producto,p.nombre_producto nombre_mayor
        FROM inventarios i, productos p 
        WHERE i.id_producto = p.id_producto";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetch(PDO::FETCH_OBJ);


        $sentencia->closeCursor();
        return $result;

        $this->conexion_db = null;
    }
} ?>