<?php
session_start();

// Sprawdzanie, czy użytkownik jest zalogowany
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel uzytkownika</title>
    <link rel="stylesheet" href="main.css">
</head>
<body> 
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <img src="PHOTOS/sigma2.png" width="175px" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="/Sklep">Strona główna</a></li>
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
        <h1>Panel uzytkownika</h1>
        <div>ID: <?php echo $_SESSION['user_id']?></div>
        <div>E-mail: <?php echo $_SESSION['user_email'] ?></div>
        <div>Imie: <?php echo $_SESSION['user_name'] ?></div>
        <div>Nazwisko: <?php echo $_SESSION['user_lastname'] ?></div>
    </div>
   
</body>
</html>