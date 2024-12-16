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
