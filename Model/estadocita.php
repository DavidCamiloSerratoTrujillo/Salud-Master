<?php
    require_once "Persistence/Conexion.php";
    require_once "Persistence/estadocitaDAO.php";
    class estadocita{
        private $idEstado;
        private $estado;
        private $conexion;
        private $estadocitaDAO;

            public function estadocita($idEstado="",$estado=""){
                $this-> idEstado=$idEstado;
                $this-> estado=$estado;
                $this-> conexion= new conexion();
                $this-> estadocitaDAO= new estadocitaDAO();
            }
            /*
            *Getter 
            */
            public function getIdEstado(){
                return $this->idEstado;
            }
            public function getEstado(){
                return $this->estado;
            }
            /*
            *Getter 
            */
            public function setIdEstado($idEstado){
                $this->idEstado=$idEstado;
            }
            public function setEstado($estado){
                $this->estado=$estado;
            }
            /*
            *Funtions 
            */
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> especialidadDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idEstado = $res[0];
                $this -> estado = $res[1];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
        }
?>