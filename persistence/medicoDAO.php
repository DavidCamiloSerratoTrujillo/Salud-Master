<?php


class MedicoDAO{
    private $idMedico;
    private $nombre;
    private $direccion;
    private $usuario;
    private $contrasena;
    private $estado;
    private $idConsultorio;
    private $idCiudad;
    private $idEspecialidad;


        public function MedicoDAO($idMedico ="",$nombre = "",$direccion = "",$usuario="",$contrasena="",$estado="",$idConsultorio ="",$idCiudad="",$idEspecialidad=""){
            
            $this-> idMedico = $idMedico;
            $this-> nombre=$nombre;
            $this-> direccion=$direccion;
            $this-> usuario=$usuario;
            $this-> contrasena=$contrasena;
            $this -> estado = $estado;
            $this-> idConsultorio=$idConsultorio;
            $this-> idCiudad=$idCiudad;
            $this-> idEspecialidad=$idEspecialidad;
            
        }  
            /* 
            *   Functions
            */
            public function autenticar(){
                
                return "SELECT idMedico, nombre, direccion, estado, FK_idConsultorio, FK_idCiudad, FK_idEspecialidad
                        FROM medico
                        Where usuario = '" . $this -> usuario . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }
            public function getInfoBasic(){
                return "SELECT medico.idMedico, medico.nombre, medico.direccion, medico.usuario, medico.estado, consultorio.consultorio as consultorio, ciudad.nombre as ciudad, especialidad.nombre as especialidad  
                        FROM medico
                        INNER JOIN consultorio on medico.FK_idConsultorio = consultorio.idConsultorio
                        INNER JOIN ciudad on medico.FK_idCiudad = ciudad.idCiudad
                        INNER JOIN especialidad on medico.FK_idEspecialidad = especialidad.idEspecialidad
                        WHERE idMedico = ". $this -> idMedico;
            }

            public function checkClave(){
                return "SELECT idMedico
                        FROM  medico
                        WHERE idMedico = '" . $this -> idMedico . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }

            public function updateEstado(){
                return "UPDATE medico
                        SET
                            estado = ". $this -> estado . "
                        WHERE idMedico = " . $this -> idMedico;
            }

            public function insertar(){
                return "INSERT INTO medico 
                VALUES ('" . $this -> idMedico . "' , '" . $this -> nombre . "', '" . $this -> direccion . "', '". $this -> usuario . "', '". md5($this -> contrasena) . "', '". $this -> estado ."', '". $this -> idConsultorio ."' , '" . $this -> idCiudad . "','" . $this -> idEspecialidad . "')";
            }
            
            public function actualizarClave($nuevaClave){
                return "UPDATE medico
                        SET
                            contrasena = '" . md5($nuevaClave) . "'
                        WHERE idMedico = " . $this -> idMedico;
            }     

            public function actualizarMedico(){
                return "UPDATE medico
                        SET 
                            nombre = '" . $this -> nombre . "',
                            direccion = '" . $this -> direccion . "',
                            usuario = '" . $this -> usuario . "',
                            estado = '" . $this -> estado . "',
                            FK_idConsultorio = '". $this -> idConsultorio ."',
                            FK_idCiudad = '". $this -> idCiudad ."',
                            FK_idEspecialidad = '". $this -> idEspecialidad ."'
                        WHERE idMedico = " . $this -> idMedico;
            }

            public function actualizarCClave(){
                return "UPDATE medico
                        SET
                            nombre = '" . $this -> nombre . "',
                            direccion = '" . $this -> direccion . "',
                            usuario = '" . $this -> usuario . "',
                            contrasena = '" . md5($this -> contrasena) . "',
                            estado = '" . $this -> estado . "',
                            FK_idConsultorio = '". $this -> idConsultorio ."',
                            FK_idCiudad = '". $this -> idCiudad ."',
                            FK_idEspecialidad = '". $this -> idEspecialidad ."'
                        WHERE idMedico = ". $this -> idMedico;
            }

            public function buscarPaginado($pag, $cant){
                return "SELECT medico.idMedico, medico.nombre, medico.direccion, medico.usuario, medico.estado, consultorio.consultorio as consultorio, ciudad.nombre as ciudad, especialidad.nombre as especialidad  
                        FROM medico
                        INNER JOIN consultorio on medico.FK_idConsultorio = consultorio.idConsultorio
                        INNER JOIN ciudad on medico.FK_idCiudad = ciudad.idCiudad
                        INNER JOIN especialidad on medico.FK_idEspecialidad = especialidad.idEspecialidad
                        LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
            }
        
            public function buscarCantidad(){
                return "SELECT count(*) 
                        FROM medico";
            }
        
            public function filtroPaginado($str, $pag, $cant){
                return "SELECT medico.idMedico, medico.nombre, medico.direccion, medico.usuario, medico.estado, consultorio.consultorio as consultorio, ciudad.nombre as ciudad, especialidad.nombre as especialidad  
                        FROM medico
                        INNER JOIN consultorio on medico.FK_idConsultorio = consultorio.idConsultorio
                        INNER JOIN ciudad on medico.FK_idCiudad = ciudad.idCiudad
                        INNER JOIN especialidad on medico.FK_idEspecialidad = especialidad.idEspecialidad
                        WHERE medico.nombre like '%". $str ."%' OR medico.idMedico like '%" . $str . "%' OR medico.usuario like '%" . $str . "%'
                        LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
            }
        
            public function filtroCantidad($str){
                return "SELECT count(*) 
                        FROM medico
                        WHERE medico.nombre like '%". $str ."%' OR medico.idMedico like '%" . $str . "%' OR medico.usuario like '%" . $str . "%'";
            }
            
            public function existeCorreo(){
                return "SELECT idMedico
                        FROM medico
                        WHERE usuario= '" . $this -> usuario. "'";
            }
        
            public function existeNuevoCorreo($correo){
                return "SELECT idMedico
                        FROM medico
                        WHERE usuario = '" . $correo . "'";
            }


    }
?>