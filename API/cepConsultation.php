<?php 
    $cep = $_POST['cep'] ?? $_GET['cep'];
    $data = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"), true);
?>