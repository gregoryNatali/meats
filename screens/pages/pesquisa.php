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
            #resultados p {
                font-family: 'Poppins', sans-serif;
                font-size: 11pt;
                margin-bottom: 15px;
            }
            #resultados h2 {
                font-family: 'Poppins', sans-serif;
                position: relative;
                font-size: 12pt;
                margin-bottom: 10px
            }
        </style>
    </head>
    <body>
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
                require_once('../../dbconnect.php');
                $query = $_GET['search'];

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
                    $sql_produto = "SELECT * FROM cardapio WHERE nome_produto LIKE '%$query%' ORDER BY nome_produto ASC";
                    
                    $results_categoria = mysqli_query($conn, $sql_categoria);
                    $results_produto = mysqli_query($conn, $sql_produto);
                    
                    if ($query != '') {
                        if (mysqli_num_rows($results_categoria) > 0) {
                            echo "<h2>Categorias</h2>";
                            while($linha = mysqli_fetch_assoc($results_categoria)) { // enquanto tiver resultados, imprima-os no documento
                                echo "<p>". $linha["nome_categoria"]. " </p>";
                            }
                        }
    
                        if (mysqli_num_rows($results_produto) > 0) {
                            echo "<h2>Produtos</h2>";
                            while($linha = mysqli_fetch_assoc($results_produto)) { // enquanto tiver resultados, imprima-os no documento
                                echo "<p>". $linha["nome_produto"]. " </p>";
                            }
                        }
    
                        if (mysqli_num_rows($results_categoria) == 0 && mysqli_num_rows($results_produto) == 0) {
                            echo "<p>Nenhum resultado encontrado</p>";
                        }
                    } else {
                        echo "<p>Pesquise algum item ou categoria para ver os resultados!</p>";
                    }
                    
                ?>
            </div>

        </main>
        <!--Barra de navegação-->
        <nav>
            <div id="list">
                <li>
                    <a href="inicio.php">
                        <div>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.6371 14.4536L15.0385 0.443421C14.508 -0.147807 13.4889 -0.147807 12.9583 0.443421L0.359737 14.4536C0.178396 14.6548 0.0593652 14.9043 0.0171174 15.172C-0.0251305 15.4396 0.011225 15.7137 0.121764 15.9611C0.345739 16.4668 0.846883 16.7919 1.39982 16.7919H4.19951V26.599C4.19951 26.9706 4.34699 27.3269 4.60951 27.5897C4.87203 27.8524 5.22809 28 5.59935 28H9.79888C10.1701 28 10.5262 27.8524 10.7887 27.5897C11.0512 27.3269 11.1987 26.9706 11.1987 26.599V20.9949H16.7981V26.599C16.7981 26.9706 16.9456 27.3269 17.2081 27.5897C17.4706 27.8524 17.8267 28 18.1979 28H22.3975C22.7687 28 23.1248 27.8524 23.3873 27.5897C23.6498 27.3269 23.7973 26.9706 23.7973 26.599V16.7919H26.597C26.8681 16.793 27.1337 16.7152 27.3614 16.5679C27.589 16.4206 27.769 16.2102 27.8792 15.9623C27.9895 15.7144 28.0253 15.4398 27.9823 15.1719C27.9393 14.904 27.8194 14.6544 27.6371 14.4536V14.4536Z"fill="#494949" />
                            </svg>
                        </div>
                        Início
                    </a>
                </li>
                <li>
                    <!--Tela atual, por isso o color: black-->
                    <a href="categorias.html" style="color: black;">
                        <div>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.5 24.5L19.2664 19.257L24.5 24.5ZM22.1667 12.25C22.1667 14.8801 21.1219 17.4024 19.2622 19.2622C17.4024 21.1219 14.8801 22.1667 12.25 22.1667C9.61998 22.1667 7.09763 21.1219 5.2379 19.2622C3.37816 17.4024 2.33337 14.8801 2.33337 12.25C2.33337 9.61995 3.37816 7.0976 5.2379 5.23787C7.09763 3.37813 9.61998 2.33334 12.25 2.33334C14.8801 2.33334 17.4024 3.37813 19.2622 5.23787C21.1219 7.0976 22.1667 9.61995 22.1667 12.25V12.25Z" stroke="black"  stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        Busca
                    </a>
                </li>
                <li>
                    <a href="pedidos.html">
                        <div>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.63987 11.48C4.6868 10.8953 4.95225 10.3497 5.38336 9.95187C5.81446 9.55406 6.37959 9.33322 6.9662 9.33334H21.0339C21.6205 9.33322 22.1856 9.55406 22.6167 9.95187C23.0478 10.3497 23.3133 10.8953 23.3602 11.48L24.297 23.1467C24.3228 23.4677 24.2818 23.7907 24.1767 24.0951C24.0715 24.3995 23.9045 24.6789 23.6861 24.9156C23.4676 25.1524 23.2026 25.3413 22.9076 25.4705C22.6125 25.5998 22.294 25.6666 21.9719 25.6667H6.0282C5.70611 25.6666 5.38753 25.5998 5.09251 25.4705C4.79749 25.3413 4.53243 25.1524 4.31401 24.9156C4.0956 24.6789 3.92855 24.3995 3.8234 24.0951C3.71825 23.7907 3.67727 23.4677 3.70304 23.1467L4.63987 11.48V11.48Z" stroke="#494949" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.6667 12.8333V7.00001C18.6667 5.76233 18.175 4.57535 17.2999 3.70018C16.4247 2.82501 15.2377 2.33334 14 2.33334C12.7624 2.33334 11.5754 2.82501 10.7002 3.70018C9.82504 4.57535 9.33337 5.76233 9.33337 7.00001V12.8333" stroke="#494949" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        Meus pedidos
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <div>
                            <svg width="27" height="28" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 2.33334C7.28663 2.33334 2.25 7.55651 2.25 14C2.25 20.4435 7.28663 25.6667 13.5 25.6667C19.7134 25.6667 24.75 20.4435 24.75 14C24.75 7.55651 19.7134 2.33334 13.5 2.33334Z" stroke="#494949" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.80493 21.4037C4.80493 21.4037 7.31256 18.0833 13.5001 18.0833C19.6876 18.0833 22.1963 21.4037 22.1963 21.4037" stroke="#494949" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.5 14C14.3951 14 15.2536 13.6313 15.8865 12.9749C16.5194 12.3185 16.875 11.4283 16.875 10.5C16.875 9.57174 16.5194 8.6815 15.8865 8.02513C15.2536 7.36875 14.3951 7 13.5 7C12.6049 7 11.7464 7.36875 11.1135 8.02513C10.4806 8.6815 10.125 9.57174 10.125 10.5C10.125 11.4283 10.4806 12.3185 11.1135 12.9749C11.7464 13.6313 12.6049 14 13.5 14V14Z" stroke="#494949" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        Perfil
                    </a>
                </li>
            </div>
        </nav>
        <script>
            const inputBar = document.querySelector('#input_pesquisa')
            inputBar.focus() // mantém o usuário escrevendo
            inputBar.addEventListener('keydown', () => {
                setTimeout(() => {
                    document.querySelector('form').submit() // após um tempo do usuário digitar, redireciona para o php
                }, 2000);
            })
        </script>

    </body>
</html>