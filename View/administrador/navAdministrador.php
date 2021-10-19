<?php
    $admin = new Administrador($_SESSION['id']);
    $admin -> getInfoBasic();
?>
<link rel="stylesheet" type="text/css" href="static/css/admin.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0px; z-index: 15;box-shadow: 0px 6px 5px 0px rgba(209,209,209,1);">
    <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("View/administrador/mainAdministrador.php") ?>">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/usuarios/buscarAdmin.php") ?>">Administradores</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/usuarios/buscarMedico.php") ?>">Medicos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Pacientes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Crear Cita</a>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Tipos de Citas</a>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Consultar Citas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Crear Diagnostico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lugares
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Consultorios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("#") ?>">Areas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Especialidades
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Historia Clinica
                </a>
            </li>
        </ul>
        <div class="menu-right nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo ($admin->getNombre() != "") ? $admin->getNombre() : $admin->getUsuario(); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/administrador/informacionPersonal.php") ?>">Información Personal</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("View/administrador/cambiarClaveAdmin.php") ?>">Cambiar contraseña</a>
                </div>
            </div>
            <div class="menu-right">
                <a class="btn btn-outline-light" style="border:0px;" href="index.php?cerrarSesion=True"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</nav>