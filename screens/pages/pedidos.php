<?php
  include('../../functions.inc.php');
  userIsLogged();
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
        <title>Meus Pedidos</title>
    </head>
    <body>
        <main>
            <div class="body-bg">    
                <div id="square">Meus Pedidos</div>
                <div id="pac-man">
                    <svg width="184" height="184" viewBox="0 0 184 184" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="92" cy="92" r="92" fill="#BFEFBE"/>
                        <path d="M88.7886 76.6945C85.1319 68.0676 78.5971 60.9755 70.2976 56.6266C61.9981 52.2777 52.4474 50.941 43.2729 52.8444C34.0983 54.7478 25.8676 59.7735 19.9831 67.0651C14.0986 74.3567 10.9244 83.4631 11.0014 92.8326C11.0783 102.202 14.4017 111.255 20.4052 118.449C26.4086 125.643 34.7208 130.533 43.9254 132.285C53.1299 134.038 62.6573 132.544 70.8843 128.06C79.1112 123.575 85.5287 116.377 89.0432 107.691L51.5 92.5L88.7886 76.6945Z" fill="#A0DB9F"/>
                        <ellipse cx="101" cy="92.5" rx="9" ry="9.5" fill="#A0DB9F"/>
                        <ellipse cx="166" cy="92.5" rx="9" ry="9.5" fill="#A0DB9F"/>
                        <ellipse cx="133.5" cy="92.5" rx="8.5" ry="9.5" fill="#A0DB9F"/>
                    </svg>
                </div>
                <div id="pedir-meats">Bora pedir um MEATS?</div>
                <div id="dinheiro">Dinheiro bem gasto é dinheiro gasto com comida!</div>
            </div>
        </main>
        <?php require_once('navbar.html'); ?>
        <script>
            let navButton = document.querySelectorAll('nav a')
            navButton[2].innerHTML = `<div>
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.63987 11.48C4.6868 10.8953 4.95225 10.3497 5.38336 9.95187C5.81446 9.55406 6.37959 9.33322 6.9662 9.33334H21.0339C21.6205 9.33322 22.1856 9.55406 22.6167 9.95187C23.0478 10.3497 23.3133 10.8953 23.3602 11.48L24.297 23.1467C24.3228 23.4677 24.2818 23.7907 24.1767 24.0951C24.0715 24.3995 23.9045 24.6789 23.6861 24.9156C23.4676 25.1524 23.2026 25.3413 22.9076 25.4705C22.6125 25.5998 22.294 25.6666 21.9719 25.6667H6.0282C5.70611 25.6666 5.38753 25.5998 5.09251 25.4705C4.79749 25.3413 4.53243 25.1524 4.31401 24.9156C4.0956 24.6789 3.92855 24.3995 3.8234 24.0951C3.71825 23.7907 3.67727 23.4677 3.70304 23.1467L4.63987 11.48V11.48Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.6667 12.8333V7.00001C18.6667 5.76233 18.175 4.57535 17.2999 3.70018C16.4247 2.82501 15.2377 2.33334 14 2.33334C12.7624 2.33334 11.5754 2.82501 10.7002 3.70018C9.82504 4.57535 9.33337 5.76233 9.33337 7.00001V12.8333" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                Meus pedidos`
            navButton[2].style.color = "black"
        </script>
    </body>
</html>