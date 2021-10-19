<?php 
        require_once "Persistence/Conexion.php";
        require_once "Persistence/ciudadDAO.php";
        
        class ciudad{
            private $idciudad;
            private $nombre;
            private $conexion;
            private $ciudadDAO;
                public function ciudad($idciudad ="",$nombre=""){
                    $this-> idciudad = $idciudad;
                    $this-> nombre = $nombre;
                    $this-> conexion = new Conexion();
                    $this -> ciudadDAO = new ciudadDAO($idciudad,$nombre);        
                }
                /*
                *Getters
                */
                public function getIdCiudad(){
                    return $this->idciudad;
                }
                public function getNombre(){
                    return $this->nombre;
                }
                /*
                *Setters
                */
                public function setIdCiudad($idciudad){
                    $this->idciudad=$idciudad;
                }
                public function setNombre($nombre){
                    $this->nombre=$nombre;
                }
                public function getInfoBasic(){
                    $this -> conexion -> abrir();
                    $this -> conexion -> ejecutar( $this -> ciudadDAO -> getInfoBasic() );
                    $res = $this -> conexion -> extraer();
                    /* Actualzar OBJ*/
                    $this -> idciudad = $res[0];
                    $this -> nombre = $res[1];
                    /* FIN Actualzar OBJ*/
                    $this -> conexion -> cerrar();
                }  
                public function getCiudades(){
                    $this -> conexion -> abrir();
                    $this -> conexion -> ejecutar( $this -> ciudadDAO -> getCiudades() );
                    $resList = array();
                    while($res = $this -> conexion -> extraer()){
                        array_push($resList, new Ciudad($res[0], $res[1]));
                    }
                    $this -> conexion -> cerrar();
                    return $resList;
                }                  
        }

?>