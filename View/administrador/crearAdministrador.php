<?php

if(isset($_POST['crearAdmin'])){
    $idAdmin = $_POST['idAdmin'];
    $nombre = $_POST['nombre'];
    $user = $_POST['user'];
    $contrasena = $_POST['contra'];

    $administrador = new Administrador($idAdmin,$nombre,$user,$contrasena);
    $paciente = new Paciente("","","","",$user);
    $medico = new Medico("","","",$user);

    if($administrador -> existeCorreo() || $paciente -> existeCorreo() || $medico -> existeCorreo()){
        $msj = "El correo ya está en uso.";
        $class = "alert-danger";
    }else{
        $res = $administrador -> insertar();

        if($res == 1){
            $msj = "El administrador se ha creado satisfactoriamente";
            $class = "alert-success";
        }else{
            $msj = "Ocurrió algo inesperado, intente de nuevo.";
            $class = "alert-danger";
        }
    }

    include "View/main/error.php";
}
?>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-12 col-lg-9 col-xl-8 form-bg">
            <div class="card">
                <div class="card-body">
                    <div class="form-title">
                        <h1>Crear Administrador</h1>
                    </div>
                    <form novalidate class="needs-validation" action="index.php?pid=<?php echo base64_encode("View/administrador/crearAdministrador.php") ?>" method="POST">
                        <div class="form-group">
                            <label>Identificacion</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="idAdmin" placeholder="Ingresa tu ID" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su ID
                                    </div>
                                    <div class="valid-feedback">
                                        ¡Enhorabuena!
                                    </div>
                                </div>
                            </div>
                            <label>Nombre</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su nombre
                                    </div>
                                    <div class="valid-feedback">
                                        ¡Enhorabuena!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="user" placeholder="Ingresa tu correo" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su correo.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" name="contra" type="password" value="" placeholder="Ingrese la contraseña" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su contraseña.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" name="crearAdmin" type="submit"> Crear administrador </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>