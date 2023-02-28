<?php

// Pagina Aanpassingen

// Blok1 Aanmaken nieuwe vlucht
function Toevoegen_vlucht()
{
    $fouten                  = [];

    if (isset($_POST['opslaan1'])) {
        $vluchtnummer              = $_POST['vluchtnummer'];
        $Bestemming                = $_POST['bestemming'];
        $Gatecode                  = $_POST['gatecode'];
        $max_aantal                = $_POST['max_aantal'];
        $max_gewicht_pp            = $_POST['max_gewicht_pp'];
        $max_totaalgewicht         = $_POST['max_totaalgewicht'];
        $vertrektijd               = $_POST['vertrektijd'];
        $maatschappijcode          = $_POST['maatschappijcode'];
        $date                      = new DateTimeImmutable($vertrektijd);
        $vertrektijd               =  $date->format('Y-m-d H:i:s:v');

        // Controleer niet verplichte velden
        if (empty($vluchtnummer)) {
            $fouten[] = "Vluchtnummer is verplict";
        }
        if (!is_numeric($vluchtnummer)) {
            $fouten[] = "vluchtnummer moet bestaan uit cijfers";
        }
        if (empty($Bestemming)) {
            $fouten[] = "Bestemming is verplict";
        }
        if (empty($Gatecode)) {
            $fouten[] = "Gatecode is verplict";
        }
        if (empty($max_aantal)) {
            $fouten[] = "max_aantal is verplict";
        }
        if (!is_numeric($max_aantal)) {
            $fouten[] = "max_aantal moet bestaan uit cijfers";
        }
        if (empty($max_gewicht_pp)) {
            $fouten[] = "max_gewicht_pp is verplict";
        }
        if (!is_numeric($max_gewicht_pp)) {
            $fouten[] = "max_gewicht_pp moet bestaan uit cijfers";
        }
        if (empty($max_totaalgewicht)) {
            $fouten[] = "max_totaalgewicht is verplict";
        }
        if (!is_numeric($max_totaalgewicht)) {
            $fouten[] = "max_totaalgewicht moet bestaan uit cijfers";
        }
        if (empty($vertrektijd)) {
            $fouten[] = "vertrektijd is verplict";
        }
        if (empty($maatschappijcode)) {
            $fouten[] = "maatschappijcode is verplict";
        }

        // zet fouten om in melding
        if (count($fouten) > 0) {
            $melding = '<br>Niet alle velden zijn correct ingevuld:<br>';
            foreach ($fouten as $fout) {
                $melding .= $fout . "<br>";
            }
        } else {
            // data laag
            $db = maakVerbinding();
            // Query prepared statement
            $sql = 'INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode) 
              values (:vluchtnummer, :bestemming, :gatecode, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode);';
            $query = $db->prepare($sql);
            // Verstuurd data naar database
            $data_array = [
                'vluchtnummer'           => $vluchtnummer,
                'bestemming'             => $Bestemming,
                'gatecode'               => $Gatecode,
                'max_aantal'             => $max_aantal,
                'max_gewicht_pp'         => $max_gewicht_pp,
                'max_totaalgewicht'      => $max_totaalgewicht,
                'vertrektijd'            => $vertrektijd,
                'maatschappijcode'       => $maatschappijcode
            ];

            $succes = $query->execute($data_array);
            // Check results
            if ($succes) {
                $melding = 'Voltooid!';
                $vluchtnummer                   = '';
                $Bestemming                     = '';
                $Gatecode                       = '';
                $max_aantal                     = '';
                $max_gewicht_pp                 = '';
                $max_totaalgewicht              = '';
                $vertrektijd                    = '';
                $maatschappijcode               = '';
            } else {
                $melding = 'ERROR';
            }
        }
    }
}

