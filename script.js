// dla rejestracji
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('rejestracjaForm');
    const komunikat = document.getElementById('komunikat_r');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobiega przeładowaniu strony

        const formData = new FormData(form);

        fetch('f_rejestracja.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Wyświetlamy odpowiedź z serwera w divie "komunikat"
            komunikat.innerHTML = data;
        })
        .catch(error => {
            console.error('Błąd:', error);
            komunikat.innerHTML = "Wystąpił błąd podczas rejestracji.";
        });
    });
});

// dla logowania
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('logowanieForm'); // Formularz logowania
    const komunikat = document.getElementById('komunikat_l'); // Miejsce na komunikat

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobiega przeładowaniu strony

        const formData = new FormData(form); // Pobranie danych z formularza

        fetch('f_login.php', { // Wysyłamy dane do pliku login.php
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Wyświetlamy odpowiedź z serwera w divie "komunikat"
            komunikat.innerHTML = data;

            // Opcjonalne przekierowanie po zalogowaniu
            if (data === "Zalogowano pomyślnie!") {
                window.location.href = "index.php"; // Przekierowanie na stronę główną po zalogowaniu
            }
        })
        .catch(error => {
            console.error('Błąd:', error);
            komunikat.innerHTML = "Wystąpił błąd podczas logowania.";
        });
    });
});