<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login-cadastro.css">
    <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <h1>Faça login</h1>
    <a href="index.html" id="back">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 5L9 10L14 15L13 17L6 10L13 3L14 5Z" fill="black"/>
        </svg>
    </a>
    <form class="form-wrapper" action="" method="post">
        <div>
          <label for="email-input">Insira seu E-mail
            <div class="input-wrapper">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6667 16.6667H3.33335C2.89133 16.6667 2.4674 16.4911 2.15484 16.1786C1.84228 15.866 1.66669 15.4421 1.66669 15V4.92754C1.68538 4.4982 1.86919 4.09267 2.17975 3.79562C2.49031 3.49858 2.90361 3.33297 3.33335 3.33337H16.6667C17.1087 3.33337 17.5326 3.50897 17.8452 3.82153C18.1578 4.13409 18.3334 4.55801 18.3334 5.00004V15C18.3334 15.4421 18.1578 15.866 17.8452 16.1786C17.5326 16.4911 17.1087 16.6667 16.6667 16.6667ZM3.33335 6.55671V15H16.6667V6.55671L10 11L3.33335 6.55671ZM4.00002 5.00004L10 9.00004L16 5.00004H4.00002Z" fill="#FF0000"/>
              </svg>
              <input id="email-input" name="email" required placeholder="nome@exemplo.com">
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
              <input id="password-input" type="password" name="senha" required placeholder="Senha">
            </div>
          </label>
        </div>
        <button id="login-button" name="submit-button" type="submit">Login</button>
        <small id="form-text"></small>
    </form>
    <?php
        require_once('../../dbconnect.php');

        if(isset($_POST['submit-button'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $sql = "SELECT `id_usuario`, `email_usuario`, `senha_usuario` FROM `usuario` WHERE `email_usuario` = '$email' && `senha_usuario` = '$senha'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) { // caso o login seja sucedido, redirecione
              session_start();
              $_SESSION['user'] = mysqli_fetch_assoc($result)['id_usuario']; // guarda a sessão com o id do usuário
              header("Location: inicio.php");
            } else {
              echo "<script>document.querySelector('#form-text').textContent = 'E-mail ou senha inválidos'
              document.querySelector('#email-input').value = '$email'</script>";
            }
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>