// Blok2 Aanmaken nieuwe bezoeker
function Toevoegen_bezoeker()
{
    $kfouten                 = [];
    if (isset($_POST['opslaan2'])) {

        $kpassagiernummer          = $_POST['kpassagiernummer'];
        $knaam                     = $_POST['knaam'];
        $kvluchtnummer             = $_POST['kvluchtnummer'];
        $kgeslacht                 = $_POST['kgeslacht'];
        $kbalienummer              = $_POST['kbalienummer'];
        $kstoel                    = $_POST['kstoel'];
        $LocalDatetime              = date("Y-m-d H:i:s");
        $kinchecktijdstip         = $LocalDatetime;

        // Controleer niet verplichte velden
        if (empty($kpassagiernummer)) {
            $kfouten[] = "passagiernummer is verplict";
        }
        if (!is_numeric($kpassagiernummer)) {
            $kfouten[] = "passagiernummer moet bestaan uit cijfers";
        }
        if (empty($kvluchtnummer)) {
            $kfouten[] = "vluchtnummer is verplict";
        }
        if (!is_numeric($kvluchtnummer)) {
            $kfouten[] = "vluchtnummer moet bestaan uit cijfers";
        }
        if (empty($kgeslacht)) {
            $kfouten[] = "Gatecode is verplict";
        }
        if (empty($kbalienummer)) {
            $kfouten[] = "balienummer is verplict";
        }
        if (empty($kstoel)) {
            $kfouten[] = "stoel is verplict";
        }

        // zet fouten om in melding
        if (count($kfouten) > 0) {
            $kmelding = '<br>Niet alle velden zijn correct ingevuld:<br>';
            foreach ($kfouten as $kfout) {
                $kmelding .= $kfout . "<br>";
            }
        } else {
            // data laag
            $db = maakVerbinding();
            // Query prepared statement
            $sql = 'INSERT INTO Passagier (passagiernummer, naam, vluchtnummer, geslacht, balienummer, stoel, inchecktijdstip) 
                      values (:passagiernummer, :naam, :vluchtnummer, :geslacht, :balienummer, :stoel, :inchecktijdstip);';
            $query = $db->prepare($sql);
            // Verstuurd data naar database
            $kdata_array = [
                'passagiernummer'        => $kpassagiernummer,
                'naam'                   => $knaam,
                'vluchtnummer'           => $kvluchtnummer,
                'geslacht'               => $kgeslacht,
                'balienummer'            => $kbalienummer,
                'stoel'                  => $kstoel,
                'inchecktijdstip'        => $kinchecktijdstip
            ];
            $ksucces = $query->execute($kdata_array);
            // Check results
            if ($ksucces) {
                $kmelding = 'Voltooid!';
                $kpassagiernummer             = '';
                $knaam                        = '';
                $kvluchtnummer                = '';
                $kgeslacht                    = '';
                $kbalienummer                 = '';
                $kstoel                       = '';
                $kinchecktijdstip              = '';
            } else {
                $kmelding = 'ERROR';
            }
        }
    }
}

function Toevoegen_bagage()
{

    $ifouten                 = [];
    // Blok3 Passagier inchecken
    if (isset($_POST['opslaan3'])) {
        $ipassagiernummer                 = $_POST['ipassagiernummer'];
        $inaam                            = $_POST['inaam'];
        $ivluchtnummer                    = $_POST['ivluchtnummer'];
        $iobjectvolgnummer                = $_POST['iobjectvolgnummer'];
        $igewicht                         = $_POST['igewicht'];

        // Controleer niet verplichte velden

        if (empty($ipassagiernummer)) {
            $ifouten[] = "passagiernummer is verplict";
        }
        if (!is_numeric($ipassagiernummer)) {
            $ifouten[] = "passagiernummer moet bestaan uit cijfers";
        }
        if (empty($inaam)) {
            $ifouten[] = "naam is verplict";
        }
        if (empty($ivluchtnummer)) {
            $ifouten[] = "vluchtnummer is verplict";
        }
        if (!is_numeric($ivluchtnummer)) {
            $ifouten[] = "vluchtnummer moet bestaan uit cijfers";
        }
        if (empty($iobjectvolgnummer)) {
            $ifouten[] = "balienummer is verplict";
        }
        if (empty($igewicht)) {
            $ifouten[] = "stoel is verplict";
        }
        if (!is_numeric($igewicht)) {
            $ifouten[] = "gewicht moet bestaan uit cijfers";
        }

        // zet fouten om in melding
        if (count($ifouten) > 0) {
            $imelding = '<br>Niet alle velden zijn correct ingevuld:<br>';
            foreach ($ifouten as $ifout) {
                $imelding .= $ifout . "<br>";
            }
        } else {
            // data laag
            $db = maakVerbinding();
            // Query prepared statement
            $sql = 'INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) 
                values (:passagiernummer, :objectvolgnummer, :gewicht);';
            $query = $db->prepare($sql);
            // Verstuurd data naar database
            $idata_array = [
                'passagiernummer'       => $ipassagiernummer,
                'objectvolgnummer'      => $iobjectvolgnummer,
                'gewicht'               => $igewicht,
            ];

            $isucces = $query->execute($idata_array);
            // Check results
            if ($isucces) {
                $imelding = 'Voltooid!';
                $ipassagiernummer           = '';
                $ivluchtnummer              = '';
                $inaam                      = '';
                $iobjectvolgnummer          = '';
                $igewicht                   = '';
            } else {
                $imelding = 'ERROR';
            }
        }
    }
}


