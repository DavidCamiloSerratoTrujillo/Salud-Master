<?php 
    require_once "Persistence/Conexion.php";
    require_once "Persistence/tipocitaDAO.php";
    class tipocita{
        private $idtipocita;
        private $tipocita;
        private $tipocitaDAO;
        private $conexion;
            public function tipocita($idtipocita="",$tipocita=""){
                $this-> idtipocita=$idtipocita;
                $this-> tipocita =$tipocita;
                $this-> tipocitaDAO = new tipocitaDAO($idtipocita,$tipocita);
                $this-> conexion = new Conexion();
            }
            /*
            * Getters
            */
            public function getIdTipoCita(){
                return $this -> idtipocita;
            }
            public function getTipoCita(){
                return $this -> tipocita;
            }
            /*
            * Setters
            */
            public function setIdTipoCita($idtipocita){
                $this -> idtipocita=$idtipocita;
            }
            public function setTipoCita($tipocita){
                $this -> tipocita=$tipocita;
            } 
            /*
            *Funtions
            */
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> tipocitaDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idtipocita = $res[0];
                $this -> tipocita = $res[1];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }    
    }

?>