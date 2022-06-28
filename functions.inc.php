<?php
    function userIsLogged() {
        session_start();
        if (!isset($_SESSION['user'])) { // caso o usuario não esteja logado, redirecione para o index
            return header("Location: startpage.html");
        }
    }

    function resetCurrentProduct() { // redefine o valor do produto atual e da observação, caso o usuário saia da tela de produto
        if (isset($_SESSION['produto'])) {
            unset($_SESSION['produto']);
        }

        if (isset($_SESSION['observacao'])) {
            unset($_SESSION['observacao']);
        }
    }

    function noProductFallback() { // caso o usuário vá para uma das páginas principais e tenta voltar para a tela de produto/avaliar/obs
        if (!isset($_SESSION['produto'])) {
            echo "<script>window.location = 'index.php'</script>";
            die;
        }
    }

    function fillMenu($conn, $line) {
        $id_cardapio = $line["id_cardapio"];
        echo "<button class=\"produto-wrapper\" value=" . $line["id_cardapio"] . " name='produto'>
            <div class=\"produto-img\" style=\"" . loadProductImage($conn, $id_cardapio) . " background-size: 180%;\"></div>
                <div class=\"info-cardapio\">
                <h3>" . $line["nome_produto"] . "</h3>
                <p>" . $line["descricao_produto"] . "</p>
                    <div class=\"dinheiro\">
                    <span>R$ " . $line["preco_produto"] . "</span>";
        echo '<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_639_38)">
                    <path d="M11.1435 1.03446C10.3883 1.08549 9.71505 1.29996 9.09278 1.61449C7.11732 2.61279 5.65233 4.62063 3.67695 5.61909C3.18154 5.86949 2.65437 6.05627 2.07877 6.14801C2.01412 6.15833 1.95405 6.17812 1.89952 6.20569C1.62351 6.3452 1.4913 6.68277 1.64261 6.98213L4.23887 12.1186C4.34222 12.3231 4.55613 12.4583 4.7821 12.4429C5.53744 12.392 6.21068 12.1775 6.83295 11.863C8.80833 10.8645 10.2735 8.85661 12.2489 7.85815C12.7443 7.60775 13.2714 7.42097 13.847 7.32923C13.9117 7.31891 13.9718 7.29911 14.0263 7.27155C14.3023 7.13204 14.4345 6.79447 14.2832 6.49511L11.687 1.35878C11.5834 1.15421 11.3696 1.01919 11.1435 1.03446V1.03446ZM2.58763 6.93965C2.95156 6.85815 3.30906 6.72888 3.66661 6.5758C3.81281 7.09929 3.57966 7.66737 3.08248 7.91867L2.58763 6.93965ZM4.91989 11.5539L4.52889 10.7803C5.08011 10.5017 5.74929 10.7177 6.05312 11.2579C5.67698 11.4112 5.3024 11.5091 4.91989 11.5539V11.5539ZM8.74847 8.293C8.03976 8.65122 7.11364 8.24549 6.67984 7.38725C6.24596 6.52885 6.46871 5.54262 7.17726 5.18448C7.88581 4.82634 8.81201 5.23183 9.24589 6.09023C9.67986 6.9488 9.45686 7.93494 8.74847 8.293ZM13.3381 6.53783C13.0212 6.60878 12.7093 6.71641 12.3979 6.84152C12.2786 6.3717 12.4634 5.87579 12.8658 5.60333L13.3381 6.53783ZM11.4059 2.71517C10.8785 2.90227 10.283 2.67903 10.0072 2.17108C10.3383 2.04781 10.669 1.96317 11.0058 1.92363L11.4059 2.71517Z" fill="#124A15"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_639_38">
                    <rect width="11.5009" height="9.2881" fill="white" transform="translate(0.73584 5.18808) rotate(-26.8144)"/>
                    </clipPath>
                    </defs>
                    </svg>                  
                </div>
            </div>
        </button>';
    }

    function fillProduct($line) {
        echo '<h1>' . $line['nome_produto'] . '</h1>
              <p>' . $line['descricao_produto'] . '</p>
              <p><b>Peso: </b>' . $line['peso_produto'] . 'g</p>
              <p><b>Categoria: </b>' . $line['nome_categoria'] . '</p>
              <b>Classificação</b>
              <div class="classificacao">    
                  <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.0759 5.86204L10.8608 5.24944L8.97647 1.42943C8.92501 1.32484 8.84034 1.24017 8.73575 1.1887C8.47345 1.05921 8.1547 1.16712 8.02354 1.42943L6.13927 5.24944L1.92413 5.86204C1.80792 5.87864 1.70167 5.93343 1.62032 6.01644C1.52198 6.11752 1.46778 6.25351 1.46965 6.39452C1.47152 6.53554 1.52929 6.67005 1.63028 6.76849L4.67999 9.74183L3.95948 13.9404C3.94258 14.038 3.95339 14.1385 3.99068 14.2303C4.02796 14.3222 4.09024 14.4017 4.17043 14.4599C4.25063 14.5182 4.34555 14.5528 4.44441 14.5599C4.54328 14.5669 4.64214 14.5461 4.72979 14.4998L8.50001 12.5176L12.2702 14.4998C12.3732 14.5546 12.4927 14.5729 12.6072 14.553C12.8961 14.5032 13.0903 14.2292 13.0405 13.9404L12.32 9.74183L15.3697 6.76849C15.4527 6.68714 15.5075 6.58089 15.5241 6.46468C15.569 6.17415 15.3664 5.90521 15.0759 5.86204Z" fill="#D79B00"/>
                  </svg>
                  <span>4.5</span>
              </div>
              <div class="dinheiro">
                  <span>R$ ' . $line['preco_produto'] . '</span>
                  <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_644_63)">
                        <path d="M14.6062 1.48912C13.5418 1.54888 12.596 1.84498 11.7239 2.28579C8.95529 3.68489 6.9249 6.54395 4.15642 7.94328C3.46211 8.29422 2.72186 8.55316 1.91157 8.67465C1.82055 8.68831 1.73618 8.71568 1.65976 8.7543C1.27293 8.94983 1.09251 9.43256 1.31133 9.86548L5.06591 17.2936C5.21538 17.5893 5.51954 17.7875 5.83802 17.7694C6.90256 17.7098 7.84837 17.4137 8.72047 16.9729C11.489 15.5736 13.5196 12.7144 16.288 11.3151C16.9824 10.9641 17.7226 10.7052 18.5329 10.5837C18.6239 10.57 18.7083 10.5427 18.7847 10.5041C19.1715 10.3085 19.352 9.8258 19.1331 9.39288L15.3787 1.96496C15.2289 1.66913 14.9248 1.47124 14.6062 1.48912ZM2.6436 9.82143C3.15548 9.71085 3.65743 9.53151 4.15903 9.31795C4.37468 10.0729 4.05601 10.8851 3.35922 11.2372L2.6436 9.82143ZM6.0164 16.4943L5.45095 15.3756C6.22348 14.9851 7.17129 15.3076 7.60959 16.0893C7.08176 16.3029 6.55514 16.4368 6.0164 16.4943ZM11.3583 11.877C10.365 12.3791 9.05137 11.7794 8.42403 10.5382C7.79657 9.29685 8.09305 7.88359 9.08608 7.38166C10.0791 6.87973 11.3929 7.47909 12.0203 8.72047C12.6479 9.96209 12.3511 11.3752 11.3583 11.877ZM17.8008 9.43728C17.355 9.53354 16.917 9.6826 16.4799 9.8568C16.3032 9.17949 16.5551 8.47016 17.1177 8.08585L17.8008 9.43728ZM15.0065 3.90912C14.266 4.16852 13.422 3.83701 13.0237 3.10208C13.4886 2.9309 13.9536 2.81521 14.428 2.76444L15.0065 3.90912Z" fill="#124A15"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_644_63">
                          <rect width="16.1184" height="13.432" fill="white" transform="translate(0 7.27106) rotate(-26.8144)"/>
                        </clipPath>
                      </defs>
                  </svg>                    
              </div>';
    }

    function loadProductImage($conn, $id) {
        $sql = "SELECT * FROM produto_imagem WHERE id_produto = $id";
        $imagem = mysqli_fetch_assoc(mysqli_query($conn, $sql))['imagem']; // pega o BLOB do banco
        return 'background-image: url(\'data:image/jpeg;base64,' . base64_encode($imagem) . '\');'; // converte em imagem
    }
?>
