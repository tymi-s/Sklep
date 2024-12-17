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
```

