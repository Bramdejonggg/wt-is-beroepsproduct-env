<?php

require_once 'db_connectie.php';

// 4 kolommen, dus ook 4 variabelen
$componistId    = $_POST['componistId'];
$naam           = $_POST['naam'];
$geboortedatum  = $_POST['geboortedatum'];
$schoolId       = $_POST['schoolId'];
// --- Database ----------- ------------------------------

$db = maakVerbinding();
// Insert query (prepared statement)
$sql = 'INSERT INTO Componist (componistId, naam, geboortedatum, schoolId) 
        values (:componistId, :naam, :geboortedatum, :schoolId);'; 
// Parse query 
$query = $db->prepare($sql);
// Send data to database
$data_array = [
   'componistId' => $componistId,
   'naam' => $naam,
   'geboortedatum' => $geboortedatum,
   'schoolId' => $schoolId
];
$succes = $query->execute($data_array);
if($succes)
{
   $melding = 'Gegevens zijn opgeslagen in de database.';
}
else
{
   $melding = 'Er ging iets fout bij het opslaan.';
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componinst - nieuw</title>
    <link href="css/normalize.css" rel="stylesheet" >
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?= $melding ?>
</body>
</html>