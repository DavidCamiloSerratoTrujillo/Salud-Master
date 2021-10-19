<?php 


    class PacienteDAO{
        private $idPaciente;
        private $nombre;
        private $fechaNacimiento;
        private $usuario;
        private $estado;
        private $contrasena;
        private $direccion;
        private $FK_idCiudad;

            public function PacienteDAO($idPaciente="",$nombre="",$fechaNacimiento="",$direccion ="",$usuario="",$contrasena="",$estado="",$FK_idCiudad=""){
                $this -> idPaciente=$idPaciente;
                $this -> nombre=$nombre;
                $this -> usuario=$usuario;
                $this -> contrasena=$contrasena;
                $this -> fechaNacimiento=$fechaNacimiento;
                $this -> direccion=$direccion;
                $this -> estado = $estado;
                $this -> FK_idCiudad=$FK_idCiudad;
            }
            /* 
            *   Functions
            */
            public function autenticar(){
                
                return "SELECT idPaciente
                        FROM paciente
                        Where usuario = '" . $this -> usuario . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }
            public function getInfoBasic(){
                return "SELECT * 
                        FROM paciente
                        WHERE idpaciente = " . $this -> idPaciente;
            }
            public function checkClave(){
                return "SELECT idPaciente
                        FROM  paciente
                        WHERE idPaciente = '" . $this -> idPaciente . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }
        
            public function actualizarClave($nuevaClave){
                return "UPDATE paciente
                        SET
                            contrasena = '" . md5($nuevaClave) . "'
                        WHERE idPaciente = " . $this -> idPaciente;
            }        
            public function actualizarPaciente(){
                return "UPDATE paciente
                        SET 
                            nombre = '" . $this -> nombre . "',
                            usuario = '" . $this -> usuario. "'
                        WHERE idPaciente = " . $this -> idPaciente;
            }
        
            public function existeCorreo(){
                return "SELECT idPaciente
                        FROM paciente
                        WHERE usuario= '" . $this -> usuario. "'";
            }
        
            public function existeNuevoCorreo($correo){
                return "SELECT idPaciente
                        FROM paciente
                        WHERE usuario = '" . $correo . "'";
            }

    }
    
   

?>