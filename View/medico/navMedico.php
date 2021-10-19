<?php
    $medico = new Medico($_SESSION['id']);
    $medico -> getInfoBasic();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0px; z-index: 15;box-shadow: 0px 6px 5px 0px rgba(209,209,209,1);">

<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("View/medico/mainMedico.php") ?>">Inicio</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Consultar Historia Clinica</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Citas
            </a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Reagendar Citas</a>
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Consultar Citas Pendientes</a>
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Historial Citas</a>
            </div>
        </li>
    </ul>
    <div class="menu-right nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo ($medico->getNombre() != "") ? $medico->getNombre() : $medico->getUsuario(); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/medico/informacionPersonal.php") ?>">Información Personal</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/medico/cambiarClaveMedico.php") ?>">Cambiar contraseña</a>
                </div>
            </div>
            <div class="menu-right">
                <a class="btn btn-outline-light" style="border:0px;" href="index.php?cerrarSesion=True"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</nav>