<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMA | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="PHOTOS/sigma2.png" width="125px">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Strona główna</a></li>
                    <li><a href="">Produkty</a></li>
                    <li><a href="">O nas</a></li>
                    <li><a href="">Kontakt</a></li>
                    <li class="odstep"></li>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <li class="witaj" >Witaj <?php echo htmlspecialchars($_SESSION['user_name']); ?></li>
                        <li><a href="konto.php">Konto</a></li>
                        <li><a href="f_logout.php">Wyloguj się</a></li> <!-- Zrobic w js wylogowanie? -->
                    <?php else: ?>
                        <li><a href="logowanie.php">Login</a></li>
                    <?php endif; ?>
                    
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-2 ">
                <h1>Give Yourself <br>A fresh look!</h1>
                <p>Mistake is the lesson <br> Inaction is a falure <br>Tymon Szyler</p>
            </div>
            <div class="col-2 ">
                <a href="http://127.0.0.1:5500/strona.html">
                    <img src="PHOTOS/on.png" alt="On" style="cursor: pointer;">
                </a>
            </div>
            <div class="col-2">
                <a href="http://127.0.0.1:5500/strona.html">
                    <img src="PHOTOS/ona.png" alt="Ona" style="cursor: pointer;">
                </a>
            </div>
        </div>
    </div>
   
</body>
</html>