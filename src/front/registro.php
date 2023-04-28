<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/global.css">
  <title>Registrar</title>
</head>

<body>

  <div class="content-wrapper">
    <div class="form-wrapper">
      <h1 >Criar conta</h1>
      <?php if(isset($_GET['errcep'])):?>
        <p style="color:red; padding: 0.5em;">Digite um cep valido!</p>
      <?php endif ?>
      <?php if(isset($_GET['err'])):?>
        <p style="color:red; padding: 0.5em;">Email já cadastrado!</p>
      <?php endif ?>
      <form action="/src/front/address.php" method="POST">
        <div class="input-wrapper">
          <input required type="text" name="name" placeholder="Nome">
        </div>
        <div class="input-wrapper">
          <input required type="e-mail" name="email" placeholder="E-mail">
        </div>
        <div class="input-wrapper">
          <input required type="text" name="phone" placeholder="Telefone">
        </div>
        <div class="input-wrapper">
          <input required type="text" name="cep" minlength="8" maxlength="8" placeholder="CEP">
        </div>  
        <div class="input-wrapper">
          <input required type="text" name="cnpj" minlength="14" placeholder="CNPJ">
        </div>
        <div class="input-wrapper">
          <input required type="password" name="pass" minlength="8" placeholder="Senha">
        </div>
        <div class="input-wrapper"><button type="submit">Registrar</button></div>
        <p>Já possui um cadastro? <a href="/src/front/login.php">Fazer login.</a></p>
      </form>
    </div>
  </div>

</body>

</html>