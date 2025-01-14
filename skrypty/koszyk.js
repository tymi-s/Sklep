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

                    // Ukrywanie komunikatu po 3 sekundach
                    if (data.includes('został dodany do koszyka')) { // Sprawdzamy treść odpowiedzi
                        setTimeout(() => {
                            komunikat.innerHTML = ''; // Usuwamy komunikat
                        }, 3000); // 3000 ms = 3 sekundy
                    }
                })
                .catch(error => {
                    console.error('Błąd:', error);
                    komunikat.innerHTML = "Wystąpił błąd podczas dodawania do koszyka.";
                });
        });
    });
});