//Pagina Login

//Login voor medewerker
function Login_medewerker()
{

    if (isset($_POST['submit1'])) {
        $username1 = $_POST['username1'];
        $password1 = $_POST['password1'];
        if ($username1 == 'Medewerker' && $password1 == 'Password') {
            $_SESSION['loggedIn1'] = true;
            $_SESSION['username1'] = $username1;
            // Omleiding naar Medewerker pagina
            header('Location: medewerker.php');
        } else {
            $message1 = 'INCORRECT';
            session_destroy();
        }
    }
}

function Login_bezoeker()
{

    if (isset($_POST['submit2'])) {
        $username2 = $_POST['username2'];
        $password2 = $_POST['password2'];
        if ($username2 == 'Bezoeker' && $password2 == 'Password') {
            $_SESSION['loggedIn2'] = true;
            $_SESSION['username2'] = $username2;
            // Omleiding naar Bezoekers pagina
            header('Location: inchecken.php');
        } else {
            $message2 = 'INCORRECT';
            session_destroy();
        }
    }
}


//Pagina Vluchten

//creëren van tabel van vluchten
function Maak_tabel_vluchten()
{
    $db = maakVerbinding();
    $query = "SELECT vluchtnummer, bestemming, maatschappijcode, gatecode, vertrektijd FROM vlucht WHERE vertrektijd > '" . date("Y-m-d H:i:s") . "' ORDER BY vertrektijd";
    
    if (isset($_POST["vertrektijd"]) || isset($_POST["bestemming"])) {
        $vertrektijd = $_POST["vertrektijd"];
        if (!empty($vertrektijd)) {
            $vertrektijd = date("Y-m-d H:i:s", strtotime($vertrektijd));
            $query .= " AND vertrektijd='$vertrektijd'";
        }
        
        $bestemming = $_POST["bestemming"];
        if (!empty($bestemming)) {
            $query .= " AND bestemming LIKE '%$bestemming%'";
        }
    }

    $data = $db->query($query);

    $vluchtendata = '<table id="vluchtentabel">';
    $vluchtendata .= "<tr><th>Vluchtnummer</th><th>Maatschappijcode</th><th>Bestemming</th><th>Gatecode</th><th>Vertrektijd</th></tr>";
    foreach ($data as $rij) {
        $vluchtnummer = $rij['vluchtnummer'];
        $maatschappijcode = $rij['maatschappijcode'];
        $bestemming = $rij['bestemming'];
        $gatecode = $rij['gatecode'];
        $vertrektijd = $rij['vertrektijd'];
        $vluchtendata .= "<tr><td>$vluchtnummer</td><td>$maatschappijcode</td><td>$bestemming</td><td>$gatecode</td><td>$vertrektijd</td></tr>";
    }
    $vluchtendata .= '</table>';

    return $vluchtendata;
};


//Pagina Details

