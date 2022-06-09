<?php 

    require("config.php");


    class Conexion{

        protected $conexion_db;

        public function Conexion(){

           /* $this->conexion_db = new mysqli(DB_HOST,DB_USUARIO,DB_CONTR,DB_NOMBRE);

            if($this->conexion_db->connect_errno){
                echo "Fail to connect mysql: error4qwe:". $this->conexion_db->connect_error;
                return;
            }

            $this->conexion_db->set_charset(DB_CHARSET);*/



            try{
                $this->conexion_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NOMBRE,DB_USUARIO,DB_CONTR);
     
                 $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
                 $this->conexion_db->exec("SET CHARACTER SET utf8");
     
                 return $this->conexion_db;
     
             } catch (Exception $e) {
                echo "Line error".$e->getLine();
            }

        }

    }
?>