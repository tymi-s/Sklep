# Sklep
Giga projekt 4/4

# Struktura strony i uruchomienie xampp

1. Po pobraniu `xampp` całe repozytorium umieścić w `\xampp\htdocs` (usunąć poprzednią zawartość htdocs)
2. Włącz `xampp` i moduły `Apache` oraz `MySQL`
3. Otwórz stronę przez `localhost/Sklep`
## Utworzenie bazy danych

1. W `xampp` utwórz bazę danych o nazwie `strona`.
2. Utwórz tabelę w tej bazie za pomocą następującego zapytania SQL:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie TEXT,
    nazwisko TEXT,
    mail TEXT,
    haslo TEXT
);

CREATE TABLE zamowienia (
    id_zamowienia INT AUTO_INCREMENT PRIMARY KEY,
    id_uzytkownika INT NOT NULL,
    cena DECIMAL(10, 2) NOT NULL,
    adres TEXT NOT NULL,
    data_zlozenia DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Oczekujące', 'W realizacji', 'Zrealizowane') DEFAULT 'Oczekujące',
    FOREIGN KEY (id_uzytkownika) REFERENCES users(id) ON DELETE CASCADE
);
```

