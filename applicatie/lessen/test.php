<?php
require_once 'db_connectie.php';
$db = maakVerbinding();
$query = 'SELECT vluchtnummer, bestemming, maatschappijcode, gatecode, vertrektijd FROM vlucht ORDER BY vluchtnummer';
$data = $db->query($query);

if (isset($_GET["vertrektijd"]) || isset($_GET["bestemming"])) {
  $vertrektijd = $_GET["vertrektijd"];
  $bestemming = $_GET["bestemming"];
  $query = "SELECT vluchtnummer, bestemming, maatschappijcode, gatecode, vertrektijd FROM vlucht WHERE 1=1";
  if (!empty($vertrektijd)) {
    $query = $query . " AND vertrektijd='$vertrektijd'";
  }
  if (!empty($bestemming)) {
    $query = $query . " AND bestemming LIKE '%$bestemming%'";
  }
  $data = $db->query($query);
}

$vluchtendata = '<table id="vluchtentabel">';
$vluchtendata = $vluchtendata .= "<tr><th>Vluchtnummer</th><th>Maatschappijcode</th><th>Bestemming</th><th>Gatecode</th><th>Vertrektijd</th></tr>";
foreach ($data as $rij) {
  $vluchtnummer = $rij['vluchtnummer'];
  $maatschappijcode = $rij['maatschappijcode'];
  $bestemming = $rij['bestemming'];
  $gatecode = $rij['gatecode'];
  $vertrektijd = $rij['vertrektijd'];
  $vluchtendata = $vluchtendata .= "<tr><td>$vluchtnummer</td><td>$maatschappijcode</td><td>$bestemming</td><td>$gatecode</td><td>$vertrektijd</td></tr>";
}
$vluchtendata = $vluchtendata .= '</table>';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8">
  <form>
    <label>Filteren op vertrektijd:</label>
    <input type="datetime-local" name="vertrektijd" onchange="filter()">
    <label>Filteren op bestemming:</label>
    <input type="text" name="bestemming" onkeyup="filter()">
  </form>
  <title>Gelre Airport</title>
  <link