<?php
    //session_start();


    $user = $_POST['user'];
    $contrasena = $_POST['contra'];

    $admin = new Administrador("","",$user,$contrasena);
    $paciente = new Paciente("","","","",$user,$contrasena);
    $medico = new Medico("","","",$user,$contrasena);
    
    if($admin -> autenticar()){
        $_SESSION['id'] = $admin -> getIdAdmin();
        $_SESSION['rol'] = 1;

        header('Location: index.php?pid=' . base64_encode('View/administrador/mainAdministrador.php'));
    }else if($paciente -> autenticar()){
        $_SESSION['id'] = $paciente -> getIdPaciente();
        $_SESSION['rol'] = 2;

        header('Location: index.php?pid=' . base64_encode('View/paciente/mainPaciente.php'));
    }else if($medico -> autenticar()){
        $_SESSION['id'] = $medico -> getIdMedico();
        $_SESSION['rol'] = 3;

        header('Location: index.php?pid=' . base64_encode('View/medico/mainMedico.php'));
    }else{
        header('Location: index.php?error=1');
    }



?>
