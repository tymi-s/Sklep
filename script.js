document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('rejestracjaForm');
    const komunikat = document.getElementById('komunikat');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobiega przeładowaniu strony

        const formData = new FormData(form);

        fetch('rejestracja.php', {
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
