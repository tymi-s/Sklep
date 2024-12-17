<?php
session_start();
session_unset(); // Usuwa wszystkie zmienne sesji
session_destroy(); // Niszczy sesję
header("Location: /Sklep"); // Przekierowanie na stronę główną
exit();
?>