<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja i logowanie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="rejestracja.css">
    <style>
        /* Styl dla przycisku "Strona główna" */
        .home-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        /* Dodatkowe style, aby przycisk był bardziej widoczny */
        .home-container {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <!-- Dodanie kontenera na przycisk -->
    <div class="home-container">
        <a href="/Sklep" class="home-button">Strona główna</a>
    </div>

    <div class="container" id="signup" style="display:none">
        <h1 class="form-title">Rejestracja</h1>
        <form method="POST" name="rejestracja" id="rejestracjaForm">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="imie" id="imie" placeholder="imie" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="nazwisko" id="nazwisko" placeholder="nazwisko" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="email" required> 
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="haslo" name="haslo" placeholder="haslo" required>
            </div>
            <input type="submit" class="btn" value="Zarejestruj się" name="signUp">
        </form>
        <p class="lub"></p>
        <div class="links">
            <p>Masz już konto?</p>
            <button id="signInButton">Zaloguj się</button>
        </div>
        <div id="komunikat_r"></div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Logowanie</h1>
        <form method="POST" name="logowanie" id="logowanieForm">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="email" required> 
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="hasło" placeholder="haslo" required>
            </div>
            <input type="submit" class="btn" value="Zaloguj się" name="signIn">
        </form>
        <p class="lub"></p>
        <div class="links">
            <p>Nie masz jeszcze konta?</p>
            <button id="signUpButton">Zarejestruj się</button>
        </div>
        <div id="komunikat_l"></div>
    </div>

    <script src="skrypty/logowanie.js"></script>
</body>
</html>
