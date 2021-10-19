<?php
session_start();

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

    if($_GET['pid']){
        $pid = base64_decode($_GET['pid']);
        include $pid;
    }

?>