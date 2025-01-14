<?php
session_start();



if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;
}


$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="on.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMA | Sklep</title>
    <link rel="stylesheet" href="main.css">
</head>
<body> 
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <a href="/Sklep">
            <img src="PHOTOS/sigma2.png" width="175px" alt="Logo">
    </a>
            </div>
            <nav>
                <ul>
              
                    <a href="/Sklep">Strona główna &nbsp; </a></li>
                    <a href="/Sklep/ona.php"> &nbsp; Ona &nbsp; &nbsp; </a></li>
                    <a href="/Sklep/on.php"> &nbsp; On &nbsp; &nbsp; </a></li>
                    <li><a href="">O nas</a></li>
                    <li><a href="">Kontakt</a></li>
                    
                    <a href="/Sklep/koszyk.php"> Koszyk  </a></li>
                    <li class="odstep"></li>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <li class="witaj" >Witaj <?php echo htmlspecialchars($_SESSION['user_name']); ?></li>
                        <li><a href="konto">Konto</a></li>
                        <li><a href="funkcje/f_logout.php">Wyloguj się</a></li> <!-- Zrobic w js wylogowanie? -->
                    <?php else: ?>
                        <li><a href="logowanie">Login</a></li>
                    <?php endif; ?>
                    
                </ul>
            </nav>
        </div>



        
    </div>

    
    <div class="container">
        <div class="navbar">
            <!-- Your navbar content here -->
        </div>
        
        <h1>Twój Koszyk</h1>
        
        <?php if (count($_SESSION['cart']) > 0): ?>
            <div class="cart">
                <ul>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <li>
                            <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['size']); ?> - <?php echo number_format($item['price'], 2); ?> PLN
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Total: <?php echo number_format($totalPrice, 2); ?> PLN</strong></p>
            </div>
        <?php else: ?>
            <p>Twój koszyk jest pusty.</p>
        <?php endif; ?>
        
    </div>
   

     </body>
     </html>