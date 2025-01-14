const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})


// dla logowania
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('logowanieForm'); // Formularz logowania
    const komunikat = document.getElementById('komunikat_l'); // Miejsce na komunikat

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobiega przeładowaniu strony

        const formData = new FormData(form); // Pobranie danych z formularza

        fetch('funkcje/f_login.php', { // Wysyłamy dane do pliku login.php
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Wyświetlamy odpowiedź z serwera w divie "komunikat"
            komunikat.innerHTML = data;

            // Opcjonalne przekierowanie po zalogowaniu
            if (data === "Zalogowano pomyślnie!") {
                window.location.href = "/Sklep"; // Przekierowanie na stronę główną po zalogowaniu
            }
        })
        .catch(error => {
            console.error('Błąd:', error);
            komunikat.innerHTML = "Wystąpił błąd podczas logowania.";
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('logowanieForm'); // Formularz logowania
    const komunikat = document.getElementById('komunikat_l'); // Miejsce na komunikat

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobiega przeładowaniu strony

        const formData = new FormData(form); // Pobranie danych z formularza

        fetch('funkcje/f_login.php', { // Wysyłamy dane do pliku login.php
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Wyświetlamy odpowiedź z serwera w divie "komunikat"
            komunikat.innerHTML = data;

            // Opcjonalne przekierowanie po zalogowaniu
            if (data === "Zalogowano pomyślnie!") {
                window.location.href = "/Sklep"; // Przekierowanie na stronę główną po zalogowaniu
            }
        })
        .catch(error => {
            console.error('Błąd:', error);
            komunikat.innerHTML = "Wystąpił błąd podczas logowania.";
        });
    });
});
