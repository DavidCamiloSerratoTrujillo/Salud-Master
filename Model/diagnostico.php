<?php
        require_once "Persistence/Conexion.php";
        require_once "Persistence/diagnosticoDAO.php";
        class diagnostico{
             private $idDiagnostico;
             private $descripcion;
             private $tratamiento;
             private $FK_idcita; 
             private $conexion;
             private $diagnosticoDAO;
                public function diagnostico($idDiagnostico = "",$descripcion="",$tratamiento="",$FK_idcita=""){
                     
                    $this-> idDiagnostico = $idDiagnostico;
                    $this-> descripcion = $descripcion;
                    $this-> tratamiento  = $tratamiento;
                    $this-> FK_idcita  = $FK_idcita; 
                    $this-> conexion = new Conexion();
                    $this-> diagnosticoDAO = new diagnosticoDAO($idDiagnostico,$descripcion,$tratamiento,$FK_idcita);
                }
                /*
                *Getters 
                */
                public function getIdDiagnostico(){
                    return $this-> idDiagnostico;
                }
                public function getDescripcion(){
                    return $this-> descripcion;
                }
                public function getTratamiento(){
                    return $this-> tratamiento;
                }
                public function getFK_idcita(){
                    return $this-> FK_idcita;
                }
                /*
                *Getters 
                */
                public function setIdDiagnostico($idDiagnostico){
                    $this-> idDiagnostico = $idDiagnostico;
                }
                public function setDescripcion($descripcion){
                    $this-> descripcion=$descripcion;
                }
                public function setTratamiento($tratamiento){
                    $this-> tratamiento;
                }
                public function setFK_idcita($FK_idcita){
                    $this-> FK_idcita=$FK_idcita;
                }
                /*
                *Functions 
                */
                public function getInfoBasic(){
                    $this -> conexion -> abrir();
                    $this -> conexion -> ejecutar( $this -> diagnosticoDAO -> getInfoBasic() );
                    $res = $this -> conexion -> extraer();
                    /* Actualzar OBJ*/
                    $this -> idDiagnostico = $res[0];
                    $this -> descripcion = $res[1];
                    $this -> tratamiento = $res[2];
                    $this ->  FK_idcita = $res[3];
                    /* FIN Actualzar OBJ*/
                    $this -> conexion -> cerrar();
                }
        }
?>