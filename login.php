<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "meats";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo '<strong>Conexão feita</strong><br>';
    
    $sql = "SELECT email_usuario, senha_usuario FROM usuario WHERE email_usuario = '$email' && senha_usuario = '$senha'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "Você fez login no e-mail: " . $row["email_usuario"] . "<br><a href=\"screens\destaques.html\"><button>Acessar o MEATS</button></a>";
      }
    } else {
      echo "Email ou senha inválidos.<br><a href=\"login.html\"><button>Voltar</button></a>";
    }
    
    mysqli_close($conn);
    
?>