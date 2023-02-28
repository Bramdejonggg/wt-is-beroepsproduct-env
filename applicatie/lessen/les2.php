<?php

$Eten = ["Shoarma" => 6.95"Appels" => 10.95 "Tabouleh" => 8.95"Hamburger" => 5.50];

$drinken = [
  "Cola" => 2.00
  "Ayran" => 2.30
  "Fernandes" => 2.50
  "Bier" => 5.50
];

$toetjes = [
  "Vla" => 2.00
  "fruitschaal" => 2.30
  "ijsbollen" => 2.50
  "tiramisu" => 5.50
];

function geneermenugedeelte($producten,) {
  $html = "<table>";
  foreach($producten as $product => $prijs) {
    $html.= "<tr>";
    $html.= "<td>". $product ."</td>";
    $html.= "<td>". $prijs ."</td>";
    $html.= "</tr>";
  }
  $html .= "</table>";

  return $html;
}

?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <title>Restaurantmenu</title>
    <style>
      td:first-child {
        width: 8em;
      }
      td:nth-child(2) {
        font-style: italic;
        text-align: right;
        width: 4em;
      }
    </style>
  </head>
  <body>
 
    <h1>Menu</h1>

    <h2>Eten</h2>
    <table>
    <?= geneermenugedeelte($Eten) ?>
    </table>

    <h2>Drinken</h2>
    <table>
    <?= geneermenugedeelte($drinken) ?>
    </table>

    <h2>Toetjes</h2>
    <table>
    <?= geneermenugedeelte($toetjes) ?>
    </table>
  </body>
</html>
