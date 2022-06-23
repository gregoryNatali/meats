<?php
  include('../../functions.inc.php');
  userIsLogged();
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
    <main>
        <div class="main-div">
            <!--Título-->
            <h1>Adicione uma observação:</h1>
            <div id="adicionar_observacao">
                <label for="input_observacao">
                    <div class="barra_observacao">
                        <input id="input_observacao" type="text" maxlength="100" placeholder="Digite algo...">
                        <div class="horizontal-line"></div>
                    </div>
                    <p id="input-counter">100</p>
                </label>
            </div>
        </div>
        <a href="produto.php"><button type="submit">Adicionar</button></a>
    </main>
    
    <!--Barra de navegação-->
    <?php require_once('navbar.html'); ?>
  <script src="../scripts/observacao.js"></script>
</body>