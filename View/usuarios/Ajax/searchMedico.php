<?php 

    $str = $_POST['search'];

    $pagina = $_POST['page'];
    $cantPag = $_POST['cantPag'];

    $medico = new Medico();
    
    $data = $medico -> filtroPaginado($str, $pagina, $cantPag);
    $resultado = $medico -> filtroCantidad($str);
    
    $cant = $resultado/$cantPag;

    $ajax = Array(
        "status" => ((count($data) > 0)? true : false),
        "DataT" => $data,
        "DataL" => base64_encode("View/medico/actualizarMedico.php"),
        "Cpage" => $pagina,
        "DataP" => $cant
    );
    echo json_encode($ajax);
?>