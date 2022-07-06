<?php
  include('../../functions.inc.php');
  userIsLogged();
  require_once('../../dbconnect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <link rel="stylesheet" href="../styles/carrinho.css">
  <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap" rel="stylesheet">
  <title>Meu Carrinho</title>
  <style>
    main {
      max-width: 1000px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .produtos button {
      text-align: left;
      border: none;
      width: 100%;
    }

    .valor_dinheiro {
      margin-right: 8px;
    }
  </style>
</head>

<body>
  <!--Barra de navegação-->
  <?php include('navbar.html'); ?>
  <main>
    <?php

      if (!isset($_SESSION['pedido'])) {
          $_SESSION['pedido'] = [];
      }

      $taxa_entrega = number_format(3, 2);
      $pedido = $_SESSION['pedido'];
      $quant = 0;
      $obs = '';

      if (isset($_SESSION['observacao'])) {
          $obs = $_SESSION['observacao'];
      }

      if (isset($_SESSION['quant'])) {
          $quant = $_SESSION['quant'];
      }

      if (isset($_SESSION['produto']) && $quant > 0) {
          $id_produto = $_SESSION['produto'];

          $item_pedido = [
            'id' => $id_produto,
            'quant' => $quant,
            'obs' => $obs
          ];

          $pedido = $item_pedido;
          array_push($_SESSION['pedido'], $pedido); // adiciona o produto ao carrinho
          $pedido = $_SESSION['pedido'];
      }

      if (empty($pedido)) { // previne que o usuário entre nessa tela sem adicionar um produto
          unset($_SESSION['pedido']);
          echo '<script>window.location = "index.php"</script>';
      }

      $preco_pedido = 0;
      
      resetCurrentProduct();

    ?>
    <!--Título-->
    <div class="carrinho">
      Meu Carrinho
      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M27.2775 9.28876C27.1625 9.1226 27.009 8.98678 26.83 8.89295C26.6511 8.79912 26.4521 8.75007 26.25 8.75001H9.16625L7.72375 5.28751C7.53461 4.83153 7.21434 4.44199 6.80353 4.16827C6.39273 3.89455 5.90989 3.74897 5.41625 3.75001H2.5V6.25001H5.41625L11.3462 20.4813C11.4412 20.709 11.6015 20.9034 11.8068 21.0402C12.0121 21.177 12.2533 21.25 12.5 21.25H22.5C23.0212 21.25 23.4875 20.9263 23.6712 20.44L27.4212 10.44C27.4921 10.2508 27.5161 10.0472 27.491 9.84669C27.466 9.64619 27.3927 9.45474 27.2775 9.28876ZM21.6337 18.75H13.3337L10.2087 11.25H24.4462L21.6337 18.75Z"
          fill="black" />
        <path
          d="M13.125 26.25C14.1605 26.25 15 25.4105 15 24.375C15 23.3395 14.1605 22.5 13.125 22.5C12.0895 22.5 11.25 23.3395 11.25 24.375C11.25 25.4105 12.0895 26.25 13.125 26.25Z"
          fill="black" />
        <path
          d="M21.875 26.25C22.9105 26.25 23.75 25.4105 23.75 24.375C23.75 23.3395 22.9105 22.5 21.875 22.5C20.8395 22.5 20 23.3395 20 24.375C20 25.4105 20.8395 26.25 21.875 26.25Z"
          fill="black" />
      </svg>
    </div>
    <div class="linha-carrinho" style="width: 80%;"></div>

    <form class="cardapio" style="margin-bottom: 20px;" action="editar_produto.php" method="post">
      
      <?php

          for ($quant_produtos = 0; $quant_produtos < count($pedido); $quant_produtos++) {

              $sql_carrinho = "SELECT * FROM cardapio WHERE id_cardapio = " . $pedido[$quant_produtos]['id'];
              $resultado_produto = mysqli_fetch_assoc(mysqli_query($conn, $sql_carrinho));
              $preco = number_format($resultado_produto['preco_produto'] * $pedido[$quant_produtos]['quant'], 2);
              $preco_pedido += $preco;
      
              echo '<button class="produtos-carrinho" name="produto" value="' . $quant_produtos . '">
      
                  <div class="produtos-carrinho-start">
                    <div class="infos-produto">
                      <h2 style="margin-bottom: 5px;">' . $resultado_produto['nome_produto'] . '</h2>
                      <h2>Quantidade: <span style="margin-left: 5px;">' . $pedido[$quant_produtos]['quant'] . '</span></h2>';
              if ($pedido[$quant_produtos]['obs'] != '') {
                  echo '<h3>Obs.: <span style="color: rgb(40, 40, 40); font-weight: 400;">' . $pedido[$quant_produtos]['obs'] . '</span></h3>';
              }
              echo '</div>
          
                    <div class="valor-produto">
                      <h2 class="valor_dinheiro">R$ ' . $preco . '</h2>
                      <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
                      </svg>
                    </div>
                  </div>
          
                  <div class="imagem-produto" style="background-image: url(' . loadProductImage($conn, $resultado_produto['id_cardapio']) . ');">
                    
                  </div>
          
              </button>';
          }
          
          $_SESSION['preco_pedido'] = number_format($preco_pedido, 2);
      ?>

      </form>

      <form class="cardapio" action="carrinho2.php">

        <div class="linha-carrinho"></div>
        
        <div class="valor-pedido">
          <h2>Valor dos itens: <span class="valor_dinheiro" style="color: #124A15;">R$ <?php echo $_SESSION['preco_pedido']; ?></span>
            <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
            </svg>
          </h2>
          <h2>Taxa de entrega: <span class="valor_dinheiro" style="color: #124A15;">R$ <?php echo $taxa_entrega; ?></span>
            <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
            </svg>
          </h2>
          <h2>Valor total: <span class="valor_dinheiro" style="color: #124A15;">R$ <?php echo number_format($_SESSION['preco_pedido'] + $taxa_entrega, 2);?></span>
            <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
            </svg>
          </h2>
        </div>
        <div style="margin-top: 5rem; display: flex; flex-direction: column; align-items: center;">
          <button id="continuar">
            <span>Continuar</span>
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 5H5V17H3V5ZM13 10H7V12H13V17L19 11L13 5V10Z" fill="white"/>
            </svg>
          </button>
        </div>

      </form>

  </main>

  <script src="../scripts/dinheiro.js"></script>
  <script>
    const produtos = document.querySelectorAll('.produto-wrapper')

    for (let index = 0; index < produtos.length; index++) {
      produtos[index].addEventListener('click', () => {
        document.querySelector('form').submit()
      })
    }
  </script>
</body>

</html>