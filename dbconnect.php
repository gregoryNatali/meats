<?php

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "meats";

    // cria a conexão
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // verifica a conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>