<?php
    require_once "Persistence/Conexion.php";
    require_once "Persistence/consultorioDAO.php";
    class consultorio{
        private $idconsultorio;
        private $consultorio;
        private $idarea;
        private $conexion;
        private $consultorioDAO;
            public function consultorio($idconsultorio="",$consultorio ="",$idarea =""){
                
                $this -> idconsultorio = $idconsultorio;
                $this -> consultorio= $consultorio;
                $this -> idarea = $idarea;
                $this -> conexion = new Conexion();
                $this -> consultorioDAO = new consultorioDAO($idconsultorio,$consultorio,$idarea);
            }
            /*
            *Getters 
            */
            public function getIdConsultorio(){
                return $this -> idconsultorio;
            }
            public function getConsultorio(){
                return $this -> consultorio;
            }
            public function getIdArea(){
                return $this -> idarea;
            }
            /*
            *Setters 
            */
            public function setIdConsultorio($idconsultorio){
                return $this->idconsultorio=$idconsultorio;
            }
            public function setConsultorio($consultorio){
                return $this->consultorio = $consultorio ;
            }
            public function setIdArea($idarea){
                return $this->idarea=$idarea;
            }
            /*
             *Functions 
             */
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> consultorioDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idconsultorio = $res[0];
                $this -> consultorio = $res[1];
                $this -> idarea = $res[2];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
            public function getConsultorios(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> consultorioDAO -> getConsultorios() );
                $resList = array();
                while($res = $this -> conexion -> extraer()){
                    array_push($resList, new Consultorio($res[0], $res[1], $res[2]));
                }
                $this -> conexion -> cerrar();
                return $resList;
            } 
    }
?>