document.addEventListener('DOMContentLoaded', function () {
    const koszykBtns = document.querySelectorAll('.koszyk-btn');

    koszykBtns.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Pobieranie danych z przycisku i przypisanie elementu komunikatu
            const productName = this.dataset.name;
            const productPrice = this.dataset.price;
            const sizeSelectId = this.dataset.sizeId;
            const productSize = document.getElementById(sizeSelectId).value;
            const komunikat = this.parentElement.querySelector('.komunikat_r');

            // Tworzenie FormData
            const formData = new FormData();
            formData.append('productName', productName);
            formData.append('productPrice', productPrice);
            formData.append('productSize', productSize);

            // Wysyłanie danych do PHP
            fetch('funkcje/f_dodajDoKoszyka.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    // Wyświetlenie komunikatu w odpowiednim elemencie
                    komunikat.innerHTML = data;

                    // Jeśli użytkownik nie jest zalogowany, komunikat pozostaje
                    if (!data.includes('Musisz być zalogowany')) {
                        // Ukrywanie komunikatu po 3 sekundach tylko w przypadku sukcesu
                        setTimeout(() => {
                            komunikat.innerHTML = '';
                        }, 3000);
                    }
                })
                .catch(error => {
                    console.error('Błąd:', error);
                    komunikat.innerHTML = "Wystąpił błąd podczas dodawania do koszyka.";
                });
        });
    });
});
