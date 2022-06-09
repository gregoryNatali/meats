<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="screens/logo.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <h1>Faça login</h1>
    <a href="loginscreen.html" id="back">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 5L9 10L14 15L13 17L6 10L13 3L14 5Z" fill="black"/>
        </svg>
    </a>
    <form class="input-wrapper" action="" method="post">
        <div>
          <label for="email-input">Insira seu E-mail</label>
          <input id="email-input" name="email" required placeholder="nome@exemplo.com">
        </div>
        <div>
          <label for="password-input">Insira sua senha</label>
          <input id="password-input" type="password" name="senha" required placeholder="Senha">
        </div>
        <button id="login-button" name="submit-button" type="submit">Login</button>
        <small id="form-text"></small>
    </form>
    <?php
        require_once('dbconnect.php');

        if(isset($_POST['submit-button'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $sql = "SELECT email_usuario, senha_usuario FROM usuario WHERE email_usuario = '$email' && senha_usuario = '$senha'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) { // caso o login seja sucedido, redirecione
              header("Location: screens/destaques.html");
            } else {
              echo "<script>document.querySelector('#form-text').innerText = 'E-mail ou senha inválidos'</script>";
            }
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>

