<?php
  require("conf.php");

  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $password = $_POST['pass'];

  $originFile = fopen(DATA_SRC,"r");
  $temp = tempnam('.','');
  $tempFile = fopen($temp,'w');

  while(($row = fgetcsv($originFile)) !== false){
    if($row[0] != $email){
      fputcsv($tempFile,$row);
    }else{
      fputcsv($tempFile,[$email,$name,$phone,$password]);
    }
  }

  fclose($originFile);
  fclose($tempFile);
  
  rename($temp,DATA_SRC);
  http_response_code(302);
  header("location: userPage.php?email=" . $email);

?>