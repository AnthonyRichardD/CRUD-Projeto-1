<?php
  require("conf.php");

  $email = $_POST['email'];
  
  $originFile = fopen(DATA_SRC,"r");
  $temp = tempnam('.','');
  $tempFile = fopen($temp,'w');

  while(($row = fgetcsv($originFile)) !== false){
    if($row[0] != $email){
      fputcsv($tempFile,$row);
    }
  }
  fclose($originFile);
  fclose($tempFile);
  rename($temp,DATA_SRC);
  
  http_response_code(302);
  header("location: login.php?err=Sua conta foi deletada.");
?>