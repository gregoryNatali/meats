<?php
  include('../../functions.inc.php');
  userIsLogged();
  noProductFallback();
  require_once('../../dbconnect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/observacao_pedido.css" >
  <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
  <title>Observação</title>
</head>

<body>
    <!--Barra de navegação-->
    <?php
      include('navbar.html');
      myCartButton();
    ?>
    <main>
        <form method="post">
          <div class="main-div">
            <h1>Adicione uma observação:</h1>
            <div id="adicionar_observacao">
              <label for="input_observacao">
                <div class="barra_observacao">
                  <input id="input_observacao" name="observacao" type="text" maxlength="100" placeholder="Digite algo..." required>
                  <div class="horizontal-line"></div>
                </div>
                <p id="input-counter"></p>
              </label>
            </div>
          </div>
          <button type="submit">Adicionar</button>
        </form>
    </main>
    <?php

      if (isset($_SESSION['observacao'])) {
        echo "<script>document.querySelector('#input_observacao').value = '" . $_SESSION['observacao'] . "'</script>";
      }

      echo "<script>
        let observacao = document.querySelector('#input_observacao').value
        const counter = document.querySelector('#input-counter')
        counter.textContent = 100 - observacao.length
      </script>";

      if (isset($_POST['observacao'])) {
        $_SESSION['observacao'] = $_POST['observacao'];
        echo "<script>window.location = 'produto.php'</script>";
      }

    ?>
  <script src="../scripts/observacao.js"></script>
</body>