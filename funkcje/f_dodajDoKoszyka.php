<?php
session_start(); // Rozpoczyna sesję

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobieramy dane z żądania
    $productName = $_POST['productName'] ?? null;
    $productPrice = $_POST['productPrice'] ?? null;
    $productSize = $_POST['productSize'] ?? null;

    // Sprawdzamy, czy wszystkie dane są poprawne
    if ($productName && $productPrice && $productSize) {
        // Tworzymy nowy element koszyka
        $product = [
            'name' => $productName,
            'price' => $productPrice,
            'size' => $productSize
        ];

        // Inicjalizujemy koszyk w sesji, jeśli jeszcze nie istnieje
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Dodajemy produkt do koszyka
        $_SESSION['cart'][] = $product;

        echo "Produkt '$productName' w rozmiarze '$productSize' za $productPrice PLN został dodany do koszyka!";
    } else {
        echo "Brak wszystkich wymaganych danych do dodania produktu do koszyka.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
