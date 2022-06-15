<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-cadastro.css">
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
    <style>
        h1 {
            font-size: 14pt;
            margin: 30px 30px 60px 30px;
            font-weight: 400;
        }
        button {
            margin: 0;
            outline: none;
        }
    </style>
    <title>Sucesso</title>
</head>
<body>
    <?php
        require_once('../dbconnect.php');

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];
        $nomeCompleto = $nome . " " . $sobrenome;

        
        $sql = "INSERT INTO `usuario`
        (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `endereco_usuario`, `numero_cartao`, `cpf_usuario`)
        VALUES (NULL, '$nomeCompleto', '$email', '$senha', '$endereco', NULL, '$cpf')";
        $insert = mysqli_query($conn, $sql);
        
        if (!$insert) {
            echo '<h1>Erro: não foi possível cadastrar o usuário.</h1>';
            die('<a href="cadastro.html"><button>Voltar</button></a>');
        }
        
        echo "<h1>O usuário com o email <strong>$email</strong> foi cadastrado com sucesso.</h1>";
        echo '<a href="index.html"><button>Voltar</button></a>';

        mysqli_close($conn);  
    ?>
</body>
</html>