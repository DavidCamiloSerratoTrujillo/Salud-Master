<?php 

    class AdministradorDAO{
        private $idAdmin;
        private $nombre;
        private $usuario;
        private $contrasena;
            public function AdministradorDAO($idAdmin="",$nombre="",$usuario="",$contrasena=""){
                $this -> idAdmin=$idAdmin;
                $this -> nombre=$nombre;
                $this -> usuario=$usuario;
                $this -> contrasena=$contrasena;
            }
            /* 
            *   Functions
            */
            public function insertar(){
                return "INSERT INTO administrador 
                        VALUES ('". $this -> idAdmin . "', '" . $this -> nombre . "', '" . $this -> usuario . "', '" . md5($this -> contrasena) . "')";
            }

            public function autenticar(){
                
                return "SELECT idAdmin
                        FROM administrador
                        Where usuario = '" . $this -> usuario . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }
            public function getInfoBasic(){
                return "SELECT idAdmin, nombre, usuario, contrasena 
                        FROM administrador
                        WHERE idAdmin = " . $this -> idAdmin;
            }
            public function checkClave(){
                return "SELECT idAdmin
                        FROM administrador
                        WHERE idAdmin = '" . $this -> idAdmin . "' AND contrasena = '" . md5($this -> contrasena) . "'";
            }
        
            public function actualizarClave($nuevaClave){
                return "UPDATE administrador
                        SET
                            contrasena = '" . md5($nuevaClave) . "'
                        WHERE idAdmin = " . $this -> idAdmin;
            }

            public function actualizarAdministrador(){
                return "UPDATE administrador
                        SET 
                            nombre = '" . $this -> nombre . "',
                            usuario = '" . $this -> usuario . "'
                        WHERE idAdmin = " . $this -> idAdmin;
            }
        
            public function existeCorreo(){
                return "SELECT idAdmin
                        FROM administrador
                        WHERE usuario = '" . $this -> usuario. "'";
            }
        
            public function existeNuevoCorreo($correo){
                return "SELECT idAdmin
                        FROM administrador
                        WHERE usuario = '" . $correo . "'";
            }

            public function buscarPaginado($pag, $cant){
                return "SELECT idAdmin, nombre, usuario 
                        FROM administrador
                        LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
            }
        
            public function buscarCantidad(){
                return "SELECT count(*) 
                        FROM administrador";
            }

            public function filtroPaginado($str, $pag, $cant){
                return "SELECT idAdmin, nombre, usuario 
                        FROM administrador 
                        WHERE administrador.nombre like '%". $str ."%' OR administrador.usuario like '%" . $str . "%' OR administrador.idAdmin like '%" . $str . "%'
                        LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
            }
        
            public function filtroCantidad($str){
                return "SELECT count(*) 
                        FROM administrador
                        WHERE administrador.nombre like '%". $str ."%' OR administrador.usuario like '%" . $str . "%' OR administrador.idAdmin like '%" . $str . "%'";
            }

    }
?>