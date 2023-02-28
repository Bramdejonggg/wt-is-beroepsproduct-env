<?php
session_start();
if (!$_SESSION['loggedIn1'] == true) {
  header('location:login.php');
}
date_default_timezone_set('Europe/Amsterdam');
require_once 'db_connectie.php';
require_once 'functies.php';



Toevoegen_vlucht();
$melding                 = '';
$vluchtnummer            = '';
$Bestemming              = '';
$Gatecode                = '';
$max_aantal              = '';
$max_gewicht_pp          = '';
$max_totaalgewicht       = '';
$vertrektijd             = '';
$maatschappijcode        = '';

Toevoegen_bezoeker();
$kmelding                = '';
$kpassagiernummer        = '';
$knaam                   = '';
$kvluchtnummer           = '';
$kgeslacht               = '';
$kbalienummer            = '';
$kstoel                  = '';
$kinchecktijdstip        = '';

Toevoegen_bagage();
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
      <li><a href="vluchten.php">Vluchten</a></li>
      <li><a href="overzichtpassagier.php">Overzicht Passagiers</a></li>
    </ul>
  </nav>

  <!-- Blok 1 Aanmaken nieuwe vlucht Formulier -->

  <div class="blok1">
    <h2>Aanmaken nieuwe vlucht</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="tekstaanpassen">
        <label for="vluchtnummer">Vluchtnummer</label>
        <input type="number" id="vluchtnummer" name="vluchtnummer" value="<?= $vluchtnummer ?>" min="10000" max="99999" maxlength="1" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="bestemming">Bestemming</label>
        <input type="text" id="bestemming" name="bestemming" value="<?= $Bestemming ?>" autocapitalize="on" min="3" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="maatschappijcode">Maatschappijcode</label>
        <input type="text" id="maatschappijcode" name="maatschappijcode" value="<?= $maatschappijcode ?>" autocapitalize="on" maxlength="2" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="gatecode">Gatecode</label>
        <select id="gatecode" name="gatecode">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="max_aantal">Max aantal</label>
        <input type="number" id="max_aantal" name="max_aantal" value="<?= $max_aantal ?>" min="0" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="max_gewicht_pp">Max gewicht pp</label>
        <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" value="<?= $max_gewicht_pp ?>" min="0" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="max_totaalgewicht">Max totaalgewicht</label>
        <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" value="<?= $max_totaalgewicht ?>" min="0" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="vertrektijd"></label>
        <input type="datetime-local" id="vertrektijd" name="vertrektijd" value="<?= $vertrektijd ?>" required>
      </div>
      <br>
      <input type="submit" id="opslaan1" name="opslaan1" value="Opslaan">
      <?= $melding ?>
    </form>
  </div>

  <!-- Blok 2 Aanmaken nieuwe bezoeker Formulier-->

  <div class="blok2">
    <h2>Aanmaken nieuwe Bezoeker</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="tekstaanpassen">
        <label for="kpassagiernummer">Passagiernummer</label>
        <input type="number" id="kpassagiernummer" name="kpassagiernummer" value="<?= $kpassagiernummer ?>" min="10000" max="99999" maxlength="5" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="knaam">Naam</label>
        <input type="text" id="knaam" name="knaam" value="<?= $knaam ?>" autocapitalize="sentences" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="kvluchtnummer">Vluchtnummer</label>
        <input type="number" id="kvluchtnummer" name="kvluchtnummer" value="<?= $kvluchtnummer ?>" min="10000" maxlength="5" required>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="kgeslacht">Geslacht</label>
        <select id="kgeslacht" name="kgeslacht" required>
          <option value="M">M</option>
          <option value="V">V</option>
        </select>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="kbalienummer">Balienummer</label>
        <select id="kbalienummer" name="kbalienummer">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
      <br>
      <div class="tekstaanpassen">
        <label for="kstoel">Stoel </label>
        <input type="kstoel" id="kstoel" name="kstoel" value="<?= $kstoel  ?>" autocapitalize="on" maxlength="3" required>
      </div>
      <br>
      <input type="submit" id="opslaan2" name="opslaan2" value="Opslaan">
      <?= $kmelding ?>
    </form>
  </div>

  <!-- Blok 3 Passagier inchecken Formulier-->

  <div class="blok3">
    <h2>Passagier inchekken</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
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