<?php
    class especialidadDAO{
        private  $idEspecialidad;
        private $nombre;

            public function especialidadDAO($idEspecialidad="",$nombre=""){
                
                $this ->  idEspecialidad = $idEspecialidad;
                $this -> nombre = $nombre;
                
            }
            public function getInfoBasic(){
                return "SELECT idEspecialidad , nombre 
                        FROM especialidad
                        WHERE idEspecialidad = " . $this -> idEspecialidad;
            }
            public function getEspecialidades(){
                return "SELECT idEspecialidad, nombre
                        FROM especialidad";
            }
    }
?>