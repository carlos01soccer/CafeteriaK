<?php 

require_once("config/conexion.php");

class Devuelve_productos extends Conexion{

    public function Devuelve_productos(){

        parent::__construct();

    }

    public function get_productos(){

        

        $sql = "SELECT id_producto codigo,nombre_producto nombre, referencia_producto referencia, precio_producto precio, 
        nombre_categoria categoria, cantidad_producto cantidad FROM productos p, categorias c WHERE
        p.id_categoria_producto = c.id_categoria ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }
    public function insert_productos($datos){


        $sql = "INSERT INTO PRODUCTOS VALUES('0',:nombre,:ref,:prec,:pes,:cate,:cant, CURDATE()) ";
        
        //echo $sql;
        $sentencia = $this->conexion_db->prepare($sql);
        $sentencia->execute(array(':nombre' => $datos[0], ':ref' => $datos[1],':prec' => $datos[2],
        ':pes' => $datos[3],':cate' => $datos[4],':cant' => $datos[5]));
        $id = $this->conexion_db->lastInsertId();

        $sql2 = "INSERT INTO INVENTARIOS VALUES('0',:idnuevo,:cantidad,:cantidad,'0') ";
        $sentencia = $this->conexion_db->prepare($sql2);
        $sentencia->execute(array(':idnuevo' => $id,':cantidad' => $datos[5]));

        $sentencia->closeCursor();
        
        //$result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        //return $result;

        $this->conexion_db = null;
    }
    public function edit_productos($datos,$id){


        $sql = "
        UPDATE PRODUCTOS SET nombre_producto = :nombre, referencia_producto = :ref, precio_producto = :prec,
         peso_producto = :pes, id_categoria_producto = :cate, cantidad_producto = :cant WHERE id_producto = :id";
        //echo "<<".$id.">>->"." ".$datos[5];
        //echo $sql;
        $sentencia = $this->conexion_db->prepare($sql);
        $sentencia->execute(array(':nombre' => $datos[0], ':ref' => $datos[1],':prec' => $datos[2],
        ':pes' => $datos[3],':cate' => $datos[4],':cant' => $datos[5],':id'=> $id));

        $sql2 = "UPDATE INVENTARIOS SET cantidad_total_producto = :tot, cantidad_actual_producto = :tot WHERE id_producto = :idactual ";
        $sentencia = $this->conexion_db->prepare($sql2);
        $sentencia->execute(array(':idactual' => $id,':tot' => $datos[5]));
            
        $sentencia->closeCursor();
        
        //$result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        //return $result;

        $this->conexion_db = null;
    }
    public function get_producto($dato){

        //echo $dato;

        $sql = "SELECT id_producto codigo,nombre_producto nombre, referencia_producto referencia, precio_producto precio, 
        peso_producto peso,nombre_categoria categoria, cantidad_producto cantidad, id_categoria FROM productos p, categorias c WHERE
        p.id_categoria_producto = c.id_categoria AND id_producto = :producto ";
        $sentencia = $this->conexion_db->prepare($sql);

        $sentencia->execute(array('producto'=> $dato));

        $result = $sentencia->fetch(PDO::FETCH_OBJ);

        $sentencia->closeCursor();

        return $result;

        $this->conexion_db = null;
    }

} ?>