document.addEventListener('DOMContentLoaded', function () {
    const orderForm = document.getElementById('orderForm');
    const orderMessage = document.getElementById('orderMessage');
    const cartContainer = document.querySelector('.cart'); // Kontener koszyka

    if (orderForm) {
        orderForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(orderForm);

            // Natychmiastowe usunięcie koszyka z widoku
            if (cartContainer) {
                cartContainer.innerHTML = "<p>Twój koszyk jest pusty.</p>";
            }

            fetch('funkcje/f_podsumowanie.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    orderMessage.innerHTML = data;

                    // Resetowanie formularza po złożeniu zamówienia
                    if (data.includes("Zamówienie zostało złożone")) {
                        orderForm.reset(); // Resetuje wszystkie pola formularza
                    }
                })
                .catch(error => {
                    console.error('Błąd:', error);
                    orderMessage.innerHTML = "<p class='error'>Wystąpił błąd podczas składania zamówienia.</p>";
                });
        });
    }
});

