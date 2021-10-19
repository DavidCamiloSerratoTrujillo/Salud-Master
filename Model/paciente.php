<?php 

    require_once "Persistence/Conexion.php";
    require_once "Persistence/PacienteDAO.php";

    class Paciente{
        private $idPaciente;
        private $nombre;
        private $fechaNacimiento;
        private $usuario;
        private $contraseña;
        private $direccion;
        private $FK_idCiudad;
        private $estado;
        private $pacienteDAO;
        private $conexion;

            public function Paciente($idPaciente="",$nombre="",$fechaNacimiento="",$direccion ="",$usuario="",$contraseña="",$estado="",$FK_idCiudad=""){
                $this -> idPaciente=$idPaciente;
                $this -> nombre=$nombre;
                $this -> usuario=$usuario;
                $this -> contraseña=$contraseña;
                $this -> fechaNacimiento=$fechaNacimiento;
                $this -> direccion=$direccion;
                $this -> estado = $estado;
                $this -> FK_idCiudad=$FK_idCiudad;
                $this -> pacienteDAO = new PacienteDAO($idPaciente,$nombre,$fechaNacimiento,$direccion,$usuario,$contraseña,$estado,$FK_idCiudad);
                $this-> conexion = new conexion();
            }
            /*
            * Getters
            */
            public function getIdPaciente(){
                return $this -> idPaciente;
            }
            public function getNombre(){
                return $this -> nombre;
            }
            public function getUsuario(){
                return $this -> usuario;
            }
            public function getFechaNacimiento(){
                return $this -> fechaNacimiento;
            }
            public function getDireccion(){
                return $this -> direccion;
            }
            public function getEstado(){
                return $this -> estado;
            }
            public function getFK_idCiudad(){
                return $this -> FK_idCiudad;
            }
            public function getContraseña(){
                return $this -> contraseña;
            }
            /*
            * Setters
            */
            public function setIdPaciente($idAdmin){
                $this -> idPaciente = $idAdmin;
            }
            public function setNombre($nombre){
                $this -> nombre = $nombre;
            }
            public function setUsuario($usuario){
                $this -> usuario = $usuario;
            }
            public function setContraseña($contraseña){
                $this -> contraseña = $contraseña;
            }
            public function setFechaNacimiento($fechaNacimiento){
                $this -> fechaNacimiento=$fechaNacimiento;
            }
            public function setDireccion($direccion){
                $this -> direccion=$direccion;
            }
            public function setFK_idCiudad($FK_idCiudad){
                $this -> FK_idCiudad=$FK_idCiudad;
            }
            /*
            * Funtions
            */
            public function autenticar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> pacienteDAO -> autenticar());
                if($this -> conexion -> numFilas() == 1){
                    $res = $this -> conexion -> extraer();
                    $this -> idPaciente = $res[0];
                    return True;
                }else{
                    return False;
                }
            }
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> pacienteDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> nombre = $res[1];
                $this -> fechaNacimiento = $res[2];
                $this -> direccion = $res[3];
                $this -> usuario = $res[4];
                $this -> contraseña = $res[5];
                $this -> FK_idCiudad = $res[6];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
            /**
             * Actualizar administrador
             */
            public function actualizarPaciente(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> pacienteDAO -> actualizarPaciente());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
            * Crear un nuevo paciente
            */
            public function insertar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> pacienteDAO -> insertar());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
             * Check clave
             */
            public function checkClave(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> pacienteDAO -> checkClave());    
                $this -> conexion -> cerrar();
                if($this -> conexion -> numFilas() == 1){
                    return true;
                }else{
                    return false;
                }
            }

            public function existeCorreo(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> pacienteDAO -> existeCorreo());
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }

            public function existeNuevoCorreo($correo){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> pacienteDAO -> existeNuevoCorreo($correo));
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }
    }
   

?>