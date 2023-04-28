<?php
  require("../conf/conf.php");
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $isLogged = false;
  $fp = fopen(DATA_PERSON,"r");

  while (($row = fgetcsv($fp)) !== false) {
    if($row[0] == $email && $row[3] == $pass){
      $isLogged = !$isLogged;
      break;    
    }
  }

  if(!$isLogged){
    http_response_code(302);
    header("location: ../front/login.php?err=Usuário não encontrado!");
    exit();
  }
  
  http_response_code(302); 
  header("location: ../front/userPage.php?email=$email&cep=$row[5]");
?>