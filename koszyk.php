<?php
session_start();

$clearMessage = '';

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    $clearMessage = 'Koszyk został opróżniony.';
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
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
    <link rel="stylesheet" href="koszyk.css">
    <style>
        .clear-message, .order-message {
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }
        .order-message {
            color: blue;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
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
        <h1>Twój Koszyk</h1>
        
        <!-- Wyświetlenie komunikatu po opróżnieniu koszyka -->
        <?php if (!empty($clearMessage)): ?>
            <p class="clear-message"><?php echo htmlspecialchars($clearMessage); ?></p>
        <?php endif; ?>

        <div id="orderMessage"></div>
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
            <div class="odstep" ></div>
            <form method="POST">
            <button type="submit" name="clear_cart" class="clear-cart-btn">Opróżnij koszyk</button>
            </form>
            <div class="odstep" ></div>
            <!-- Formularz zamówienia -->
            <form id="orderForm" method="POST">
            <div class="form-row">
                <label for="city">Miasto:</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div class="form-row">
                <label for="postal_code">Kod pocztowy:</label>
                <input type="text" name="postal_code" id="postal_code" pattern="\d{2}-\d{3}" title="Format: 00-000" required>
            </div>
            <div class="form-row">
                <label for="street">Ulica:</label>
                <input type="text" name="street" id="street" required>
            </div>
            <div class="form-row">
                <label for="house_number">Nr domu/mieszkania:</label>
                <input type="text" name="house_number" id="house_number" required>
            </div>
            <div class="form-row">
                <label for="payment_method">Metoda płatności:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="" selected>Wybierz metodę</option>
                    <option value="Karta kredytowa">Karta kredytowa</option>
                    <option value="Przelew bankowy">Przelew bankowy</option>
                    <option value="PayPal">PayPal</option>
                </select>
            </div>
            <button type="submit">Złóż zamówienie</button>
        </form>
        <?php else: ?>
            <p>Twój koszyk jest pusty.</p>
        <?php endif; ?>
    </div>
    <div class="odstep" ></div>
    

    <script src="skrypty/podsumowanie.js"></script>
</body>
</html>
