<?php
    $idMedico = $_SESSION['id'];
    
    $medico = new Medico($idMedico);
    $medico -> getInfoBasic();

?>
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
                                            <th> </th>
                                            <td> Medico</td>
                                        </tr>
                                        <tr>
                                            <th> Nombre</th>
                                            <td> <?php echo $medico -> getNombre()?></td>
                                        </tr>
                                        <tr>
                                            <th> Usuario</th>
                                            <td> <?php echo $medico -> getUsuario()?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
