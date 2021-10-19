<?php

        class diagnosticoDAO{
             private $idDiagnostico;
             private $descripcion;
             private $tratamiento;
             private $FK_idcita; 
                public function diagnosticoDAO($idDiagnostico = "",$descripcion="",$tratamiento="",$FK_idcita=""){
                     
                    $this-> idDiagnostico = $idDiagnostico;
                    $this-> descripcion = $descripcion;
                    $this-> tratamiento  = $tratamiento;
                    $this-> FK_idcita  = $FK_idcita; 
                }
                public function getInfoBasic(){
                    return "SELECT idDiagnostico , descripcion , tratamiento, FK_idcita
                            FROM diagnostico
                            WHERE iddiagnostico = " . $this -> idDiagnostico;
                }
        }
        

?>