<?php
session_start();
if (!$_SESSION['loggedIn1'] == true) {
    header('location:login.php');
}
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
            <li><a href="vluchten.php">Vluchten</a></li>
            <li><a href="Aanpassingen.php">Aanpassingen</a></li>
            <li><a href="overzichtpassagier.php">Overicht passagier</a></li>
        </ul>
    </nav>
    <div class="login">
        <h1>Je bent nu ingelogt als medewerker!</h1>
        <p> Klik rechtsboven op het menu om Aanpassingen te doen</p>
    </div>
    <footer>
        @Copyright GelreAirport 2022- All Right Reserved.
    </footer>
</body>

</html>