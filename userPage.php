<?php
  require("conf.php");
  
  $email = $_GET['email'];
  $fp = fopen(DATA_SRC,"r");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="userpage.css">
  <title>Minha pagina</title>
</head>
<body>

  <div class="content-wrapper flex-aling-center">
    <?php while(($row = fgetcsv($fp)) !== false):?>
      <?php if($row[0] == $email):?>
        <div class="user-info">
          <div class="info-row text-format">
            <h2>Nome:</h2><p><?=$row[1]?></p>
          </div>
          <div class="info-row text-format">
            <h2>Telefone:</h2><p><?=$row[2]?></p>
          </div>
          <div class="info-row text-format">
            <h2>E-mail:</h2><p><?=$row[0]?></p>
          </div>

          <div class="delete-wrapper">
            <form action="deleteAccount.php" onsubmit="return confirm('are you sure?')" method="POST">
              <input type="hidden" name="email" value=<?=$row[0]?>>
              <button style="cursor:pointer;">Deletar Conta</button>
            </form>
        </div>
        </div>
        <div class="update-wrapper">
          <div class="form-wrapper">
            <form action="updateUser.php" method="POST">
              <h1>Atualizar seus dados</h1>
              <div class="input-wrapper"><input type="hidden" name="email" value="<?=$row[0]?>"></div>
              <div class="input-wrapper"><input type="text" name="name" value="<?=$row[1]?>"></div>
              <div class="input-wrapper"><input type="number" name="phone" value="<?=$row[2]?>"></div>
              <div class="input-wrapper"><input id="pass" type="password" name="pass" minlength="8" value="<?=$row[3]?>"></div>
              <div onclick="showPass()">Mostar senha</div>
              <div class="input-wrapper"><button type="submit">Atualizar</button></div>
            </form>
          </div>
        </div>
        <?php break?>
      <?php endif?>
    <?php endwhile ?>
    
    <script>
      let hidden = true
      const pass = document.querySelector('#pass')
      function showPass(){
        if(hidden){
          pass.type = "text"
          hidden = !hidden
        }else{
          pass.type = "password"
          hidden = !hidden
        }
      }
    </script>
  </div>


</body>
</html>