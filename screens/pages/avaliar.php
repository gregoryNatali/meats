<?php
  include('../../functions.inc.php');
  userIsLogged();
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
    <?php include('navbar.html'); ?>
    <main>
      <div>
        <!--Título-->
        <h1>Qual é a nota que você dá para este produto?</h1>
        <div id="estrelas"></div>
      </div>
        <a href="produto.php"><button type="submit">Avaliar</button></a>
    </main>
  
    <script src="../scripts/avaliar.js"></script>
</body>