<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "<p class='error'>Musisz być zalogowany, aby złożyć zamówienie.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['city'] ?? '';
    $postalCode = $_POST['postal_code'] ?? '';
    $street = $_POST['street'] ?? '';
    $houseNumber = $_POST['house_number'] ?? '';
    $paymentMethod = $_POST['payment_method'] ?? '';

    if (empty($city) || empty($postalCode) || empty($street) || empty($houseNumber) || empty($paymentMethod)) {
        echo "<p class='error'>Proszę wypełnić wszystkie pola adresu i wybrać metodę płatności.</p>";
        exit;
    }

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "<p class='error'>Twój koszyk jest pusty.</p>";
        exit;
    }

    // Połączenie części adresu
    $fullAddress = $city . "_" . $postalCode . "_" . $street . "_" . $houseNumber;

    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['price'];
    }

    include 'f_connect.php';

    $stmt = $conn->prepare("
        INSERT INTO zamowienia (id_uzytkownika, cena, adres, status)
        VALUES (?, ?, ?, 'Oczekujące')
    ");
    $stmt->bind_param("ids", $_SESSION['user_id'], $totalPrice, $fullAddress);

    if ($stmt->execute()) {
        unset($_SESSION['cart']); // Opróżnienie koszyka tylko po sukcesie
        echo "<p class='success'>Zamówienie zostało poprawnie sfinalizowane!</p>";
    } else {
        echo "<p class='error'>Wystąpił błąd podczas składania zamówienia.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p class='error'>Nieprawidłowe żądanie.</p>";
}
