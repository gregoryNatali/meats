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
        <title>Categorias</title>
        <style>
            #resultados {
                width: 80%;
                margin: 30px auto 0 7%;
            }
            #resultados h3 {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 11pt;
                margin-bottom: 15px;
                text-align: left;
            }
            #resultados h2 {
                font-family: 'Poppins', sans-serif;
                font-size: 12pt;
                margin-bottom: 10px;
                text-align: left;
            }
            button {
                border: none;
                background-color: transparent;
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
            <!--Barra de pesquisa + filtro-->
            <div id="pesquisa_filtro">
                <label for="input_pesquisa">
                    <div class="barra_pesquisa">
                        <svg class="search_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 22.7448L17.296 16.0408C18.907 14.1067 19.7104 11.626 19.5389 9.11474C19.3675 6.60346 18.2345 4.25494 16.3756 2.55775C14.5168 0.86055 12.0751 -0.0546525 9.55864 0.00252659C7.04217 0.0597056 4.64462 1.08486 2.86474 2.86474C1.08486 4.64462 0.0597056 7.04217 0.00252659 9.55864C-0.0546525 12.0751 0.86055 14.5168 2.55775 16.3756C4.25494 18.2345 6.60346 19.3675 9.11474 19.5389C11.626 19.7104 14.1067 18.907 16.0408 17.296L22.7448 24L24 22.7448ZM1.80717 9.79659C1.80717 8.21643 2.27574 6.67176 3.15363 5.35791C4.03152 4.04405 5.2793 3.02003 6.73917 2.41533C8.19905 1.81063 9.80545 1.65241 11.3552 1.96069C12.905 2.26896 14.3286 3.02988 15.446 4.14722C16.5633 5.26456 17.3242 6.68814 17.6325 8.23793C17.9408 9.78773 17.7826 11.3941 17.1779 12.854C16.5732 14.3139 15.5491 15.5617 14.2353 16.4395C12.9214 17.3174 11.3767 17.786 9.79659 17.786C7.67838 17.7837 5.64761 16.9412 4.14981 15.4434C2.65202 13.9456 1.80952 11.9148 1.80717 9.79659Z" fill="black" />
                        </svg>
                        <form action="pesquisa.php" method="get">
                            <input id="input_pesquisa" type="text" name="search" placeholder="Itens ou categoria">
                        </form>
                    </div>
                </label>
                <svg style="margin-left: 25px; min-width: 34px" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.125 22.9688C13.125 22.6787 13.2402 22.4005 13.4454 22.1954C13.6505 21.9902 13.9287 21.875 14.2188 21.875H20.7812C21.0713 21.875 21.3495 21.9902 21.5546 22.1954C21.7598 22.4005 21.875 22.6787 21.875 22.9688C21.875 23.2588 21.7598 23.537 21.5546 23.7421C21.3495 23.9473 21.0713 24.0625 20.7812 24.0625H14.2188C13.9287 24.0625 13.6505 23.9473 13.4454 23.7421C13.2402 23.537 13.125 23.2588 13.125 22.9688ZM8.75 16.4062C8.75 16.1162 8.86523 15.838 9.07035 15.6329C9.27547 15.4277 9.55367 15.3125 9.84375 15.3125H25.1562C25.4463 15.3125 25.7245 15.4277 25.9296 15.6329C26.1348 15.838 26.25 16.1162 26.25 16.4062C26.25 16.6963 26.1348 16.9745 25.9296 17.1796C25.7245 17.3848 25.4463 17.5 25.1562 17.5H9.84375C9.55367 17.5 9.27547 17.3848 9.07035 17.1796C8.86523 16.9745 8.75 16.6963 8.75 16.4062ZM4.375 9.84375C4.375 9.55367 4.49023 9.27547 4.69535 9.07035C4.90047 8.86523 5.17867 8.75 5.46875 8.75H29.5312C29.8213 8.75 30.0995 8.86523 30.3046 9.07035C30.5098 9.27547 30.625 9.55367 30.625 9.84375C30.625 10.1338 30.5098 10.412 30.3046 10.6171C30.0995 10.8223 29.8213 10.9375 29.5312 10.9375H5.46875C5.17867 10.9375 4.90047 10.8223 4.69535 10.6171C4.49023 10.412 4.375 10.1338 4.375 9.84375Z" fill="black" />
                </svg>
            </div>
            <?php
                $query = '';
                
                if (isset($_GET['search'])) {
                    $query = $_GET['search'];
                }

                echo "<script>document.querySelector('#input_pesquisa').value = '$query'</script>";

                $query = trim($query);
            ?>
            <!--"Categorias" + retângulo-->
            <div>
                <p class="categorias">Resultados</p>
                <div class="retangulo"></div>
            </div>
            <div id="resultados">
                <?php
                    $sql_categoria = "SELECT * FROM categoria WHERE nome_categoria LIKE '%$query%' ORDER BY nome_categoria ASC";
                    $sql_produto = "SELECT * FROM cardapio WHERE nome_produto LIKE '%$query%' OR descricao_produto LIKE '%$query%' ORDER BY nome_produto ASC";
                    
                    $results_categoria = mysqli_query($conn, $sql_categoria);
                    $results_produto = mysqli_query($conn, $sql_produto);
                    
                    if ($query != '') {
                        if (mysqli_num_rows($results_categoria) > 0) {
                            echo "<form action=\"categoria.php\" method=\"get\"><h2>Categorias</h2>";
                            while($linha = mysqli_fetch_assoc($results_categoria)) { // enquanto tiver resultados, imprima-os no documento
                                echo "<button value=" . $linha["id_categoria"] . " name=\"categoria\"><h3>". $linha["nome_categoria"]. "</h3></button><br>";
                            }
                            echo "</form>";
                        }
    
                        if (mysqli_num_rows($results_produto) > 0) {
                            echo "<form action=\"produto.php\" method=\"post\" style=\"margin-bottom: 15vh;\"><h2>Produtos</h2>";
                            while($linha = mysqli_fetch_assoc($results_produto)) { // enquanto tiver resultados, imprima-os no documento
                                echo "<button value=" . $linha["id_cardapio"] . " name=\"produto\"><h3>". $linha["nome_produto"]. "</h3></button><br>";
                            }
                            echo "</form>";
                        }
    
                        if (mysqli_num_rows($results_categoria) == 0 && mysqli_num_rows($results_produto) == 0) {
                            echo "<h3>Nenhum resultado encontrado</h3>";
                        }
                    } else {
                        echo "<h3>Pesquise algum item ou categoria para ver os resultados!</h3>";
                    }
                    
                ?>
            </div>

        </main>
        <script>
            const inputBar = document.querySelector('#input_pesquisa')
            inputBar.focus() // mantém o usuário escrevendo
            inputBar.addEventListener('keydown', (e) => {
                switch (e.key) {
                    case 'Escape':
                    case 'Tab':
                    case 'Control':
                        return
                }
                setTimeout(() => {
                    document.querySelector('form').submit() // após um tempo do usuário digitar, redireciona para o php
                }, 2000);
            })
        </script>

    </body>
</html>