<?php

    class consultorioDAO{
        private $idconsultorio;
        private $consultorio;
        private $idarea;
            public function consultorio($idconsultorio="",$consultorio ="",$idarea =""){
                
                $this->idconsultorio = $idconsultorio;
                $this->consultorio=$consultorio;
                $this->idarea=$idarea;
            }
            public function getInfoBasic(){
                return "SELECT idConsultorio,consultorio,FK_idarea 
                        FROM consultorio
                        WHERE idConsultorio = " . $this -> idconsultorio;
            }
            
            public function getConsultorios(){
                return "SELECT idConsultorio, consultorio, FK_idArea
                        FROM consultorio";
            }
    }
?>