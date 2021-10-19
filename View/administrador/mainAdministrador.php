<?php
    $idAdmin = $_SESSION['id'];

    $administrador = new Administrador($idAdmin);
    $administrador -> getInfoBasic();

    if($_SESSION['rol'] == 1){?>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <h1>Información Básica</h1>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-12 col-lg-11 col-xl-10">
                    <div class="card">
                        <div class="card-header bg-dark d-flex flex-row justify-content-center">
                            <h4 class="text-light">¡Bienvenido!</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-lg d-flex flex-row justify-content-center">
                                <table class="table" style="width: 80% !important">
                                    <tbody id="tabla">
                                        <tr>
                                            <th> Cargo</th>
                                            <td> Administrador</td>
                                        </tr>
                                        <tr>
                                            <th> Nombre</th>
                                            <td> <?php echo $administrador -> getNombre()?></td>
                                        </tr>
                                        <tr>
                                            <th> Email</th>
                                            <td> <?php echo $administrador -> getUsuario()?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }else if($_SESSION['rol'] == 2){
        header('Location: index.php?pid=' . base64_encode('View/paciente/mainPaciente.php'));
    }else if($_SESSION['rol'] == 3){
        header('Location: index.php?pid=' . base64_encode('View/medico/mainMedico.php'));
    }
?>

