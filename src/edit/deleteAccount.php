<?php
  require("../conf/conf.php");

  $email = $_POST['email'];
  
  $originFile = fopen(DATA_PERSON,"r");
  $temp = tempnam('.','');
  $tempFile = fopen($temp,'w');

  while(($row = fgetcsv($originFile)) !== false){
    if($row[0] != $email){
      fputcsv($tempFile,$row);
    }
  }

  fclose($originFile);
  fclose($tempFile);
  rename($temp,DATA_PERSON);
  
  http_response_code(302);
  header("location: ../front/login.php?err=Sua conta foi deletada.");
?>