<?php
require_once 'db_connectie.php';

$genre = $_GET['genre'];

$db = maakVerbinding();
$sql = 'select stuknr, titel, genrenaam, n.omschrijving, c.naam
        from stuk s 
        left outer join niveau n on s.niveaucode = n.niveaucode
        inner join componist c on s.componistId = c.componistId
        where genrenaam = :genre';
$data = $db-> prepare($sql);
$velden = ['genre' => $genre];
$data->execute($velden);

function getGenres() {
    $db = maakVerbinding();
$sql = 'select genrenaam from genre';
$data = $db-> prepare($sql);
$velden = ['genre' => $genre];
$data->execute($velden);
}

$muziekstukken = '<table>';
foreach($data as $rij)
{
    $stuknr = $rij['stuknr'];
    $titel = $rij['titel'];
    $genrenaam = $rij['genrenaam'];
    $omschrijving = $rij['omschrijving'];
    $naam = $rij['naam'];
    $muziekstukken .= "<tr><td>$stuknr</td><td>$titel</td><td>$naam</td><td>$genrenaam</td><td>$omschrijving</td></tr>";
}
$muziekstukken .= '</table>';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Muziekstukken</title>
</head>
<body>
    <form action="" method="get">
        <select name="genre" id="genre">
            <option value="pop">pop</option>
            <option value="klassiek">klassiek</option>
            <option value="jazz">jazz</option>
        </select>
        <input type="submit" value="send">
    </form>
    <h1>Muziekstukken</h1>
    <?= $muziekstukken ?>
</body>
</html>