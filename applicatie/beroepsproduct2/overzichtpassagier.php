<?php
session_start();
if (!$_SESSION['loggedIn1'] == true) {
  header('location:login.php');
}
require_once 'db_connectie.php';
require_once 'functies.php';

$passagiersdata = Maak_tabel_passagiers();

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
    </ul>
  </nav>
  <div class="tabelpassagiers">
    <h1>Overzicht van alle Passagiers</h1>
    <form method="post" action="overzichtpassagier.php">
      <label>Filteren op passagiernummer:</label>
      <input type="number" name="passagiernummer">
      <label>Filteren op vluchtnummer:</label>
      <input type="text" name="vluchtnummer">
      <input type="submit" value="Zoeken">
    </form>
    <?php
    echo ($passagiersdata);
    ?>
  </div>

  <!-- Footer -->

  <footer>
    Copyright Gelre Airport 2020
  </footer>
</body>

</html>