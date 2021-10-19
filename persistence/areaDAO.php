<?php

    class areaDAO{
        private $idArea;
        private $tipoArea;
        private $conexion;
        private $areaDAO;    
            public function areaDAO($idArea="",$tipoArea=""){
                $this-> idArea = $idArea;
                $this-> tipoArea =$tipoArea;
            }
            public function getInfoBasic(){
                return "SELECT idarea,tipoarea 
                        FROM area
                        WHERE idarea = " . $this -> idarea;
            }
    }
?>