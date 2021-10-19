<?php
    $idMedico = $_SESSION['id'];

    if(isset($_POST['actualizarinfoMedico'])){
        $nombre = $_POST['nombre'];
        $user = $_POST['user'];

        $paciente = new Paciente("","","","",$user);
        $admin = new Medico("","",$user);
        $medico = new Medico($idMedico);

        if ($medico -> getUsuario() != $user && ($paciente -> existeCorreo() || $admin -> existeCorreo() || $medico -> existeNuevoCorreo($user))) {

            $msj = "El correo proporcionado ya se encuentra en uso.";
            $class = "alert-danger";

        }else{
            
            $medico = new Medico($idMedico,$nombre,$direccion,$user,"",$estado,$idConsultorio,$idCiudad,$idEspecialidad);
            $resInsert = $medico -> actualizarMedico();

            if($resInsert == 1){
                $class = "alert-success";
                $msj = "La información de ha actualizado correctamente.";
            }else if($resInsert == 0){
                $class = "alert-warning";
                $msj = "No se ha modificado ningún valor.";
            }else{
                $class = "alert-danger";
                $msj = "Ocurrió algo inesperado";
            }
        }
        
        include "View/main/error.php";

    }else{
        $medico = new Medico($idMedico);
        $medico -> getInfoBasic();
    }
?>
<div class="container  mt-5 mb-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8 form-personal">
            <form novalidate class="needs-validation" action="index.php?pid=<?php echo base64_encode("View/administrador/informacionPersonal.php") ?>" method=POST enctype="multipart/form-data">
                <div class="form-title">
                    <h1>Información Personal</h1>
                </div>
                <div class="form-group mt-4">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $Administrador->getNombre() ?>" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor ingrese su correo.
                    </div>
                    <div class="valid-feedback">
                        ¡Enhorabuena!
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label>Correo</label>
                    <input type="email" name="user" value="<?php echo $Administrador->getUsuario() ?>" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor ingrese su correo.
                    </div>
                    <div class="valid-feedback">
                        ¡Enhorabuena!
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button type="submit" name="actualizarinfoAdmin" class="btn btn-primary w-100">Actualizar información</button>
                </div>
            </form>
        </div>
    </div>
</div>