<?php
    class estadocitaDAO{
        private $idEstado;
        private $estado;


            public function estadocitaDAO($idEstado="",$estado=""){
                $this-> idEstado=$idEstado;
                $this-> estado=$estado;
            }
            public function getInfoBasic(){
                return "SELECT idEstado , estado 
                        FROM estadocita
                        WHERE idEstado = " . $this -> idEstado;
            }
            
    }