<?php
    require_once "Persistence/Conexion.php";
    require_once "Persistence/citaDAO.php";
    class Cita{
        private $idcita;
        private $horaRealizacion; 
        private $Conexion;
        private $citaDAO;
        private $estado;
        private $medico;
        private $paciente;
        private $tipoCita;

        public function Cita($idCita = "", $horaRealizacion="", $estado="", $medico="", $paciente="",$tipoCita=""){

            $this -> idCita = $idcita;
            $this -> horaRealizacion = $horaRealizacion;
            $this -> estado = $estado;
            $this -> medico = $medico;
            $this -> paciente = $paciente;
            $this -> tipoCita = $tipoCita;
            $this -> citaDao = new citaDAO($idCita,$horaRealizacion,$estado,$medico,$paciente,$tipoCita);
            $this -> conexion = new conexion();

        }

        /*
            GETS
        */
        public function getIdCita(){
            return $this -> idCita;
        }
        public function getHoraRealizacion(){
            return $this -> horaRealizacion;
        }
        public function getEstado(){
            return $this -> estado;
        }
        public function getMedico(){
            return $this -> medico;
        }
        public function getPaciente(){
            return $this -> paciente;
        }
        public function getTipoCita(){
            return $this -> tipoCita;
        }
        
        /**
         * SETS
         */

         public function setIdCita($idCita){
            return $this -> idCita = $idcita;
         }
         public function setHoraRealizacion($horaRealizacion){
            return $this -> horaRealizacion = $horaRealizacion;
         }
         public function setEstado($estado){
            return $this -> estado = $estado;
         }
         public function setMedico($medico){
            return $this -> medico = $medico;
         }
         public function setPaciente($paciente){
            return $this -> paciente = $paciente;   
         }
         public function setTipoCita($tipoCita){
            return $this -> tipoCita = $tipoCita;
         }

         /**
          * Functions 
          */

         public function autenticar(){
             $this -> conexion -> abrir();
             $this -> conexion -> ejecutar($this -> citaDAO -> autenticar());
             if($this -> conexion -> numFilas() == 1){
                $res = $this -> conexion -> extraer();
                $this -> idCita = $res[0];
                return true;
             }else{
                 return false;
             }
         }

         public function getInfoBasica(){
             $this -> conexion -> abrir();
             $this -> conexion -> ejectuar($this -> citaDAO -> getInfoBasic());
             $res = $this -> conexion -> extraer();
             /* Actualizar el objeto */
             $this -> horaRealizacion = $res[1];
             $this -> estado = $res[2];
             $this -> medico = $res[3];
             $this -> paciente = $res[4];
             $this -> tipoCita = $res[5];
             /*Fin de actualizar el objeto */
             $this-> conexion -> cerrar();
         }

         public function actualizarCita(){
             $this -> conexion -> abrir();
             $this -> conexion -> ejecutar($this -> citaDAO -> actualizarCita());
             $res = $this -> conexion -> filasAfectadas();
             $this -> conexion -> cerrar();
             return $res;
         }

         public function insertar(){
             $this -> conexion -> abrir();
             $this -> conexion -> ejectuar($this -> ciraDAO -> insertar());
             $res = $this -> conexion -> filasAfectadas();
             $this -> conexion -> cerrar();
             return $res;
         }
    }
?>