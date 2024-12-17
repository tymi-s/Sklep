# Sklep
Giga projekt 4/4

# Tworzenie bazy danych

(Folder ze stroną musi być w folderze `htdocs`, który znajduje się w folderze `xampp`.)

## Utworzenie bazy danych

1. W `xampp` utwórz bazę danych o nazwie `users`.
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
## Struktura strony i uruchomienie xampp

1. Po pobraniu `xampp` całe repozytorium umieścić w `\xampp\htdocs` (usunąć poprzednią zawartość htdocs)
2. Włącz `xampp` i moduły `Apache` oraz `MySQL`
3. Otwórz stronę przez `localhost/Sklep`
