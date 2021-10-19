<?php
    session_start();
    date_default_timezone_set('America/Bogota');

    require_once "Model/administrador.php";
    require_once "Model/area.php";
    require_once "Model/cita.php";
    require_once "Model/ciudad.php";
    require_once "Model/consultorio.php";
    require_once "Model/diagnostico.php";
    require_once "Model/especialidad.php";
    require_once "Model/estadocita.php";
    require_once "Model/medico.php";
    require_once "Model/paciente.php";
    require_once "Model/tipocita.php";

    $pid = null;

    if(isset($_GET['cerrar sesion'])){
        session_destroy();
        $_SESSION = [];
    }

    if(isset($_GET['pid'])){
        $pid = base64_decode($_GET['pid']);
    }

    include "View/main/head.php";

    $enter = array('View/auth/autenticar.php');

    if(isset($pid)){
        if(isset($_SESSION['id'])){
            if($_SESSION['rol'] == 1){
                include "View/administrador/navAdministrador.php";
                include $pid;
            }else if($_SESSION['rol'] == 2){
                include "View/paciente/navPaciente.php";
                include $pid;
                include "View/paciente/footerPaciente.php";
            }else if($_SESSION['rol'] == 3){
                include "View/medico/navMedico.php";
                include $pid;
            }else{
                include "View/main/mainPage.php";
            }
        }else if(in_array($pid, $enter)){
            include $pid;
        }else{
            header("Location: index.php");
        }
    }else{
        include "View/main/mainPage.php";

        if(isset($_SESSION['id'])){
            session_destroy();
            $_SESSION = [];
        }
    }

    include "View/main/bottom.php";

?>
