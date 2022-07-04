<?php
  include('../../functions.inc.php');
  userIsLogged();
  resetCurrentProduct();
  require_once('../../dbconnect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../styles/styles.css">
        <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
        <title>Meus Pedidos</title>
        <style>
            main {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-family: 'Outfit', sans-serif;
            }
        </style>
    </head>
    <body>
        <!--Barra de navegação-->
        <?php
            include('navbar.html');
            myCartButton();
        ?>
        <main>
            <div id="meus-pedidos">Meus Pedidos</div>
            <div class="pedidos">
                <?php
                    $id_usuario = $_SESSION['user'];

                    $sql_pedidos = "SELECT id_pedido, custo_pedido, troco_usuario, concluido, hora_pedido, hora_entrega
                    FROM `pedido` WHERE id_usuario = $id_usuario
                    ORDER BY id_pedido DESC";

                    $query_pedidos = mysqli_query($conn, $sql_pedidos);

                    if (mysqli_num_rows($query_pedidos) == 0) { // se o usuário não tiver pedidos
                        echo '<div class="sem-pedidos">
                            <div id="pac-man">
                                <svg width="184" height="184" viewBox="0 0 184 184" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="92" cy="92" r="92" fill="#BFEFBE"/>
                                    <path d="M88.7886 76.6945C85.1319 68.0676 78.5971 60.9755 70.2976 56.6266C61.9981 52.2777 52.4474 50.941 43.2729 52.8444C34.0983 54.7478 25.8676 59.7735 19.9831 67.0651C14.0986 74.3567 10.9244 83.4631 11.0014 92.8326C11.0783 102.202 14.4017 111.255 20.4052 118.449C26.4086 125.643 34.7208 130.533 43.9254 132.285C53.1299 134.038 62.6573 132.544 70.8843 128.06C79.1112 123.575 85.5287 116.377 89.0432 107.691L51.5 92.5L88.7886 76.6945Z" fill="#A0DB9F"/>
                                    <ellipse cx="101" cy="92.5" rx="9" ry="9.5" fill="#A0DB9F"/>
                                    <ellipse cx="166" cy="92.5" rx="9" ry="9.5" fill="#A0DB9F"/>
                                    <ellipse cx="133.5" cy="92.5" rx="8.5" ry="9.5" fill="#A0DB9F"/>
                                </svg>
                            </div>
                            <div id="pedir-meats">Bora pedir um MEATS?</div>
                            <div id="dinheiro">Dinheiro bem gasto é dinheiro gasto com comida!</div>
                        </div>';
                    } else {
                        while ($pedido = mysqli_fetch_assoc($query_pedidos)) { // enquanto houver pedidos do usuário
                            $id_pedido = $pedido['id_pedido'];
                ?>
                <div class="pedido">
                    <h2>Pedido #<?php echo $id_pedido; ?></h2>
                    <p style="margin-bottom: 30px; font-size: 11pt;">Status: <span style="margin: 0 5px 0 13px;">
                        <?php
                            if ($pedido['concluido'] == 0) {
                                echo 'Em andamento</span>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#AACA51"/>
                                        <circle cx="4.0001" cy="3.99998" r="2.4" fill="#B5E05A"/>
                                    </svg>';

                            }
                            if ($pedido['concluido'] == 1) {
                                echo 'Finalizado</span>
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 0C2.01477 0 0 2.01477 0 4.5C0 6.98523 2.01477 9 4.5 9C6.98523 9 9 6.98523 9 4.5C9 2.01477 6.98523 0 4.5 0ZM6.45055 3.73909C6.48646 3.69804 6.51381 3.65021 6.53097 3.59843C6.54813 3.54665 6.55476 3.49196 6.55047 3.43758C6.54619 3.3832 6.53107 3.33023 6.50601 3.28178C6.48095 3.23333 6.44645 3.19038 6.40454 3.15546C6.36264 3.12054 6.31417 3.09435 6.26199 3.07843C6.20982 3.06252 6.15499 3.0572 6.10072 3.06279C6.04646 3.06838 5.99387 3.08477 5.94603 3.11099C5.8982 3.1372 5.85609 3.17272 5.82218 3.21545L4.06309 5.32595L3.15286 4.41532C3.07571 4.3408 2.97237 4.29956 2.86511 4.3005C2.75785 4.30143 2.65524 4.34445 2.57939 4.4203C2.50354 4.49615 2.46052 4.59876 2.45959 4.70602C2.45866 4.81328 2.49989 4.91662 2.57441 4.99377L3.80168 6.22105C3.84188 6.26122 3.89 6.29257 3.94299 6.31312C3.99597 6.33366 4.05266 6.34294 4.10943 6.34036C4.1662 6.33778 4.22181 6.3234 4.27271 6.29814C4.32362 6.27288 4.3687 6.23729 4.40509 6.19364L6.45055 3.73909Z" fill="#11B521"/>
                                </svg>';
                            }
                        ?>
                    </p>
                    <h2>Produtos:</h2>
                    <?php
                        $sql_produtos = "SELECT observacao_pedido, quantidade_produto, cardapio.nome_produto FROM itens_pedido
                        INNER JOIN cardapio ON cardapio.id_cardapio = itens_pedido.id_cardapio
                        WHERE id_pedido = $id_pedido";

                        $query_produtos = mysqli_query($conn, $sql_produtos);

                        while ($produtos = mysqli_fetch_assoc($query_produtos)) { // exibe cada produto do pedido
                            echo '<div class="pedido-produtos">
                                <b style="width: 18px;">' . $produtos['quantidade_produto'] . '</b>
                                <div>
                                    <p>' . $produtos['nome_produto'] . '</p>
                                    <p class="observacao">' . $produtos['observacao_pedido'] . '</p>
                                </div>
                            </div>';
                        }

                    ?>
                    <b>Horário do pedido: </b><span id="horario"><?php echo $pedido['hora_pedido']?></span><br>
                    <?php
                        if (!is_null($pedido['hora_entrega'])) { // se houver a hora da entrega no banco
                            echo '<b>Horário da entrega: </b><span id="horario">' . $pedido['hora_entrega']. '</span>';
                        }
                    ?>
                    <div class="linha-pedido"></div>
                    <h3>Valor do pedido: <span class="valor_dinheiro" style="color: #124A15;">R$ <?php echo number_format($pedido['custo_pedido'], 2); ?></span>
                        <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
                        </svg>
                    </h3>
                    <h3>Troco do usuário: <span class="valor_dinheiro" style="color: #124A15;">R$ <?php echo number_format($pedido['troco_usuario'], 2); ?></span>
                        <svg width="18" height="17" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.1281 0.578802C10.2956 0.62554 9.55579 0.857139 8.87367 1.20192C6.70821 2.29622 5.12014 4.53243 2.95477 5.62692C2.41172 5.90141 1.83273 6.10394 1.19896 6.19896C1.12778 6.20965 1.06178 6.23105 1.00201 6.26126C0.699453 6.41419 0.558338 6.79176 0.729486 7.13037L3.66613 12.9403C3.78304 13.1716 4.02094 13.3266 4.27003 13.3124C5.10267 13.2658 5.84243 13.0342 6.52455 12.6895C8.68992 11.595 10.2782 9.35866 12.4435 8.26417C12.9866 7.98968 13.5656 7.78716 14.1993 7.69214C14.2705 7.68145 14.3365 7.66004 14.3963 7.62983C14.6988 7.4769 14.84 7.09933 14.6688 6.76073L11.7323 0.950979C11.6151 0.719594 11.3773 0.564819 11.1281 0.578802ZM1.77152 7.09592C2.17189 7.00943 2.56449 6.86915 2.95682 6.70212C3.12548 7.29258 2.87624 7.92783 2.33125 8.2033L1.77152 7.09592ZM4.40956 12.3151L3.96729 11.4401C4.57153 11.1347 5.31285 11.3869 5.65567 11.9984C5.24283 12.1654 4.83093 12.2702 4.40956 12.3151ZM8.58771 8.70372C7.81084 9.09639 6.78336 8.62733 6.29268 7.65657C5.80192 6.68562 6.03381 5.58024 6.81051 5.18765C7.58721 4.79507 8.61477 5.26386 9.10553 6.2348C9.59639 7.20593 9.36423 8.31122 8.58771 8.70372ZM13.6267 6.79545C13.2781 6.87074 12.9355 6.98733 12.5936 7.12358C12.4554 6.59382 12.6524 6.03902 13.0924 5.73843L13.6267 6.79545ZM11.4412 2.47161C10.862 2.67449 10.2018 2.4152 9.89032 1.84038C10.2539 1.70649 10.6176 1.616 10.9887 1.57629L11.4412 2.47161Z" fill="#124A15"/>
                        </svg>
                    </h3>
                </div>
                <?php }}?>
            </div>
        </main>
        <script src="../scripts/dinheiro.js"></script>
        <script>
            let navButton = document.querySelectorAll('nav #list a')
            navButton[2].innerHTML = `<div>
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.63987 11.48C4.6868 10.8953 4.95225 10.3497 5.38336 9.95187C5.81446 9.55406 6.37959 9.33322 6.9662 9.33334H21.0339C21.6205 9.33322 22.1856 9.55406 22.6167 9.95187C23.0478 10.3497 23.3133 10.8953 23.3602 11.48L24.297 23.1467C24.3228 23.4677 24.2818 23.7907 24.1767 24.0951C24.0715 24.3995 23.9045 24.6789 23.6861 24.9156C23.4676 25.1524 23.2026 25.3413 22.9076 25.4705C22.6125 25.5998 22.294 25.6666 21.9719 25.6667H6.0282C5.70611 25.6666 5.38753 25.5998 5.09251 25.4705C4.79749 25.3413 4.53243 25.1524 4.31401 24.9156C4.0956 24.6789 3.92855 24.3995 3.8234 24.0951C3.71825 23.7907 3.67727 23.4677 3.70304 23.1467L4.63987 11.48V11.48Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.6667 12.8333V7.00001C18.6667 5.76233 18.175 4.57535 17.2999 3.70018C16.4247 2.82501 15.2377 2.33334 14 2.33334C12.7624 2.33334 11.5754 2.82501 10.7002 3.70018C9.82504 4.57535 9.33337 5.76233 9.33337 7.00001V12.8333" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Meus pedidos`
            navButton[2].style.color = "black"
        </script>
    </body>
</html>