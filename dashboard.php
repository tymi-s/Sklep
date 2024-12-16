<?php
session_start();

// Sprawdzanie, czy użytkownik jest zalogowany
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
</head>
<body>
    <h1>Witaj w panelu użytkownika!</h1>
    <p>Zalogowano jako użytkownik ID: <?php echo $_SESSION['user_id']; ?></p>
    <a href="logout.php">Wyloguj się</a>
</body>
</html>
