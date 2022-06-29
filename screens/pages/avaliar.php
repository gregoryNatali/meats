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
  <link rel="stylesheet" href="../styles/avaliar_pedido.css" >
  <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
  <title>Avaliar</title>
</head>

<body>
    <!--Barra de navegação-->
    <?php
      include('navbar.html');
      myCartButton();
    ?>
    <main>
      <form method="post">
        <h1>Qual é a nota que você dá para este produto?</h1>
        <div id="estrelas" required></div>
        <div class="button">
          <button id="enviar-nota" name="enviar_nota" type="submit">Avaliar</button>
        </div>
      </form>
    </main>
    <script src="../scripts/avaliar.js"></script>
    <?php
      $id_cardapio = $_SESSION['produto'];
      if (isset($_POST['enviar_nota'])) {
        $nota = $_POST['enviar_nota']; // nota para enviar no banco
        
        echo "<script>
          window.location = 'produto.php'
        </script>";
      }
    ?>
</body>