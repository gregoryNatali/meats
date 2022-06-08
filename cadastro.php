<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "meats";

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    $nomeCompleto = $nome . " " . $sobrenome;

    echo "E-mail: $email<br>";
    echo "Nome: $nomeCompleto<br>";
    echo "CPF: $cpf<br>";
    echo "Endereço: $endereco<br>";
    echo "Senha: $senha<br>";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo '<strong>Conexão feita</strong><br>';

    $sql = "INSERT INTO `usuario`
    (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `endereco_usuario`, `numero_cartao`, `cpf_usuario`)
    VALUES (NULL, '$nomeCompleto', '$email', '$senha', '$endereco', NULL, '$cpf')";
    $insert = mysqli_query($conn, $sql);
    
    if (!$insert) {
        echo 'Erro: não foi possível cadastrar o usuário.<br>';
        die('<a href="cadastro.html"><button>Voltar</button></a>');
    }
    echo "O usuário com o e-mail $email foi cadastrado com sucesso.<br>";
    echo "<a href=\"loginscreen.html\"><button>Voltar</button></a>";

    mysqli_close($conn);
    
?>