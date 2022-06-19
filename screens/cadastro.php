<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-cadastro.css">
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <a href="index.html" id="back">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 5L9 10L14 15L13 17L6 10L13 3L14 5Z" fill="black"/>
        </svg>
    </a>
    <form class="input-wrapper" method="post">
        <div>
            <label for="email-input">Insira seu E-mail</label>
            <input id="email-input" name="email" type="email" required placeholder="nome@exemplo.com">
        </div>
        <div>
            <label for="name-input">Insira seu nome</label>
            <input id="name-input" name="nome" required placeholder="Nome">
        </div>
        <div>
            <label for="last-name-input">Insira seu sobrenome</label>
            <input id="surname-input" name="sobrenome" required placeholder="Sobrenome">
        </div>
        <div>
            <label for="cpf-input">Insira seu CPF</label>
            <input id="cpf-input" name="cpf" type="number" max="99999999999"required placeholder="CPF">
        </div>
        <div>
            <label for="address-input">Insira seu endereço</label>
            <input id="address-input" name="endereco" required placeholder="Endereço">
        </div>
        <div>
            <label for="password-input">Insira sua senha</label>
            <input id="password-input" name="senha" type="password" required placeholder="Senha">
        </div>
        <div>
            <label for="verify-password-input">Confirme sua senha</label>
            <input id="verify-password-input" name="verificarSenha" type="password" required placeholder="Confirme sua senha">
        </div>
        <button id="register-button" name="submit-button" type="submit">Cadastrar</button>
        <small id="form-text"></small>
    </form>
    <script src="register.js"></script>
    <?php
        require_once('../dbconnect.php');

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $endereco = $_POST['endereco'];
            $senha = $_POST['senha'];
            $nome_completo = $nome . " " . $sobrenome;
            
            $verify_already_exists = "SELECT `email_usuario` FROM `usuario` WHERE `email_usuario` = '$email'";
            $verification = mysqli_query($conn, $verify_already_exists);

            if (mysqli_num_rows($verification) > 0) {
                echo "<script>
                document.querySelector('#form-text').textContent = 'Já existe um usuário cadastrado com esse e-mail'
                document.querySelector('#email-input').value = '$email'
                document.querySelector('#name-input').value = '$nome'
                document.querySelector('#surname-input').value = '$sobrenome'
                document.querySelector('#cpf-input').value = $cpf
                document.querySelector('#address-input').value = '$endereco'
                </script>";
            } else {    
                $insertsql = "INSERT INTO `usuario`
                (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `endereco_usuario`, `numero_cartao`, `cpf_usuario`)
                VALUES (NULL, '$nome_completo', '$email', '$senha', '$endereco', NULL, '$cpf')";
                $insert = mysqli_query($conn, $insertsql);
                
                echo "<script>
                document.querySelector('body').innerHTML = ''
                document.querySelector('head').innerHTML += '<style>h1 {font-size: 14pt;margin: 30px 30px 60px 30px;font-weight: 400;}button {margin: 0;outline: none;}</style>'
                </script>";
                
                if (!$insert) {
                    echo '<h1>Erro: não foi possível cadastrar o usuário.</h1>';
                    die('<a href="cadastro.html"><button>Voltar</button></a>');
                }
                
                echo "<h1>O usuário com o email <strong>$email</strong> foi cadastrado com sucesso.</h1>";
                echo '<a href="index.html"><button>Voltar</button></a>';
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>