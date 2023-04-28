<?php
  require("../conf/conf.php");

  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $password = $_POST['pass'];
  $cpnj = $_POST['cnpj'];
  $cep = $_POST['cep'];
  
  ## Verificando se email já foi cadastrado.

  $fp = fopen(DATA_PERSON,"r");

  while(($row = fgetcsv($fp)) !== false){
    if($email == $row[0]){
      http_response_code(302);
      header("location: ../front/registro.php?err");
      exit();
    }
  }

  ## Adicionando informações no arquivo
  
  $fp = fopen(DATA_PERSON,"a");
  fputcsv($fp, [$email,$name,$phone,$password,$cpnj,$cep]);
  fclose($fp);
  
  http_response_code(302);
  header("location: ../front/login.php");
?>