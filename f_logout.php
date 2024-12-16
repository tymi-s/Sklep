<?php
session_start();
session_unset(); // Usuwa wszystkie zmienne sesji
session_destroy(); // Niszczy sesję
header("Location: index.php"); // Przekierowanie na stronę główną
exit();
?>