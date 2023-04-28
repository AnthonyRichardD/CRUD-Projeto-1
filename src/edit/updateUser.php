<?php
  require("../conf/conf.php");
  require("../../API/cepConsultation.php");
  ### verificar se o CEP é valido
  
  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $password = $_POST['pass'];
  $cnpj = $_POST['cnpj'];
 
  if(isset($data['erro'])){
    $fp = fopen(DATA_PERSON,'r');
    while(($row = fgetcsv($fp)) !== false){
      if($email == $row[0]){
        header("location: ../front/userPage.php?email=$email&cep=$row[5]&err=deuruim");
      }
    }
    exit();
  }
 
  $originFile = fopen(DATA_PERSON,"r");
  $temp = tempnam('.','');
  $tempFile = fopen($temp,'w');

  while(($row = fgetcsv($originFile)) !== false){
    if($row[0] != $email){
      fputcsv($tempFile,$row);
    }else{
      fputcsv($tempFile,[$email,$name,$phone,$password,$cnpj,$cep]);
    }
  }

  fclose($originFile);
  fclose($tempFile);
  
  rename($temp,DATA_PERSON);
  http_response_code(302);
  header("location: ../front/userPage.php?email=$email&cep=$cep");

?>