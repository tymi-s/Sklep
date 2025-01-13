<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMA | Sklep</title>
    <link rel="stylesheet" href="main.css">
</head>
<body> 
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="PHOTOS/sigma2.png" width="125px">
            </div>
            <nav>
                <ul>
                
                    <li><a href="">O nas</a></li>
                    <li><a href="">Kontakt</a></li>
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

    <div class="produkty">
    <div class="produkt">
        <img src="PHOTOS/k 1.png" alt="Produkt 1">
        <p>Biała koszulka</p>
        <label for="rozmiar1">Wybierz rozmiar:</label>
        <select id="rozmiar1" name="rozmiar1">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        <button class="koszyk-btn">Dodaj do koszyka</button>
    </div>
    <div class="produkt">
        <img src="PHOTOS/k2.png" alt="Produkt 2">
        <p>Czarny T-shirt</p>
        <label for="rozmiar2">Wybierz rozmiar:</label>
        <select id="rozmiar2" name="rozmiar2">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        <button class="koszyk-btn">Dodaj do koszyka</button>
    </div>
    <div class="produkt">
        <img src="PHOTOS/k3.png" alt="Produkt 3">
        <p>Czarna luźna koszulka</p>
        <label for="rozmiar3">Wybierz rozmiar:</label>
        <select id="rozmiar3" name="rozmiar3">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        <button class="koszyk-btn">Dodaj do koszyka</button>
    </div>
    <div class="produkt">
        <img src="PHOTOS/k4.png" alt="Produkt 4">
        <p>Beżowa koszulka</p>
        <label for="rozmiar4">Wybierz rozmiar:</label>
        <select id="rozmiar4" name="rozmiar4">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        <button class="koszyk-btn">Dodaj do koszyka</button>
    </div>
</div>




 </body>
</html>