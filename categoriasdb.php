<?php 

require("../config/conexion.php");

class Devuelve_categorias extends Conexion{

    public function Devuelve_categorias(){

        parent::__construct();

    }

    public function get_categorias(){

        

        $sql = "SELECT id_categoria, nombre_categoria FROM categorias  WHERE 1 ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }
} ?>