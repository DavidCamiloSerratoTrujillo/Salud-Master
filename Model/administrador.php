<?php 

    require_once "Persistence/Conexion.php";
    require_once "Persistence/AdministradorDAO.php";

    class Administrador{
        private $idAdmin;
        private $nombre;
        private $usuario;
        private $contraseña;
        private $administradorDAO;
        private $conexion;

            public function Administrador($idAdmin="",$nombre="",$usuario="",$contraseña=""){
                $this -> idAdmin=$idAdmin;
                $this -> nombre=$nombre;
                $this -> usuario=$usuario;
                $this -> contraseña=$contraseña;
                $this -> administradorDAO = new AdministradorDAO($idAdmin,$nombre,$usuario,$contraseña);
                $this-> conexion = new conexion();
            }
            /*
            * Getters
            */
            public function getIdAdmin(){
                return $this -> idAdmin;
            }
            public function getNombre(){
                return $this -> nombre;
            }
            public function getUsuario(){
                return $this -> usuario;
            }
            public function getContraseña(){
                return $this -> contraseña;
            }
            /*
            * Setters
            */
            public function setIdAdmin($idAdmin){
                $this -> idAdmin = $idAdmin;
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
            /*
            * Funtions
            */
            public function autenticar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> autenticar());
                if($this -> conexion -> numFilas() == 1){
                    $res = $this -> conexion -> extraer();
                    $this -> idAdmin = $res[0];
                    return True;
                }else{
                    return False;
                }
            }
            public function getInfoBasic(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> getInfoBasic() );
                $res = $this -> conexion -> extraer();
                /* Actualzar OBJ*/
                $this -> nombre = $res[1];
                $this -> usuario = $res[2];
                $this -> contraseña = $res[3];
                /* FIN Actualzar OBJ*/
                $this -> conexion -> cerrar();
            }
            /**
             * Actualizar administrador
             */
            public function actualizarAdministrador(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> administradorDAO -> actualizarAdministrador());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
             * Actualiza la contraseña del cliente
             */
            public function actualizarClave($nuevaClave){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> administradorDAO -> actualizarClave($nuevaClave));
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            /**
            * Check clave
            */
            public function checkClave(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> administradorDAO -> checkClave());    
                $this -> conexion -> cerrar();
                if($this -> conexion -> numFilas() == 1){
                    return true;
                }else{
                    return false;
                }
            }
            /**
            * Crear un nuevo administrador
            */
            public function insertar(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar($this -> administradorDAO -> insertar());
                $res = $this -> conexion -> filasAfectadas();
                $this -> conexion -> cerrar();
                return $res;
            }
            public function existeCorreo(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> existeCorreo());
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }

            public function existeNuevoCorreo($usuario){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> existeNuevoCorreo($usuario));
                $this -> conexion -> cerrar();
                return $this -> conexion -> numFilas();
            }
            /*
            * Función que busca por paginación y devuelve n objetos de tipo Producto en un array
            */
            public function buscarPaginado($pag, $cant){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> buscarPaginado($pag, $cant));
                $resList = Array();
                while($res = $this -> conexion -> extraer()){
                    array_push($resList, new Administrador($res[0], $res[1], $res[2], $res[3]));
                }
                $this -> conexion -> cerrar();

                return $resList;
            }
            /*
            * Busca la cantidad de registros sin ningun filtro
            */
            public function buscarCantidad(){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> buscarCantidad());
                $res = $this -> conexion -> extraer();
                $this -> conexion -> cerrar();
                return $res[0];
            }
            /*
             * Función que busca por paginación, filtro de palabra y devuelve la información en un array
             */
            public function filtroPaginado($str, $pag, $cant){
                $this -> conexion -> abrir();
                $this -> conexion -> ejecutar( $this -> administradorDAO -> filtroPaginado($str, $pag, $cant));
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
                $this -> conexion -> ejecutar( $this -> administradorDAO -> filtroCantidad($str));
                $res = $this -> conexion -> extraer();
                $this -> conexion -> cerrar();
        
                return $res[0];
            }
    }
   

?>