//Laten zien van persoonelijke details
function vlucht_details()
{

    $db = maakVerbinding();
    $sql = 'SELECT vluchtnummer, bestemming, gatecode, max_gewicht_pp, vertrektijd, maatschappijcode
            from Vlucht
            where vluchtnummer = :vluchtnummer';

    $query = $db->prepare($sql);

    // Parameter verbinden met het statement
    $query->bindParam(':vluchtnummer', $ivluchtnummer);

    // Doorvoeren van het statement
    $succes = $query->execute();
    $html = '<table class="tabel">';
    $html .= "<tr><th>Vluchtnummer</th><th>Bestemming</th>
        <th>Gatecode</th><th>Max gewicht</th><th>Vertrektijd</th><th>Maatschappijcode</th></tr>";
    foreach ($query as $rij) {
        $vluchtnummer = $rij['vluchtnummer'];
        $bestemming = $rij['bestemming'];
        $gatecode = $rij['gatecode'];
        $max_gewicht_pp = $rij['max_gewicht_pp'];
        $vertrektijd = $rij['vertrektijd'];
        $maatschappijcode = $rij['maatschappijcode'];
        $html .= "<tr>";
        $html .= "<td>$vluchtnummer</td><td>$bestemming</td><td>$gatecode</td>";
        $html .= "<td>$max_gewicht_pp</td><td>$vertrektijd</td><td>$maatschappijcode</td>";
        $html .= "</tr>";
    }
    $html .= '</table>';
    return $html;
}

//Pagina Inchecken

function Toevoegen_inchecken()
{
    $ifouten                 = [];

    if (isset($_POST['opslaan3'])) {
        $ipassagiernummer                 = $_POST['ipassagiernummer'];
        $inaam                            = $_POST['inaam'];
        $ivluchtnummer                    = $_POST['ivluchtnummer'];
        $iobjectvolgnummer                = $_POST['iobjectvolgnummer'];
        $igewicht                         = $_POST['igewicht'];

        if (count($ifouten) > 0) {
            $imelding = '<br>Niet alle velden zijn correct ingevuld:<br>';
            foreach ($ifouten as $ifout) {
                $imelding .= $ifout . "<br>";
            }
        } else {
            $db = maakVerbinding();
            // Data query met prepare statements
            $sql = 'INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) 
                    values (:passagiernummer, :objectvolgnummer, :gewicht);';
            $query = $db->prepare($sql);
            // Verzenden
            $idata_array = [
                'passagiernummer'       => $ipassagiernummer,
                'objectvolgnummer'      => $iobjectvolgnummer,
                'gewicht'               => $igewicht,
            ];

            $isucces = $query->execute($idata_array);
            // Resultaten check
            if ($isucces) {
                $imelding = 'Voltooid!';
                $ipassagiernummer           = '';
                $ivluchtnummer              = '';
                $inaam                      = '';
                $iobjectvolgnummer          = '';
                $igewicht                   = '';
            } else {
                $imelding = 'ERROR';
            }
        }
    }
}


//Pagina Overzichtpassagiers

function Maak_tabel_passagiers()
{
    $db = maakVerbinding();

    // Voer een SELECT-query uit om gegevens op te halen uit de tabel 'passagier'
    $query = 'SELECT passagiernummer, vluchtnummer, naam FROM passagier ORDER BY vluchtnummer';
    $data = $db->query($query);

    if (isset($_POST["vluchtnummer"]) || isset($_POST["passagiernummer"])) {
        $vluchtnummer = $_POST["vluchtnummer"];
        $passagiernummer = $_POST["passagiernummer"];
        $query = "SELECT passagiernummer, vluchtnummer, naam FROM passagier WHERE 1=1";

        if (!empty($vluchtnummer)) {
            $query = $query . " AND vluchtnummer='$vluchtnummer'";
        }
        if (!empty($passagiernummer)) {
            $query = $query . " AND passagiernummer='$passagiernummer'";
        }

        $data = $db->query($query);
    }

    // Bouw een HTML-tabel op met de opgehaalde gegevens
    $passagiersdata = '<table id="passagierstabel">';
    $passagiersdata .= "<tr><th>Passagiernummer</th><th>Vluchtnummer</th><th>Naam</th></tr>";
    foreach ($data as $rij) {
        $passagiernummer = $rij['passagiernummer'];
        $vluchtnummer = $rij['vluchtnummer'];
        $naam = $rij['naam'];
        $passagiersdata .= "<tr><td>$passagiernummer</td><td>$vluchtnummer</td><td>$naam</td></tr>";
    }
    $passagiersdata .= '</table>';
    return $passagiersdata;
}
