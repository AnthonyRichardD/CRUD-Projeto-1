<?php
  require("conf.php");

  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $password = $_POST['pass'];

  ## Verificando se email já foi cadastrado.

  $fp = fopen(DATA_SRC,"r");

  while(($row = fgetcsv($fp)) !== false){
    if($email == $row[0]){
      http_response_code(302);
      header("location:registro.php?err=E-mail ja cadastrado.");
      exit();
    }
  }

  ## Adicionando informações no arquivo
  
  $fp = fopen(DATA_SRC,"a");

  fputcsv($fp, [$email,$name,$phone,$password]);
  fclose($fp);

  http_response_code(302);
  header("location: login.php");
?>