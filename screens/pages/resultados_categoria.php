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
            #resultados h2 {
                font-family: 'Poppins', sans-serif; 
                font-size: 12pt;
                margin-bottom: 10px;
                text-align: left;
            }
            #resultados h3 {
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 11pt;
                margin-bottom: 15px;
                text-align: left;
            }
            button {
                border: none;
                background-color: transparent;
            }
            .categorias {
                display: flex;
                align-items: center;
                margin-top: 2rem;
            }
            #categoria {
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
                font-size: 18pt;
                margin-left: 15px;
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
            <?php

                if (!isset($_GET['categoria'])) {
                    echo "<script>window.location = 'categorias.php'</script>";
                }

                $id_categoria = $_GET['categoria'];

                $sql_produto = "SELECT * FROM cardapio
                INNER JOIN categoria ON cardapio.id_categoria = categoria.id_categoria
                WHERE categoria.id_categoria = $id_categoria ORDER BY nome_produto ASC";

                $results_produto = mysqli_query($conn, $sql_produto);
                
            ?>
            <!--Categoria + retângulo-->
            <div>
                <div class="categorias">
                    <a href="categorias.php" id="voltar-pesquisa">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 5L9 10L14 15L13 17L6 10L13 3L14 5Z" fill="black"/>
                        </svg>
                    </a>
                    <p id="categoria"><?php echo mysqli_fetch_assoc($results_produto)['nome_categoria']?></p>
                </div>
                <div class="retangulo"></div>
            </div>
            <div id="resultados">
                <?php

                    $results_produto = mysqli_query($conn, $sql_produto); // reinicia a consulta

                    if (mysqli_num_rows($results_produto) > 0) {
                        echo "<form action=\"produto.php\" method=\"post\" style=\"margin-bottom: 15vh;\">";
                        while($linha = mysqli_fetch_assoc($results_produto)) { // enquanto tiver resultados, imprima-os no documento
                            echo "<button value=" . $linha["id_cardapio"] . " name=\"produto\"><h3>". $linha["nome_produto"]. "</h3></button><br>";
                        }
                        echo "</form>";
                    } else {
                        echo "<p>Nenhum produto encontrado</p>";
                    }
                    
                ?>
            </div>

        </main>

    </body>
</html>