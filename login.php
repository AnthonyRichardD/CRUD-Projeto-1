<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>
  
<div class="content-wrapper">
    <div class="form-wrapper">
      <h1>Login</h1>
      <?php if(isset($_GET['err'])):?>
        <p style="color:red; padding:0.5em;"><?=$_GET['err']?></p>
      <?php endif ?>
      <form action="verifyLogin.php" method="POST">
        <div class="input-wrapper">
          <input required type="email" name="email" placeholder="E-mail">
        </div>
        <div class="input-wrapper">
          <input required type="password" name="pass" placeholder="Senha">
        </div>
        <div class="input-wrapper"><button type="submit">Fazer login</button></div>
        <p>Não possui uma conta?<a href="registro.php">Cadastrar-se</a></p>
      </form>
    </div>
  </div>
    
  
</body>
</html>