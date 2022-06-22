<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login-cadastro.css">
    <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <a href="index.html" id="back">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 5L9 10L14 15L13 17L6 10L13 3L14 5Z" fill="black"/>
        </svg>
    </a>
    <form class="form-wrapper" method="post">
        <div>
            <label for="email-input">Insira seu E-mail
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.6667 16.6667H3.33335C2.89133 16.6667 2.4674 16.4911 2.15484 16.1785C1.84228 15.8659 1.66669 15.442 1.66669 15V4.9275C1.68538 4.49815 1.86919 4.09263 2.17975 3.79558C2.49031 3.49853 2.90361 3.33292 3.33335 3.33333H16.6667C17.1087 3.33333 17.5326 3.50892 17.8452 3.82148C18.1578 4.13404 18.3334 4.55797 18.3334 5V15C18.3334 15.442 18.1578 15.8659 17.8452 16.1785C17.5326 16.4911 17.1087 16.6667 16.6667 16.6667ZM3.33335 6.55666V15H16.6667V6.55666L10 11L3.33335 6.55666ZM4.00002 5L10 9L16 5H4.00002Z" fill="#FF0000"/>
                    </svg>
                    <input id="email-input" name="email" type="email" required placeholder="nome@exemplo.com">
                </div>
            </label>
        </div>
        <div>
            <label for="name-input">Insira seu nome
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99998 10C12.092 10 13.7879 8.30411 13.7879 6.21213C13.7879 4.12014 12.092 2.42425 9.99998 2.42425C7.90799 2.42425 6.2121 4.12014 6.2121 6.21213C6.2121 8.30411 7.90799 10 9.99998 10Z" stroke="#FF0000" stroke-width="2"/>
                        <path d="M13.7879 11.5152H14.0545C14.6084 11.5153 15.1431 11.7177 15.5583 12.0843C15.9734 12.4509 16.2404 12.9565 16.3091 13.5061L16.6053 15.8727C16.6319 16.0859 16.6129 16.3024 16.5495 16.5077C16.4861 16.713 16.3798 16.9024 16.2376 17.0635C16.0954 17.2245 15.9205 17.3535 15.7247 17.4418C15.5288 17.5302 15.3164 17.5758 15.1015 17.5758H4.89848C4.68362 17.5758 4.4712 17.5302 4.27533 17.4418C4.07946 17.3535 3.90461 17.2245 3.7624 17.0635C3.62018 16.9024 3.51385 16.713 3.45045 16.5077C3.38705 16.3024 3.36805 16.0859 3.39469 15.8727L3.69014 13.5061C3.75885 12.9562 4.02606 12.4504 4.44153 12.0838C4.857 11.7172 5.3921 11.5149 5.9462 11.5152H6.21211" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="name-input" name="nome" required placeholder="Nome">
                </div>
            </label>
        </div>
        <div>
            <label for="surname-input">Insira seu sobrenome
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99998 10C12.092 10 13.7879 8.30411 13.7879 6.21213C13.7879 4.12014 12.092 2.42425 9.99998 2.42425C7.90799 2.42425 6.2121 4.12014 6.2121 6.21213C6.2121 8.30411 7.90799 10 9.99998 10Z" stroke="#FF0000" stroke-width="2"/>
                        <path d="M13.7879 11.5152H14.0545C14.6084 11.5153 15.1431 11.7177 15.5583 12.0843C15.9734 12.4509 16.2404 12.9565 16.3091 13.5061L16.6053 15.8727C16.6319 16.0859 16.6129 16.3024 16.5495 16.5077C16.4861 16.713 16.3798 16.9024 16.2376 17.0635C16.0954 17.2245 15.9205 17.3535 15.7247 17.4418C15.5288 17.5302 15.3164 17.5758 15.1015 17.5758H4.89848C4.68362 17.5758 4.4712 17.5302 4.27533 17.4418C4.07946 17.3535 3.90461 17.2245 3.7624 17.0635C3.62018 16.9024 3.51385 16.713 3.45045 16.5077C3.38705 16.3024 3.36805 16.0859 3.39469 15.8727L3.69014 13.5061C3.75885 12.9562 4.02606 12.4504 4.44153 12.0838C4.857 11.7172 5.3921 11.5149 5.9462 11.5152H6.21211" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="surname-input" name="sobrenome" required placeholder="Sobrenome">
                </div>
            </label>
        </div>
        <div>
            <label for="cpf-input">Insira seu CPF
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0625 5.8125L11.6875 1.4375C11.5625 1.3125 11.4375 1.25 11.25 1.25H5C4.3125 1.25 3.75 1.8125 3.75 2.5V17.5C3.75 18.1875 4.3125 18.75 5 18.75H15C15.6875 18.75 16.25 18.1875 16.25 17.5V6.25C16.25 6.0625 16.1875 5.9375 16.0625 5.8125ZM11.25 2.75L14.75 6.25H11.25V2.75ZM15 17.5H5V2.5H10V6.25C10 6.9375 10.5625 7.5 11.25 7.5H15V17.5Z" fill="#FF0000"/>
                        <path d="M6.25 13.75H13.75V15H6.25V13.75ZM6.25 10H13.75V11.25H6.25V10Z" fill="#FF0000"/>
                    </svg>
                    <input id="cpf-input" name="cpf" type="number" required placeholder="CPF">
                </div>
            </label>
        </div>
        <div>
            <label for="address-input">Insira seu endereço
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.75 9.0445L2.5 9.42325L9.4225 2.5L9.0445 4.75L4.75 9.0445ZM10 13.6608L9.4225 15.1923L15.1923 9.42325L13.6608 10L10 13.6608ZM12.3077 12.3077L16.75 16.75L12.3077 12.3077ZM3.6535 8.269L8.269 3.6535L8.446 3.90925C10.0542 6.23204 11.909 8.37401 13.978 10.2978L14.1542 10.4612L10.4612 14.1535L10.2978 13.978C8.37424 11.909 6.23253 10.0542 3.91 8.446L3.655 8.269H3.6535Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="address-input" name="endereco" required placeholder="Endereço">
                </div>
            </label>
        </div>
        <div>
            <label for="password-input">Insira sua senha
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 2.1875C11.6847 2.18752 10.8803 2.37519 10.1492 2.73598C9.41809 3.09677 8.77982 3.621 8.28382 4.26807C7.78782 4.91514 7.44741 5.66769 7.28894 6.46744C7.13048 7.26719 7.15821 8.09269 7.37 8.88L2.1875 14.0625V17.8125H5.9375V15.9375H7.8125V14.0625H9.6875L11.125 12.625C11.5737 12.7475 12.035 12.81 12.5 12.8125C13.909 12.8125 15.2602 12.2528 16.2565 11.2565C17.2528 10.2602 17.8125 8.90896 17.8125 7.5C17.8125 6.09104 17.2528 4.73978 16.2565 3.7435C15.2602 2.74721 13.909 2.1875 12.5 2.1875V2.1875Z" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.4375 7.1875C13.7827 7.1875 14.0625 6.90768 14.0625 6.5625C14.0625 6.21732 13.7827 5.9375 13.4375 5.9375C13.0923 5.9375 12.8125 6.21732 12.8125 6.5625C12.8125 6.90768 13.0923 7.1875 13.4375 7.1875Z" fill="#FF0000" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="password-input" name="senha" type="password" required placeholder="Senha">
                </div>
            </label>
        </div>
        <div>
            <label for="verify-password-input">Confirme sua senha
                <div class="input-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 2.1875C11.6847 2.18752 10.8803 2.37519 10.1492 2.73598C9.41809 3.09677 8.77982 3.621 8.28382 4.26807C7.78782 4.91514 7.44741 5.66769 7.28894 6.46744C7.13048 7.26719 7.15821 8.09269 7.37 8.88L2.1875 14.0625V17.8125H5.9375V15.9375H7.8125V14.0625H9.6875L11.125 12.625C11.5737 12.7475 12.035 12.81 12.5 12.8125C13.909 12.8125 15.2602 12.2528 16.2565 11.2565C17.2528 10.2602 17.8125 8.90896 17.8125 7.5C17.8125 6.09104 17.2528 4.73978 16.2565 3.7435C15.2602 2.74721 13.909 2.1875 12.5 2.1875V2.1875Z" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.4375 7.1875C13.7827 7.1875 14.0625 6.90768 14.0625 6.5625C14.0625 6.21732 13.7827 5.9375 13.4375 5.9375C13.0923 5.9375 12.8125 6.21732 12.8125 6.5625C12.8125 6.90768 13.0923 7.1875 13.4375 7.1875Z" fill="#FF0000" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="verify-password-input" name="verificarSenha" type="password" required placeholder="Confirme sua senha">
                </div>
            </label>
        </div>
        <button id="register-button" name="submit-button" type="submit">Cadastrar</button>
        <small id="form-text"></small>
    </form>
    <script src="../scripts/register.js"></script>
    <?php
        require_once('../../dbconnect.php');

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
                    die('<a href="cadastro.php"><button>Voltar</button></a>');
                }
                
                echo "<h1>O usuário com o email <strong>$email</strong> foi cadastrado com sucesso.</h1>";
                echo '<a href="index.html"><button>Voltar</button></a>';
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>