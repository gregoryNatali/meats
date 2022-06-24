<?php include('../../functions.inc.php');?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="stylesheet" href="../styles/produtos.css">
    <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon" />
    <title>Categorias</title>
  </head>
  <body>
    <!--Barra de navegação-->
    <?php include('navbar.html'); ?>
    <main>
        <?php
          require_once('../../dbconnect.php');

          $id_cardapio = $_POST['produto'];
          $sql_produto = "SELECT nome_produto, preco_produto, descricao_produto, peso_produto, nome_categoria FROM `cardapio` 
          INNER JOIN categoria ON cardapio.id_categoria = categoria.id_categoria
          WHERE id_cardapio = $id_cardapio";
          $query = mysqli_query($conn, $sql_produto);
          $resultado = mysqli_fetch_assoc($query);
        ?>
        <div style="<?php echo loadProductImage($conn, $id_cardapio);?>" class="img-produto"></div>
        <div class="horizontal-line"></div>
        <div class="info-produto">
            <?php
              fillProduct($resultado);
            ?>
            <a href="observacao.php"><u>Adicionar uma observação</u></a>
        </div>
        <div id="quantidade">
            <span>Quantidade:</span>
            <svg id="decrease" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.54 1.32127C11.439 1.26818 11.3255 1.24379 11.2116 1.25073C11.0978 1.25767 10.9881 1.29569 10.8943 1.36064L2.76933 6.98564C2.68656 7.04341 2.61895 7.12032 2.57228 7.20982C2.5256 7.29932 2.50122 7.39876 2.50122 7.49971C2.50122 7.60065 2.5256 7.70009 2.57228 7.78959C2.61895 7.87909 2.68656 7.956 2.76933 8.01377L10.8943 13.6388C10.9881 13.7036 11.0978 13.7416 11.2116 13.7486C11.3254 13.7556 11.439 13.7313 11.54 13.6784C11.641 13.6255 11.7256 13.546 11.7846 13.4484C11.8437 13.3509 11.8749 13.239 11.875 13.125V1.87502C11.875 1.76093 11.8438 1.64902 11.7847 1.55141C11.7257 1.45379 11.641 1.3742 11.54 1.32127ZM10.625 11.9319L4.22308 7.50002L10.625 3.06814V11.9319Z" fill="black"/>
            </svg>
            <span id="numero-quant">1</span>
            <svg id="increase" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.46004 1.32127C3.56098 1.26818 3.67453 1.24379 3.78836 1.25073C3.90219 1.25767 4.01194 1.29569 4.10567 1.36064L12.2307 6.98564C12.3134 7.04341 12.381 7.12032 12.4277 7.20982C12.4744 7.29932 12.4988 7.39876 12.4988 7.49971C12.4988 7.60065 12.4744 7.70009 12.4277 7.78959C12.381 7.87909 12.3134 7.956 12.2307 8.01377L4.10567 13.6388C4.0119 13.7036 3.90217 13.7416 3.78837 13.7486C3.67456 13.7556 3.561 13.7313 3.46 13.6784C3.359 13.6255 3.2744 13.546 3.21535 13.4484C3.15631 13.3509 3.12508 13.239 3.12504 13.125V1.87502C3.12503 1.76093 3.15623 1.64902 3.21529 1.55141C3.27434 1.45379 3.35898 1.3742 3.46004 1.32127ZM4.37504 11.9319L10.7769 7.50002L4.37504 3.06814V11.9319Z" fill="black"/>
            </svg>                                
        </div>
        <button id="adicionar-carrinho">
            <span>Adicionar ao carrinho</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.822 7.431C21.73 7.29808 21.6072 7.18943 21.464 7.11436C21.3209 7.0393 21.1616 7.00006 21 7H7.333L6.179 4.23C6.02769 3.86523 5.77147 3.55359 5.44282 3.33462C5.11418 3.11564 4.72791 2.99918 4.333 3H2V5H4.333L9.077 16.385C9.15299 16.5672 9.28118 16.7228 9.44542 16.8322C9.60967 16.9416 9.80263 17 10 17H18C18.417 17 18.79 16.741 18.937 16.352L21.937 8.352C21.9937 8.20063 22.0129 8.03776 21.9928 7.87735C21.9728 7.71695 21.9142 7.56379 21.822 7.431ZM17.307 15H10.667L8.167 9H19.557L17.307 15Z" fill="white"/>
                <path d="M10.5 21C11.3284 21 12 20.3284 12 19.5C12 18.6716 11.3284 18 10.5 18C9.67157 18 9 18.6716 9 19.5C9 20.3284 9.67157 21 10.5 21Z" fill="white"/>
                <path d="M17.5 21C18.3284 21 19 20.3284 19 19.5C19 18.6716 18.3284 18 17.5 18C16.6716 18 16 18.6716 16 19.5C16 20.3284 16.6716 21 17.5 21Z" fill="white"/>
            </svg>
        </button>
        <a href="avaliar.php" class="avaliar">Avaliar este produto</a>
    </main>
    
    <script src="../scripts/dinheiro.js"></script>
    <script src="../scripts/produto.js"></script>
  </body>
</html>
