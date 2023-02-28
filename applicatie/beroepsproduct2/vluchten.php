<?php

require_once 'db_connectie.php';
require_once 'functies.php';
$vluchtendata = Maak_tabel_vluchten();

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
      <li><a href="Privacyverklaring.php">Privacyverklaring</a></li>
    </ul>
  </nav>
  <div class="tabelvluchten">
    <h1>Overzicht van alle Vluchten</h1>
    <form method="post" action="vluchten.php">
      <label>Filteren op Vertrektijd:</label>
      <input type="datetime-local" name="vertrektijd">
      <label>Filteren op Bestemming:</label>
      <input type="text" name="bestemming">
      <input type="submit" value="Zoeken">
    </form>
    <?php
    echo ($vluchtendata);
    ?>
  </div>

  <!-- Footer -->

  <footer>
    Copyright Gelre Airport 2020
  </footer>
</body>

</html>