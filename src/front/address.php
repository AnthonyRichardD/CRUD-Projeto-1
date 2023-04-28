<?php 
  require("../../API/cepConsultation.php");
  if(isset($data['erro'])){
    header("location: ./registro.php?errcep");
    exit();
  }else if(intval($cep) == 0){
    header("location: ./registro.php?errcep");
    exit();
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/global.css">
  <title>CEP</title>
</head>
</head>
<body>
<div class="content-wrapper">
    <div class="form-wrapper">
      <h1>Confirme seu endereco</h1>
      <form action="/src/edit/createUser.php" method="POST">
        <div class="input-wrapper">
          <input required readonly type="text" name="cep" placeholder="CEP" value="<?=$cep?>">
        </div>
        <div class="input-wrapper">
          <input required disabled type="text" placeholder="Rua" value="<?=$data['logradouro']?>">
        </div>
        <div class="input-wrapper">
          <input required disabled type="text" placeholder="Estado" value="<?=$data['uf']?>">
        </div>
        <div class="input-wrapper">
          <input required disabled type="text" placeholder="Cidade" value="<?=$data['localidade']?>">
        </div>
        <div class="input-wrapper">
          <input required disabled type="text" placeholder="Bairro" value="<?=$data['bairro']?>">
        </div>
        <div class="input-wrapper">
          <input required disabled type="text" placeholder="Complemento" value="<?=$data['complemento']?>">
        </div>
        <?php var_dump($cep); ?>
        <input type="text" value="<?=$_POST['name']?>" name="name" hidden >
        <input type="text" value="<?=$_POST['email']?>" name="email" hidden >
        <input type="text" value="<?=$_POST['phone']?>" name="phone" hidden >
        <input type="text" value="<?=$_POST['cnpj']?>" name="cnpj" hidden >
        <input type="text" value="<?=$_POST['pass']?>" name="pass" hidden >
        
        <div class="input-wrapper"><button>Confirmar</button></div>
      </form>
    </div>
  </div>
</body>
</html>