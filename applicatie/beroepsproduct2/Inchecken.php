<?php
require_once 'db_connectie.php';
require_once 'functies.php';

date_default_timezone_set('Europe/Amsterdam');

Toevoegen_inchecken();
//Zelfservice inchekken variabelen
$imelding                = '';
$ipassagiernummer        = '';
$ivluchtnummer           = '';
$inaam                   = '';
$igewicht                = '';
$iobjectvolgnummer       = '';

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
  <div class="blok2">
    <h2>Zelservice Inchekken</h2>
    <form action="Details.php" method="post">
      <div class="tekstaanpassen">
        <label for="ipassagiernummer">Passagiernummer</label>
        <input type="number" id="ipassagiernummer" name="ipassagiernummer" value="<?= $ipassagiernummer ?>" min="10000" max="99999" maxlength="5" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="inaam">Naam</label>
        <input type="text" id="inaam" name="inaam" value="<?= $inaam ?>" autocapitalize="sentences" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="ivluchtnummer">Vluchtnummer</label>
        <input type="number" id="ivluchtnummer" name="ivluchtnummer" value="<?= $ivluchtnummer ?>" min="10000" max="99999" maxlength="5" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="iobjectvolgnummer">Aantal bagage</label>
        <select id="iobjectvolgnummer" name="iobjectvolgnummer">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="igewicht">Totaal Gewicht</label>
        <input type="number" id="igewicht" name="igewicht" value="<?= $igewicht ?>" step="0.01" required>
      </div>
      <br>
      <input type="submit" id="opslaan3" name="opslaan3" value="Opslaan">
      <?= $imelding ?><br>
    </form>
  </div>

  <!-- Footer -->

  <footer>
    @Copyright GelreAirport 2022- All Right Reserved.
  </footer>
</body>

</html>