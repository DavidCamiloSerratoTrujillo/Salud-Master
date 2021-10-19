<?php 


    require_once "Persistence/Conexion.php";
    require_once "Persistence/medicoDAO.php";

    class Medico{
        private $idmedico;
        private $nombre;
        private $direccion;
        private $usuario;
        private $contrasena;
        private $estado;
        private $idConsultorio;
        private $idCiudad;
        private $idEspecialidad;
        private $medicoDAO;
        private $conexion;

            public function Medico($idmedico ="",$nombre = "",$direccion = "",$usuario="",$contrasena="",$estado="",$idConsultorio ="",$idCiudad="",$idEspecialidad=""){
                
                $this-> idmedico=$idmedico;
                $this-> nombre=$nombre;
                $this-> direccion=$direccion;
                $this-> usuario=$usuario;
                $this-> contraseña=$contrasena;
                $this -> estado = $estado;
                $this-> idConsultorio=$idConsultorio;
                $this-> idCiudad=$idCiudad;
                $this-> idEspecialidad=$idEspecialidad;
                $this -> medicoDAO = new MedicoDAO($idmedico,$nombre,$direccion,$usuario,$contrasena,$estado,$idConsultorio,$idCiudad,$idEspecialidad);
                $this -> conexion = new conexion();
            }
            /*
            * Getters
            */
            public function getIdMedico(){
                return $this -> idmedico;
            }
            public function getNombre(){
                return $this -> nombre;
            }
            public function getDireccion(){
                return $this -> direccion;
            }
            public function getUsuario(){
                return $this -> usuario;
            }
            public function getContrasena(){
                return $this -> contrasena;
            }
            public function getEstado(){
                return $this -> estado;
            }
            public function getConsultorio(){
                return $this -> idConsultorio;
            }
            public function getCiudad(){
                return $this -> idCiudad;
            }
            public function getEspecialidad(){
                return $this -> idEspecialidad;
            }
            /*
            * Setters
            */
            public function setIdMedico($idAdmin){
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

            /**
            * Crear un nuevo medico
            */
            public function insertar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> medicoDAO -> insertar());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /*
            * Actualiza la información del objeto sin actualizar la contraseña
            */
            public function actualizar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> actualizarMedico());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /*
            * Actualiza la información básica del objeto sin actualizar la contraseña
            */
            public function actualizarBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> actualizarBasic());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
             * Actualiza la información del objeto actualizando la contraseña
             */
            public function actualizarCClave(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> actualizarCClave());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
             * Actualiza la contraseña del cliente
             */

            public function actualizarClave($nuevaClave){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> medicoDAO -> actualizarClave($nuevaClave));
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }

            public function autenticar(){
                $this -> conexion -> abrir();
                echo $this -> medicoDAO -> autenticar();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> autenticar());
                if($this -> conexion -> numFilas() == 1){
                    $res = $this -> conexion -> extraer();
                        $this -> idmedico = $res[0];
                        $this -> nombre = $res[1];
                        $this -> direccion = $res[2];
                        $this -> estado = $res[3];
                        $this -> idConsultorio = $res[4];
                        $this -> idCiudad = $res[5];
                        $this -> idEspecialidad = $res[6];
                    return True;
                }else{
                    return False;
                }
            }
            
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> idmedico = $res[0];
                $this -> nombre = $res[1];
                $this -> direccion = $res[2];
                $this -> usuario = $res[3];
                $this -> estado = $res[4];
                $this -> idConsultorio = $res[5];
                $this -> idCiudad = $res[6];
                $this -> idEspecialidad = $res[7];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
            
            /**
             * Check clave
             */
            public function checkClave(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> medicoDAO -> checkClave());    
                $this -> conexion -> cerrar();
                if($this -> conexion -> numFilas() == 1){
                    return true;
                }else{
                    return false;
                }
            }

            public function existeCorreo(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> existeCorreo());
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }

            public function existeNuevoCorreo($correo){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> existeNuevoCorreo($correo));
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }
            /*
            * Función que busca por paginación y devuelve n objetos de tipo Producto en un array
            */
            public function buscarPaginado($pag, $cant){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> buscarPaginado($pag, $cant));
                $resList = Array();
                while($res = $this -> conexion -> extraer()){
                    array_push($resList, new Medico($res[0], $res[1], $res[2], $res[3], $res[4], $res[5], $res[6], $res[7], $res[8]));
                }
                $this -> conexion -> cerrar();

                return $resList;
            }

            /*
            * Busca la cantidad de registros sin ningun filtro
            */
            public function buscarCantidad(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> buscarCantidad());
                $res = $this -> conexion -> extraer();
                $this -> conexion -> cerrar();
                return $res[0];
            }

            /*
            * Función que busca por paginación, filtro de palabra y devuelve la información en un array
            */
            public function filtroPaginado($str, $pag, $cant){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> filtroPaginado($str, $pag, $cant));
                $resList = Array();
                while($res = $this -> conexion -> extraer()){
                    array_push($resList, $res);
                }
                $this -> conexion -> cerrar();

                return $resList;
            }

            /*
            * Busca la cantidad de registros con filtro de palabra
            */
            public function filtroCantidad($str){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> filtroCantidad($str));
                $res = $this -> conexion -> extraer();
                $this -> conexion -> cerrar();

                return $res[0];
            }
            
            /*
            * Función que actualiza el estado de un medico
            */
            public function updateEstado(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> medicoDAO -> updateEstado());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }

    }
   

?>