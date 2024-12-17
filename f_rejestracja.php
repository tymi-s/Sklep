<?php
include 'f_connect.php';

// Sprawdzamy, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobieramy dane z formularza
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    // Sprawdzanie, czy e-mail już istnieje
    $email_check = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($email_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // E-mail już istnieje w bazie
        echo "Użytkownik z takim adresem e-mail już istnieje.";
    } else {
        // Hashowanie hasła
        $hashed_password = password_hash($haslo, PASSWORD_DEFAULT);
        

        // Przygotowanie zapytania SQL do dodania użytkownika
        $insert_query = "INSERT INTO users (imie, nazwisko, mail, haslo) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ssss", $imie, $nazwisko, $email, $hashed_password);

        // Wykonanie zapytania
        if ($insert_stmt->execute()) {
            echo "Pomyślnie zarejestrowano!";
             // Przekierowanie po pomyślnej rejestracji
        header("Location: http://127.0.0.1:5500/strona.html");
        exit(); // Zakończenie skryptu po przekierowaniu
        } else {
            echo "Błąd: " . $insert_stmt->error;
        }

        // Zamknięcie zapytania
        $insert_stmt->close();
    }

    // Zamknięcie zapytania do sprawdzenia e-mail
    $stmt->close();
}

// Zamknięcie połączenia
$conn->close();
?>
