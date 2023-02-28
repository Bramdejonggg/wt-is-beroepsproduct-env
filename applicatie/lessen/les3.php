<?php

require_once "/applicatie/db_connectie.php";

//maak verbinding
$db = maakVerbinding();

//stel sql samen
$sql = "select stuknr, titel, genrenaam, n.omschrijving
from stuk s left outer join niveau n on s.niveaucode = n.niveaucode";
//voor query uit
$data = $db->query($sql);
//verwerk data
$html = "<table>";
foreach($data as $rij) {
    $stuknr = $rij['stuknr'];
    $titel = $rij['titel'];
    $genrenaam = $rij['genrenaam'];
    $omschrijving = $rij['omschrijving'];

    $html .= "<tr>";
    $html .= "<li>$stuknr</li>";
    $html .= "<li>$titel</li>";
    $html .= "<li>$genrenaam</li>";
    $html .= "<li>$omschrijving</li>";
    $html .= "</tr>";
}
$html .= "</table>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Muziekstukken</h1>

    <?= $html ?>
</body>
</html>