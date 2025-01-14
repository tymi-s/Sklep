<?php
session_start();

// Tablica produktów
$produkty = [
    ['name' => 'Czarna sukienka', 'price' => '109.99', 'image' => 'PHOTOS/s1 (1).png', 'id' => 1],
    ['name' => 'Czarno-Biała sukienka', 'price' => '149.99', 'image' => 'PHOTOS/s1 (2).png', 'id' => 2],
    ['name' => 'Błękitna koszulka', 'price' => '59.99', 'image' => 'PHOTOS/s1 (3).png', 'id' => 3],
    ['name' => 'Brązowowa koszulka z długim rękawem', 'price' => '69.99', 'image' => 'PHOTOS/s1 (4).png', 'id' => 4],
    ['name' => 'Niebieska koszulka z długim rękawem', 'price' => '89.99', 'image' => 'PHOTOS/s1 (5).png', 'id' => 5],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ona.css">
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
                <a href="/Sklep/on.php"> &nbsp; On &nbsp; &nbsp; </a></li>
                    <li><a href="">O nas</a></li>
                    <li><a href="">Kontakt</a></li>
                    <li class="odstep"></li>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <a href="/Sklep/koszyk.php"> Koszyk  </a></li>
                        <li class="odstep"></li>
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
        <?php foreach ($produkty as $produkt): ?>
            <div class="produkt">
                <p><?php echo htmlspecialchars($produkt['name']); ?></p>
                <img src="<?php echo htmlspecialchars($produkt['image']); ?>" alt="Produkt <?php echo $produkt['id']; ?>">
                <p class="cena">Cena: <?php echo htmlspecialchars($produkt['price']); ?> PLN</p>
                <label for="rozmiar<?php echo $produkt['id']; ?>">Wybierz rozmiar:</label>
                <select id="rozmiar<?php echo $produkt['id']; ?>" name="rozmiar<?php echo $produkt['id']; ?>">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <button class="koszyk-btn"
                        data-name="<?php echo htmlspecialchars($produkt['name']); ?>"
                        data-price="<?php echo htmlspecialchars($produkt['price']); ?>"
                        data-size-id="rozmiar<?php echo $produkt['id']; ?>">
                    Dodaj do koszyka
                </button>
                <div class="komunikat_r"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="skrypty/koszyk.js?v=1.0"></script>
</body>
</html>
