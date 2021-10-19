<?php 
$idMedico = $_POST['idMedico'];
$estado = $_POST['estado'];

$medico= new Medico($idMedico,"","","","",$estado);

$res = $medico -> updateEstado();
$medico -> getInfoBasic();
$ajax = Array();

if($res == 1){
    $ajax['status'] = true; 
    $ajax['msj'] = "El estado ha sido actualizado correctamente";
}else{
    $ajax['status'] = false;
    $ajax['msj'] = "Hubo un inconveniente, por favor intente denuevo";
}

echo json_encode($ajax);
?>