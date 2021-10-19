<?php
    class citaDAO{
        private $idCita;
        private $horaRealizacion;
        private $estado;
        private $medico;
        private $paciente;
        private $tipoCita;

        public function citaDAO($idCita="",$horaRealizacion="",$estado="",$medico="",$paciente="",$tipoCita=""){

            $this -> idCita =  $idCita;
            $this -> horaRealizacion = $horaRealizacion;
            $this -> estado = $estado;
            $this -> medico = $medico;
            $this -> paciente = $paciente;
            $this -> tipoCita = $tipoCita;

        }
        
        public function getInfoBasic(){
            return "SELECT idCita, horaRealizacion, estado.estado as estado, tipocita.tipo as tipo, medico.nombre as nombreMedico, paciente.nombre as nombrePaciente 
                    FROM cita
                    INNER JOIN estado ON cita.FK_idEstado = estado.idEstado,
                    INNER JOIN tipocita ON cita.FK_idTipoCita = tipocita.idTipoCita,
                    INNER JOIN medico ON cita.FK_idMedico = medico.idMedico,
                    INNER JOIN paciente ON cita.FK_idPaciente = paciente.idPaciente 
                    WHERE idCita =".$this -> idCita;
        }

        public function crearCita(){
            return "INSERT INTO cita (horaRealizacion, FK_idEstado, FK_idTipoCita, FK_idMedico, FK_idPaciente) 
                    VALUES ('" . $this -> horaRealizacion . "','" . $this -> estado . "','". $this -> tipoCita . "','" . $this -> medico . "','" . $this -> paciente . "')";
        }
        
        public function actualizar(){
            return "UPDATE cita 
                    SET 
                        horaRealizacion = '" . $this -> horaRealizacion . "',
                        FK_idEstado = '" . $this -> estado . "',
                        FK_idTipoCita = '" . $this -> tipoCita . "',
                        FK_idMedico = '" . $this -> medico . "',
                        FK_idPaciente = '" . $this -> paciente . "'
                    WHERE idCita = ". $this -> idCita;
        }

        public function buscarPaginado($pag, $cant){
            return "SELECT idCita, horaRealizacion, estado.estado as estado, tipocita.tipo as tipo, medico.nombre as nombreMedico, paciente.nombre as nombrePaciente 
                    FROM cita
                    INNER JOIN estado ON cita.FK_idEstado = estado.idEstado,
                    INNER JOIN tipocita ON cita.FK_idTipoCita = tipocita.idTipoCita,
                    INNER JOIN medico ON cita.FK_idMedico = medico.idMedico,
                    INNER JOIN paciente ON cita.FK_idPaciente = paciente.idPaciente
                    LIMIT ". (($pag -1)*$cant) . ", " . $cant;
        }

        public function buscarCantidad(){
            return "SELECT count(*) FROM cita";
        }

        public function filtrarPaginado($str, $pag, $cant){
            return "SELECT idCita, horaRealizacion, estado.estado as estado, tipocita.tipo as tipo, medico.nombre as nombreMedico, paciente.nombre as nombrePaciente 
            FROM cita 
            INNER JOIN estado ON cita.FK_idEstado = estado.idEstado,
            INNER JOIN tipocita ON cita.FK_idTipoCita = tipocita.idTipoCita,
            INNER JOIN medico ON cita.FK_idMedico = medico.idMedico,
            INNER JOIN paciente ON cita.FK_idPaciente = paciente.idPaciente
            WHERE idCita LIKE '%". $str ."%' OR horaRealizacion LIKE '%". $str ."%' OR estado LIKE '%". $str ."%' OR tipo LIKE '%". $str ."%' OR nombreMedico LIKE '%". $str ."%' OR nombrePaciente LIKE '%". $str ."%' 
            LIMIT ". (($pag -1)*$cant) . ", " . $cant;
        }

        public function filtrarCant($str){
            return "SELECT count(*)
            FROM cita
            INNER JOIN estado ON cita.FK_idEstado = estado.idEstado,
            INNER JOIN tipocita ON cita.FK_idTipoCita = tipocita.idTipoCita,
            INNER JOIN medico ON cita.FK_idMedico = medico.idMedico,
            INNER JOIN paciente ON cita.FK_idPaciente = paciente.idPaciente 
            WHERE idCita LIKE '%". $str ."%' OR horaRealizacion LIKE '%". $str ."%' OR estado LIKE '%". $str ."%' OR tipo LIKE '%". $str ."%' OR nombreMedico LIKE '%". $str ."%' OR nombrePaciente LIKE '%". $str ."%'";
        }
    }
?>