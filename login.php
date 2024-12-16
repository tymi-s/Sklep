<?php
session_start(); // Rozpoczęcie sesji

// Dane połączenia z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "strona";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Obsługa logowania
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $haslo = $_POST['hasło']; // Zmienna `hasło` zgodna z polem w formularzu

    // Sprawdzanie, czy użytkownik istnieje
    $login_query = "SELECT id, haslo FROM users WHERE mail = ?";
    $stmt = $conn->prepare($login_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Weryfikacja hasła
        if (password_verify($haslo, $hashed_password)) {
            // Logowanie udane, zapisujemy dane w sesji
            $_SESSION['user_id'] = $user_id;
            $_SESSION['logged_in'] = true;
            echo "Zalogowano pomyślnie!";
        } else {
            echo "Nieprawidłowe hasło.";
        }
    } else {
        echo "Nie znaleziono użytkownika z takim adresem e-mail.";
    }

    $stmt->close();
}

$conn->close();
?>
