<?php 

require("config/conexion.php");

class Devuelve_productos extends Conexion{

    public function Devuelve_productos(){

        parent::__construct();

    }

    public function get_productos(){

        

        $sql = "SELECT nombre_producto nombre, referencia_producto referencia, precio_producto precio, 
        nombre_categoria categoria, cantidad_producto cantidad FROM productos p, categorias c WHERE
        p.id_categoria_producto = c.id_categoria ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }
} ?>