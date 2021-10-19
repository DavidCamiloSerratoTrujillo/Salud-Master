<?php 
    class tipocitaDAO{
        private $idtipocita;
        private $tipocita;
        private $tipocitaDAO;
        private $conexion;
            public function tipocitaDAO($idtipocita="",$tipocita=""){
                $this-> idtipocita=$idtipocita;
                $this-> tipocita =$tipocita;
            } 
            
        public function getInfoBasic(){
            return "SELECT *
                FROM Administrador
                WHERE idAdministrador = " . $this -> tipocita;
        }
    }
    

?>