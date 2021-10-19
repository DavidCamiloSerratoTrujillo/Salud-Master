<?php
    $ciudad = new Ciudad();
    $resultados = $ciudad -> getCiudades();
    $especialidad = new Especialidad();
    $consultorio = new Consultorio();
    $resE = $especialidad -> getEspecialidades();
    $resC = $consultorio -> getConsultorios();

if (isset($_POST['crearMedico'])) {

    $idMedico = $_POST['idMedico'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['user'];
    $contrasena = $_POST['contra'];
    $estado = $_POST['estado'];
    $idConsultorio = $_POST['consultorio'];
    $idCiudad = $_POST['ciudad'];
    $idEspecialidad = $_POST['especialidad'];

    $medico = new Medico($idMedico, $nombre, $direccion ,$usuario, $contrasena, $estado, $idConsultorio, $idCiudad, $idEspecialidad);
    $paciente = new Paciente("", "", "", "", $usuario);
    $administrador = new Administrador("", "", $usuario);
    

    if ($medico -> existeCorreo() || $paciente -> existeCorreo() || $administrador -> existeCorreo()) {

        $msj = "El correo suministrado ya se encuentra en uso";
        $class = "alert-danger";
    } else {

        $res = $medico -> insertar();

        if ($res == 1) {
            $msj = "El medico se ha creado satisfactoriamente";
            $class = "alert-success";
        } else {
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
                    <form novalidate class="needs-validation" action="index.php?pid=<?php echo base64_encode("View/medico/crearMedico.php") ?>" method="POST">
                        <div class="form-title">
                            <h1>Crear Medico</h1>
                        </div>
                        <div class="form-group">
                            <label>Cedula</label>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="idMedico" type="text" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su cedula.
                                    </div>
                                    <div class="valid-feedback">
                                        ¡Enhorabuena!
                                    </div>
                                </div>
                            </div>
                            <label>Nombre</label>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" name="nombre" type="text" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su nombre.
                                    </div>
                                    <div class="valid-feedback">
                                        ¡Enhorabuena!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input class="form-control" name="direccion" type="text" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su direccion.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <!-- Utilizar el for each para las ciudades, puede servir.-->
                            <select name="estado" class="form-control" required>
                                <option value="" selected disabled>-- Estado --</option>
                                <option value="1">Activado</option>
                                <option value="0">Desactivado</option>-
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un estado.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Especialidad</label>
                            <!-- Utilizar el for each para las ciudades, puede servir.-->
                            <select name="especialidad" class="form-control" required>
                            <option value="" selected disabled>-- Especialidad --</option>
                            <?php foreach ( $resE as $res ) { ?>
                                <option value="<?php echo $res -> getIdEspecialidad() ?>"><?php echo $res -> getNombre() ?></option>
                                
                                <?php
                            }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione una especialidad.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Consultorio</label>
                            <!-- Utilizar el for each para las ciudades, puede servir.-->
                            <select name="consultorio" class="form-control" required>
                            <option value="" selected disabled>-- Consultorio --</option>
                            <?php foreach ( $resC as $res ) { ?>
                                <option value="<?php echo $res -> getIdConsultorio() ?>"><?php echo $res -> getConsultorio() ?></option>
                                
                                <?php
                            }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un consultorio.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ciudad</label>
                            <!-- Utilizar el for each para las ciudades, puede servir.-->
                            <select name="ciudad" class="form-control" required>
                            <option value="" selected disabled>-- Ciudad --</option>
                            <?php foreach ( $resultados as $res ) { ?>
                                <option value="<?php echo $res -> getIdCiudad() ?>"><?php echo $res -> getNombre() ?></option>
                                
                                <?php
                            }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione una ciudad.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input class="form-control" name="user" type="email" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su correo.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" name="contra" type="password" value="" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su contraseña.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" name="crearMedico" type="submit"> Crear </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>