<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "Musisz być zalogowany, aby dodać produkt do koszyka.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'] ?? null;
    $productPrice = $_POST['productPrice'] ?? null;
    $productSize = $_POST['productSize'] ?? null;

    if ($productName && $productPrice && $productSize) {
        $product = [
            'name' => $productName,
            'price' => $productPrice,
            'size' => $productSize
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][] = $product;
        echo "Produkt '$productName' w rozmiarze '$productSize' za $productPrice PLN został dodany do koszyka!";
    } else {
        echo "Brak wszystkich wymaganych danych.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
