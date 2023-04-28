<?php
require("../conf/conf.php");
require("../../API/cepConsultation.php");
$email = $_GET['email'];
$fp = fopen(DATA_PERSON, "r");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/styles/userpage.css">
  <title>Minha pagina</title>
</head>

<body>

  <div class="content-wrapper flex-aling-center">
    <?php while (($row = fgetcsv($fp)) !== false) : ?>
      <?php if ($row[0] == $email) : ?>
        <div class="user-info">
          <div class="info-row text-format">
            <h2>Nome:</h2>
            <p><?= $row[1] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>Telefone:</h2>
            <p><?= $row[2] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>E-mail:</h2>
            <p><?= $row[0] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>CNPJ:</h2>
            <p><?= $row[4] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>Cep:</h2>
            <p><?= $row[5] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>Rua:</h2>
            <p><?= $data['logradouro'] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>cidade:</h2>
            <p><?= $data['localidade'] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>Estado:</h2>
            <p><?= $data['uf'] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>bairro:</h2>
            <p><?= $data['bairro'] ?></p>
          </div>
          <div class="info-row text-format">
            <h2>Complemento:</h2>
            <p><?= $data['complemento'] ?></p>
          </div>
          <div class="delete-wrapper">
            <form action="/src/edit/deleteAccount.php" onsubmit="return confirm('are you sure?')" method="POST">
              <input type="hidden" name="email" value=<?= $row[0] ?>>
              <button style="cursor:pointer;">Deletar Conta</button>
            </form>
          </div>
        </div>
        <div class="update-wrapper">
          <div class="form-wrapper">
            <form action="../edit/updateUser.php" method="POST">
              <h1>Atualizar seus dados</h1>
              <?php if(isset($_GET['err'])):?>
                <h2 style="color:red;">Erro ao atualizar. Cep invalido!</h2>
              <?php endif ?>
              <div class="input-wrapper"><input type="hidden" name="email" value="<?= $row[0] ?>"></div>
              <div class="input-wrapper"><input placeholder="Nome" type="text" name="name" value="<?= $row[1] ?>"></div>
              <div class="input-wrapper"><input placeholder="Telefone" type="number" name="phone" value="<?= $row[2] ?>"></div>
              <div class="input-wrapper"><input placeholder="Senha" id="pass" type="password" name="pass" minlength="8" value="<?= $row[3] ?>"></div>
              <div class="input-wrapper"><input placeholder="cnpj" type="text" name="cnpj" value="<?= $row[4] ?>"></div>
              <div class="input-wrapper"><input placeholder="CEP" type="text" minlength="8" maxlength="8" name="cep" value="<?= $row[5] ?>"></div>
              <?php break ?>
            <?php endif ?>
          <?php endwhile ?>

          <div onclick="showPass()">Mostar senha</div>
          <div class="input-wrapper"><button type="submit">Atualizar</button></div>
            </form>
          </div>
        </div>

        <script>
          let hidden = true
          const pass = document.querySelector('#pass')

          function showPass() {
            if (hidden) {
              pass.type = "text"
              hidden = !hidden
            } else {
              pass.type = "password"
              hidden = !hidden
            }
          }
        </script>
  </div>
</body>

</html>