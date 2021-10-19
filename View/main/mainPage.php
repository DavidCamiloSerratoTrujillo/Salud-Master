<?php
    if(isset($_POST['btn-registrar'])){
        $user = $_POST['ususario'];
        $contrasena = $_POST['contra'];

        $paciente = new  Paciente("","","","",$user,$contrasena);
        $adimn = new Administrador("","",$user);
        $medico = new Medico("","","",$user);

        if($paciente -> existeCorreo() || $admin -> existeCorreo() || $medico -> existeCorreo()){
            $msj = "El correo ya está en uso.";
            $class = "alert-danger";
        }else{
            $paciente -> registrar();
            $msj = "Registro exitoso";
        }

        include "View/main/error.php";
    }

?>

<link rel="stylesheet" href="static/css/index.css">
<script type="text/javascript" src="static/js/index.js"></script>
<div class="hidden">
    <div class="form">
        <form action="index.php?pid=<?php echo base64_encode("View/auth/autenticar.php") ?>" method="post">
            <div class="d-flex flex-row justify-content-center">
                <img src="static/img/logo.png" width=50>
            </div>
            <div>
                <h1>Log in</h1>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="user" type="email" placeholder="Type your email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="contra" type="password" placeholder="Type your password">
            </div>
            <div class="form-group d-flex flex-column align-items-center">
                <input class="form-control btn btn-outline-secondary" name="btn-send" type="submit">
                <span class="mt-3">Don't have an account? <a href="#" id="registrarse">Sign In</a></span>
            </div>
        </form>
    </div>
</div>

<div class="hidden-registrar">
    <div class="form">
        <form action="index.php" method="POST">
            <div class="d-flex flex-row justify-content-center">
                <img src="static/img/logo.png" width=50>
            </div>
            <div>
                <h1>Sign In</h1>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="user" type="email" placeholder="Type your email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="contra" type="password" placeholder="Type your password">
            </div>
            <div class="form-group d-flex flex-column align-items-center">
                <input class="form-control btn btn-outline-secondary" name="btn-registrar" type="submit">
                <span class="mt-3">Already have an account? <a href="#" id="Loguearse">Log In</a></span>
            </div>
        </form>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index:11; width: 100%">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <!-- <a class="navbar-brand" href="#"><img src="static/img/logo.png" width=50></a> -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Medi Plus<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="">
            <div id="signIn" class="btn btn-sm btn-outline-light">Iniciar Sesion</div>
        </div>
    </div>
</nav>

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $msj = "";
    $class = "alert-danger";
    if ($error == 1) {
        $msj = "El correo y la contraseña no coinciden, intente denuevo.";
    } else if ($error == 2) {
        $msj = "Por favor revise su correo y active su cuenta";
        $class = "alert-warning";
    } else if ($error == 3) {
        $msj = "Su usuario ha sido inactivado, por favor contactese con el administrador";
    } else {
        $msj = "Ha ocurrido un error";
    }

    include "View/main/error.php";
}
?>