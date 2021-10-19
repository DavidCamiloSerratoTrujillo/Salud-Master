<?php   
    class ciudadDAO{
        private $idciudad;
        private $nombre;

            public function ciudadDAO($idciudad ="",$nombre=""){
                $this-> idciudad = $idciudad;
                $this-> nombre = $nombre;
                            
            }
            public function getInfoBasic(){
                return "SELECT idciudad,nombre
                        FROM ciudad 
                        WHERE idciudad = ". $this -> idciudad;
            }
            public function getCiudades(){
                return "SELECT idCiudad, nombre
                        FROM ciudad";
            }
    }
?>