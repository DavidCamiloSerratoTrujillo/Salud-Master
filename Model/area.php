<?php
    require_once "Persistence/Conexion.php";
    require_once "Persistence/areaDAO.php";
    class area{
        private $idArea;
        private $tipoArea;
        private $conexion;
        private $areaDAO;    
            public function area($idArea="",$tipoArea=""){
                $this-> idArea = $idArea;
                $this-> tipoArea =$tipoArea;
                $this -> conexion = new conexion();
                $this ->areaDAO = new areaDAo($idArea,$tipoArea);
            }
            /*
            * Getters
            */
            public function getIdArea(){
                return $this->idArea;
            }
            public function getTipoArea(){
                return $this->tipoArea;
            }
            /*
            * Setters
            */
            public function setIdArea($idArea){
                $this->idArea=$idArea;
            }
            public function setTipoArea($tipoArea){
                $this->tipoArea=$tipoArea;
            }
            /*
            *function
            */
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> AreaDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idArea = $res[0];
                $this -> tipoArea = $res[1];
                $this -> conexion -> cerrar();
            }
    }

?>