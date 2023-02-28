<?php
require_once 'db_connectie.php';
require_once 'functies.php';
$ivluchtnummer = vlucht_details();

?>
<!DOCTYPE html>
<html lang="nl">

<!-- Header -->

<head>
    <meta charset="utf-8">
    <title>Gelre Airport</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
</head>

<!-- Body -->

<body>

    <!-- Navigatiebalk -->

    <nav>
        <img src="image/Logo.jpg.png" alt="niks">
        <ul>
            <li><a href="Index.php">Home</a></li>
            <li><a href="Inchecken.php">Zelf service inchekken</a></li>
            <li><a href="vluchten.php">Vluchten</a></li>
            <li><a href="Privacyverklaring.php">Privacyverklaring</a></li>
        </ul>
    </nav>
    <div class="details">
        <h1>Mijn Vluchtdetails:</h1>
    </div>
    <?= ($ivluchtnummer); ?>

      <!-- Footer -->

    <footer>
        @Copyright GelreAirport 2022- All Right Reserved.
    </footer>
</body>

</html>