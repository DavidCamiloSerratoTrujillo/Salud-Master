<?php
    require_once "Persistence/Conexion.php";
    require_once "Persistence/especialidadDAO.php";
    class especialidad{
        private  $idEspecialidad;
        private $nombre;
        private $conexion;
        private $especialidadDAO;

            public function especialidad($idEspecialidad="",$nombre=""){
                
                $this ->  idEspecialidad=$idEspecialidad;
                $this -> nombre=$nombre;
                $this -> conexion=new Conexion();
                $this -> especialidadDAO = new especialidadDAO($idEspecialidad,$nombre);

            }
            /*
            *Getters 
            */
            public function getIdEspecialidad(){
                return $this -> idEspecialidad;
            }
            public function getNombre(){
                return $this -> nombre;
            }
            /*
            *Functions 
            */
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> especialidadDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idEspecialidad = $res[0];
                $this -> nombre = $res[1];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
            public function getEspecialidades(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> especialidadDAO -> getEspecialidades() );
                $resList = array();
                while($res = $this -> conexion -> extraer()){
                    array_push($resList, new especialidad($res[0], $res[1]));
                }
                $this -> conexion -> cerrar();
                return $resList;
            } 

    }
?>